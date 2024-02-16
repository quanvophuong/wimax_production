<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Customize\Service;

use Eccube\Common\EccubeConfig;
use Eccube\Entity\BaseInfo;
use Eccube\Repository\BaseInfoRepository;
use Eccube\Repository\OrderPdfRepository;
use Eccube\Repository\OrderRepository;
use Eccube\Repository\ShippingRepository;
use Eccube\Twig\Extension\EccubeExtension;
use Eccube\Twig\Extension\TaxExtension;
use setasign\Fpdi\TcpdfFpdi;

/**
 * Class ReceiptPdfService.
 * Do export pdf function.
 */
class ReceiptPdfService extends TcpdfFpdi
{
    /** @var OrderRepository */
    protected $orderRepository;

    /** @var ShippingRepository */
    protected $shippingRepository;

    /** @var OrderPdfRepository */
    protected $orderPdfRepository;

    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * @var EccubeExtension
     */
    protected $eccubeExtension;

    /**
     * @var TaxExtension
     */
    protected $taxExtension;

    // ====================================
    // 定数宣言
    // ====================================

    /** ダウンロードするPDFファイルのデフォルト名 */
    const DEFAULT_PDF_FILE_NAME = 'receipt.pdf';

    /** FONT ゴシック */
    const FONT_GOTHIC = 'kozgopromedium';
    /** FONT 明朝 */
    const FONT_SJIS = 'kozminproregular';

    // ====================================
    // 変数宣言
    // ====================================

    /** @var BaseInfo */
    public $baseInfoRepository;

    /** 購入詳細情報 ラベル配列
     * @var array
     */
    protected $labelCell = [];

    /*** 購入詳細情報 幅サイズ配列
     * @var array
     */
    protected $widthCell = [];

    /** 最後に処理した注文番号 @var string */
    protected $receiptId = null;

    // --------------------------------------
    // Font情報のバックアップデータ
    /** @var string フォント名 */
    protected $bakFontFamily;
    /** @var string フォントスタイル */
    protected $bakFontStyle;
    /** @var string フォントサイズ */
    protected $bakFontSize;
    // --------------------------------------

    // lfTextのoffset
    protected $baseOffsetX = 0;
    protected $baseOffsetY = -4;

    /** ダウンロードファイル名 @var string */
    protected $downloadFileName = null;

    /** 発行日 @var string */
    protected $issueDate = '';

    /**
     * ReceiptPdfService constructor.
     *
     * @param EccubeConfig $eccubeConfig
     * @param OrderRepository $orderRepository
     * @param ShippingRepository $shippingRepository
     * @param BaseInfoRepository $baseInfoRepository
     * @param EccubeExtension $eccubeExtension
     * @param TaxExtension $taxExtension
     *
     * @throws \Exception
     */
    public function __construct(EccubeConfig $eccubeConfig, OrderRepository $orderRepository, ShippingRepository $shippingRepository, BaseInfoRepository $baseInfoRepository, EccubeExtension $eccubeExtension, TaxExtension $taxExtension)
    {
        $this->eccubeConfig = $eccubeConfig;
        $this->baseInfoRepository = $baseInfoRepository->get();
        $this->orderRepository = $orderRepository;
        $this->shippingRepository = $shippingRepository;
        $this->eccubeExtension = $eccubeExtension;
        $this->taxExtension = $taxExtension;

        parent::__construct();

        // 購入詳細情報の設定を行う
        // 動的に入れ替えることはない
        $this->labelCell[] = '説明';
        $this->labelCell[] = '数量';
        $this->labelCell[] = '単価';
        $this->labelCell[] = '金額';
        $this->widthCell = [110.3, 12, 21.7, 24.5];

        // Fontの設定しておかないと文字化けを起こす
        $this->SetFont(self::FONT_SJIS);

        // PDFの余白(上左右)を設定
        $this->SetMargins(15, 20);

        // ヘッダーの出力を無効化
        $this->setPrintHeader(false);

        // フッターの出力を無効化
        $this->setPrintFooter(true);
        $this->setFooterMargin();
        $this->setFooterFont([self::FONT_SJIS, '', 8]);
    }

    /**
     * PDFファイルを出力する.
     *
     * @return string|mixed
     */
    public function outputPdf()
    {
        return $this->Output($this->getPdfFileName(), 'S');
    }

    /**
     * PDFファイル名を取得する
     * PDFが1枚の時は注文番号をファイル名につける.
     *
     * @return string ファイル名
     */
    public function getPdfFileName()
    {
        if (!is_null($this->downloadFileName)) {
            return $this->downloadFileName;
        }
        $this->downloadFileName = self::DEFAULT_PDF_FILE_NAME;
        if ($this->PageNo() == 1) {
            $this->downloadFileName = 'Receipt-'.$this->receiptId.'.pdf';
        }

        return $this->downloadFileName;
    }
    
    /**
     * フッターに発行日を出力する.
     */
    public function Footer()
    {
        // フォント情報のバックアップ
        $this->backupFont();

        // 開始座標の設定
        $this->setBasePosition(0, 281);

        $this->Cell(0, 0, $this->issueDate, 0, 0, 'L');
    }

    /**
     * 作成するPDFのテンプレートファイルを指定する.
     */
    protected function addPdfPage()
    {
        // ページを追加
        $this->AddPage();

        // テンプレートに使うテンプレートファイルのページ番号を取得
        $tplIdx = $this->importPage(1);

        // テンプレートに使うテンプレートファイルのページ番号を指定
        $this->useTemplate($tplIdx, null, null, null, null, true);
        $this->setPageMark();
    }

    /**
     * PDFに店舗情報を設定する
     * ショップ名、ロゴ画像以外はdtb_helpに登録されたデータを使用する.
     */
    protected function renderChargeData($invoice, $stripeCharge, $order)
    {
        // 基準座標を設定する
        $this->setBasePosition();

        $this->receiptId = $stripeCharge->receipt_number;

        // 請求書番号
        $this->lfText(30, 25.5, $invoice->number, 9, 'B');

        // 領収書番号
        $this->lfText(30, 30.5, $stripeCharge->receipt_number, 9);

        // 注文番号
        $this->lfText(30, 35.5, 'F'.$order->getOrder()->getId(), 9);

        // ⽀払い⽇
        $paymentDate = $stripeCharge->created;
        $this->lfText(30, 40.5, date('Y年m⽉d⽇', $paymentDate), 9);

        // ⽀払い⽅法
        $card = $stripeCharge->payment_method_details->card;
        $brand = $card->brand;
        $last4 = $card->last4;
        $this->lfText(30, 45.5, ucfirst($brand) . ' - ' . $last4, 9);

        // Footer
        $this->issueDate = $stripeCharge->receipt_number. ' · '.date('Y年m⽉d⽇', $paymentDate).'に'.$invoice->amount_paid.'を領収いたしました';
    }

    /**
     * タイトルをPDFに描画する.
     *
     * @param string $title
     */
    protected function renderNote($stripeCharge)
    {
        // 基準座標を設定する
        $this->setBasePosition();

        // フォント情報のバックアップ
        $this->backupFont();

        $paymentDate = date('Y年m⽉d⽇', $stripeCharge->created);
        $total = '￥' . number_format($stripeCharge->amount_captured);
        $this->lfText(10, 100, $paymentDate.'に'.$total.'を領収いたしました', 13, 'B');

        // フォント情報の復元
        $this->restoreFont();
    }

    /**
     *
     */
    protected function renderCustomerData($invoice)
    {
        // 基準座標を設定する
        $this->setBasePosition();

        // フォント情報のバックアップ
        $this->backupFont();

        $this->lfText(85, 57, $invoice->customer_email, 9);

        // フォント情報の復元
        $this->restoreFont();
    }

    /**
     * PDFへのテキスト書き込み
     *
     * @param int    $x     X座標
     * @param int    $y     Y座標
     * @param string $text  テキスト
     * @param int    $size  フォントサイズ
     * @param string $style フォントスタイル
     */
    protected function lfText($x, $y, $text, $size = 0, $style = '')
    {
        // 退避
        $bakFontStyle = $this->FontStyle;
        $bakFontSize = $this->FontSizePt;

        $this->SetFont('', $style, $size);
        $this->Text($x + $this->baseOffsetX, $y + $this->baseOffsetY, $text);

        // 復元
        $this->SetFont('', $bakFontStyle, $bakFontSize);
    }

    /**
     * Colored table.
     *
     * TODO: 後の列の高さが大きい場合、表示が乱れる。
     *
     * @param array $header 出力するラベル名一覧
     * @param array $data   出力するデータ
     * @param array $w      出力するセル幅一覧
     */
    protected function setFancyTable($header, $data, $w)
    {
        // フォント情報のバックアップ
        $this->backupFont();

        // 開始座標の設定
        $this->setBasePosition(0, 149);

        // Colors, line width and bold font
        $this->SetFillColor(216, 216, 216);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont(self::FONT_SJIS, 'B', 8);
        $this->SetFont('', 'B');

        // Header
        $this->Cell(5, 7, '', 0, 0, '', 0, '');
        $count = count($header);
        for ($i = 0; $i < $count; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(235, 235, 235);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        $h = 4;
        foreach ($data as $row) {
            // 行のの処理
            $i = 0;
            $h = 4;
            $this->Cell(5, $h, '', 0, 0, '', 0, '');

            // Cellの高さを保持
            $cellHeight = 0;
            foreach ($row as $col) {
                // 列の処理
                // TODO: 汎用的ではない処理。この指定は呼び出し元で行うようにしたい。
                // テキストの整列を指定する
                $align = ($i == 0) ? 'L' : 'R';

                // セル高さが最大値を保持する
                if ($h >= $cellHeight) {
                    $cellHeight = $h;
                }

                // 最終列の場合は次の行へ移動
                // (0: 右へ移動(既定)/1: 次の行へ移動/2: 下へ移動)
                $ln = ($i == (count($row) - 1)) ? 1 : 0;

                $this->MultiCell(
                    $w[$i], // セル幅
                    $cellHeight, // セルの最小の高さ
                    $col, // 文字列
                    1, // 境界線の描画方法を指定
                    $align, // テキストの整列
                    $fill, // 背景の塗つぶし指定
                    $ln                 // 出力後のカーソルの移動方法
                );
                $h = $this->getLastH();

                ++$i;
            }
            $fill = !$fill;
        }
        $this->Cell(5, $h, '', 0, 0, '', 0, '');
        $this->Cell(array_sum($w), 0, '', 'T');
        $this->SetFillColor(255);

        // フォント情報の復元
        $this->restoreFont();
    }

    /**
     * 基準座標を設定する.
     *
     * @param int $x
     * @param int $y
     */
    protected function setBasePosition($x = null, $y = null)
    {
        // 現在のマージンを取得する
        $result = $this->getMargins();

        // 基準座標を指定する
        $actualX = is_null($x) ? $result['left'] : $x;
        $this->SetX($actualX);
        $actualY = is_null($y) ? $result['top'] : $y;
        $this->SetY($actualY);
    }

    /**
     * Font情報のバックアップ.
     */
    protected function backupFont()
    {
        // フォント情報のバックアップ
        $this->bakFontFamily = $this->FontFamily;
        $this->bakFontStyle = $this->FontStyle;
        $this->bakFontSize = $this->FontSizePt;
    }

    /**
     * Font情報の復元.
     */
    protected function restoreFont()
    {
        $this->SetFont($this->bakFontFamily, $this->bakFontStyle, $this->bakFontSize);
    }


    public function makePdfOrder(array $formData)
    {
        // ダウンロードファイル名の初期化
        $this->downloadFileName = null;

        // データが空であれば終了
        if (!$formData['invoice'] || !$formData['stripeCharge'] || !$formData['order']) {
            return false;
        }

        // 出荷番号をStringからarrayに変換
        $invoice =  $formData['invoice'];
        $stripeCharge =  $formData['stripeCharge'];
        $order =  $formData['order'];

        $userPath = $this->eccubeConfig->get('eccube_html_admin_dir').'/assets/pdf/receipt.pdf';
        $this->setSourceFile($userPath);

        // PDFにページを追加する
        $this->addPdfPage();

        // Charge info
        $this->renderChargeData($invoice, $stripeCharge, $order);

        // Customer info
        $this->renderCustomerData($invoice);

        // note
        $this->renderNote($stripeCharge);

        // 出荷詳細情報を描画する
        $this->renderChargeDetailData($invoice);

        return true;
    }

    /**
     *
     */
    protected function renderChargeDetailData($invoice)
    {
        // 基準座標を設定する
        $this->setBasePosition();

        // フォント情報のバックアップ
        $this->backupFont();

        $item = $invoice->lines->data[0];
        // 説明
        $description = $item->description;
        $arrDes = explode(" ",$description);
        $description = $arrDes[2];
        $period_end = date('Y/m/d', $invoice->period_start) . '〜' . date('Y/m/d', $invoice->period_end);
        $this->lfText(10, 122, $description, 9);
        $this->lfText(10, 127, $period_end, 9);

        // 数量
        $this->lfText(152, 122, $item->quantity, 9);

        // 単価
        $this->lfText(165, 122, '￥'.number_format($item->amount), 9);

        // ⾦額
        $total = $item->amount * $item->quantity;
        $this->lfText(186, 122, '￥'.number_format($total), 9);

        // ⼩計
        $this->lfText(186, 137.5, '￥'.number_format($invoice->subtotal), 9);

        // 税抜金額
        $this->lfText(186, 145, '￥'.number_format($invoice->total_excluding_tax), 9);

        // 消費税額
        $arrTax = $invoice->total_tax_amounts;
        $total_tax = 0;
        foreach ($arrTax as $tax) {
            $total_tax += $tax->amount;
        }
        $this->lfText(186, 153, '￥'.number_format($invoice->total_tax), 9);

        // 合計
        $this->lfText(186, 160, '￥'.number_format($invoice->total), 9);

        // ⽀払い⾦額
        $this->lfText(186, 167, '￥'.number_format($invoice->amount_paid), 9, 'B');

        // フォント情報の復元
        $this->restoreFont();

    }

    public function getPdfOrderFileName()
    {
        if (!is_null($this->downloadFileName)) {
            return $this->downloadFileName;
        }
        $this->downloadFileName = 'receipt.pdf';
        if ($this->PageNo() == 1) {
            $this->downloadFileName = 'Receipt-'.$this->receiptId.'.pdf';
        }

        return $this->downloadFileName;
    }

}
