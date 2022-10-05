<?php

namespace Plugin\HsdGreenFormPg\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Entity\AbstractEntity;

/**
 * Config
 *
 * @ORM\Table(name="plg_hsd_green_form_pg_config")
 * @ORM\Entity(repositoryClass="Plugin\HsdGreenFormPg\Repository\ConfigRepository")
 */
class Config extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_1", type="string", length=32)
     */
    private $greenform_id_1;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_1", type="integer", options={"unsigned":true})
     */
    private $form_height_1;
    /**
     * @var string
     *
     * @ORM\Column(name="route_1", type="string", length=64)
     */
    private $route_1;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_2", type="string", length=32, nullable=true)
     */
    private $greenform_id_2;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_2", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_2;
    /**
     * @var string
     *
     * @ORM\Column(name="route_2", type="string", length=64, nullable=true)
     */
    private $route_2;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_3", type="string", length=32, nullable=true)
     */
    private $greenform_id_3;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_3", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_3;
    /**
     * @var string
     *
     * @ORM\Column(name="route_3", type="string", length=64, nullable=true)
     */
    private $route_3;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_4", type="string", length=32, nullable=true)
     */
    private $greenform_id_4;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_4", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_4;
    /**
     * @var string
     *
     * @ORM\Column(name="route_4", type="string", length=64, nullable=true)
     */
    private $route_4;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_5", type="string", length=32, nullable=true)
     */
    private $greenform_id_5;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_5", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_5;
    /**
     * @var string
     *
     * @ORM\Column(name="route_5", type="string", length=64, nullable=true)
     */
    private $route_5;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_6", type="string", length=32, nullable=true)
     */
    private $greenform_id_6;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_6", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_6;
    /**
     * @var string
     *
     * @ORM\Column(name="route_6", type="string", length=64, nullable=true)
     */
    private $route_6;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_7", type="string", length=32, nullable=true)
     */
    private $greenform_id_7;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_7", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_7;
    /**
     * @var string
     *
     * @ORM\Column(name="route_7", type="string", length=64, nullable=true)
     */
    private $route_7;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_8", type="string", length=32, nullable=true)
     */
    private $greenform_id_8;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_8", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_8;
    /**
     * @var string
     *
     * @ORM\Column(name="route_8", type="string", length=64, nullable=true)
     */
    private $route_8;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_9", type="string", length=32, nullable=true)
     */
    private $greenform_id_9;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_9", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_9;
    /**
     * @var string
     *
     * @ORM\Column(name="route_9", type="string", length=64, nullable=true)
     */
    private $route_9;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_10", type="string", length=32, nullable=true)
     */
    private $greenform_id_10;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_10", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_10;
    /**
     * @var string
     *
     * @ORM\Column(name="route_10", type="string", length=64, nullable=true)
     */
    private $route_10;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_11", type="string", length=32, nullable=true)
     */
    private $greenform_id_11;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_11", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_11;
    /**
     * @var string
     *
     * @ORM\Column(name="route_11", type="string", length=64, nullable=true)
     */
    private $route_11;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_12", type="string", length=32, nullable=true)
     */
    private $greenform_id_12;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_12", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_12;
    /**
     * @var string
     *
     * @ORM\Column(name="route_12", type="string", length=64, nullable=true)
     */
    private $route_12;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_13", type="string", length=32, nullable=true)
     */
    private $greenform_id_13;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_13", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_13;
    /**
     * @var string
     *
     * @ORM\Column(name="route_13", type="string", length=64, nullable=true)
     */
    private $route_13;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_14", type="string", length=32, nullable=true)
     */
    private $greenform_id_14;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_14", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_14;
    /**
     * @var string
     *
     * @ORM\Column(name="route_14", type="string", length=64, nullable=true)
     */
    private $route_14;

    /**
     * @var string
     *
     * @ORM\Column(name="greenform_id_15", type="string", length=32, nullable=true)
     */
    private $greenform_id_15;
    /**
     * @var int
     *
     * @ORM\Column(name="form_height_15", type="integer", options={"unsigned":true}, nullable=true)
     */
    private $form_height_15;
    /**
     * @var string
     *
     * @ORM\Column(name="route_15", type="string", length=64, nullable=true)
     */
    private $route_15;
    /**
     * @var string
     *
     * @ORM\Column(name="order_to_greenformreg", type="string", length=16, nullable=true)
     */
    private $order_to_greenformreg;
    /**
     * @var string
     *
     * @ORM\Column(name="og_greenform_id", type="string", length=32, nullable=true)
     */
    private $og_greenform_id;


    public function getId()
    {
        return $this->id;
    }

    public function getGreenFormId1()
    {
        return $this->greenform_id_1;
    }
    public function setGreenFormId1($str)
    {
        $this->greenform_id_1 = $str;

        return $this;
    }
    public function getFormHeight1()
    {
        return $this->form_height_1;
    }
    public function setFormHeight1($num)
    {
        $this->form_height_1 = $num;

        return $this;
    }
    public function getRoute1()
    {
        return $this->route_1;
    }
    public function setRoute1($str)
    {
        $this->route_1 = $str;

        return $this;
    }

    // Form2
    public function getGreenFormId2()
    {
        return $this->greenform_id_2;
    }
    public function setGreenFormId2($str)
    {
        $this->greenform_id_2 = $str;
        return $this;
    }

    public function getFormHeight2()
    {
        return $this->form_height_2;
    }
    public function setFormHeight2($num)
    {
        $this->form_height_2 = $num;
        return $this;
    }

    public function getRoute2()
    {
        return $this->route_2;
    }
    public function setRoute2($str)
    {
        $this->route_2 = $str;
        return $this;
    }

    // Form3
    public function getGreenFormId3()
    {
        return $this->greenform_id_3;
    }
    public function setGreenFormId3($str)
    {
        $this->greenform_id_3 = $str;
        return $this;
    }

    public function getFormHeight3()
    {
        return $this->form_height_3;
    }
    public function setFormHeight3($num)
    {
        $this->form_height_3 = $num;
        return $this;
    }

    public function getRoute3()
    {
        return $this->route_3;
    }
    public function setRoute3($str)
    {
        $this->route_3 = $str;
        return $this;
    }

    // Form4
    public function getGreenFormId4()
    {
        return $this->greenform_id_4;
    }
    public function setGreenFormId4($str)
    {
        $this->greenform_id_4 = $str;
        return $this;
    }

    public function getFormHeight4()
    {
        return $this->form_height_4;
    }
    public function setFormHeight4($num)
    {
        $this->form_height_4 = $num;
        return $this;
    }

    public function getRoute4()
    {
        return $this->route_4;
    }
    public function setRoute4($str)
    {
        $this->route_4 = $str;
        return $this;
    }

    // Form5
    public function getGreenFormId5()
    {
        return $this->greenform_id_5;
    }
    public function setGreenFormId5($str)
    {
        $this->greenform_id_5 = $str;
        return $this;
    }

    public function getFormHeight5()
    {
        return $this->form_height_5;
    }
    public function setFormHeight5($num)
    {
        $this->form_height_5 = $num;
        return $this;
    }

    public function getRoute5()
    {
        return $this->route_5;
    }
    public function setRoute5($str)
    {
        $this->route_5 = $str;
        return $this;
    }

    // Form6
    public function getGreenFormId6()
    {
        return $this->greenform_id_6;
    }
    public function setGreenFormId6($str)
    {
        $this->greenform_id_6 = $str;
        return $this;
    }

    public function getFormHeight6()
    {
        return $this->form_height_6;
    }
    public function setFormHeight6($num)
    {
        $this->form_height_6 = $num;
        return $this;
    }

    public function getRoute6()
    {
        return $this->route_6;
    }
    public function setRoute6($str)
    {
        $this->route_6 = $str;
        return $this;
    }

    // Form7
    public function getGreenFormId7()
    {
        return $this->greenform_id_7;
    }
    public function setGreenFormId7($str)
    {
        $this->greenform_id_7 = $str;
        return $this;
    }

    public function getFormHeight7()
    {
        return $this->form_height_7;
    }
    public function setFormHeight7($num)
    {
        $this->form_height_7 = $num;
        return $this;
    }

    public function getRoute7()
    {
        return $this->route_7;
    }
    public function setRoute7($str)
    {
        $this->route_7 = $str;
        return $this;
    }

    // Form8
    public function getGreenFormId8()
    {
        return $this->greenform_id_8;
    }
    public function setGreenFormId8($str)
    {
        $this->greenform_id_8 = $str;
        return $this;
    }

    public function getFormHeight8()
    {
        return $this->form_height_8;
    }
    public function setFormHeight8($num)
    {
        $this->form_height_8 = $num;
        return $this;
    }

    public function getRoute8()
    {
        return $this->route_8;
    }
    public function setRoute8($str)
    {
        $this->route_8 = $str;
        return $this;
    }

    // Form9
    public function getGreenFormId9()
    {
        return $this->greenform_id_9;
    }
    public function setGreenFormId9($str)
    {
        $this->greenform_id_9 = $str;
        return $this;
    }

    public function getFormHeight9()
    {
        return $this->form_height_9;
    }
    public function setFormHeight9($num)
    {
        $this->form_height_9 = $num;
        return $this;
    }

    public function getRoute9()
    {
        return $this->route_9;
    }
    public function setRoute9($str)
    {
        $this->route_9 = $str;
        return $this;
    }

    // Form10
    public function getGreenFormId10()
    {
        return $this->greenform_id_10;
    }
    public function setGreenFormId10($str)
    {
        $this->greenform_id_10 = $str;
        return $this;
    }

    public function getFormHeight10()
    {
        return $this->form_height_10;
    }
    public function setFormHeight10($num)
    {
        $this->form_height_10 = $num;
        return $this;
    }

    public function getRoute10()
    {
        return $this->route_10;
    }
    public function setRoute10($str)
    {
        $this->route_10 = $str;
        return $this;
    }

    // Form11
    public function getGreenFormId11()
    {
        return $this->greenform_id_11;
    }
    public function setGreenFormId11($str)
    {
        $this->greenform_id_11 = $str;
        return $this;
    }

    public function getFormHeight11()
    {
        return $this->form_height_11;
    }
    public function setFormHeight11($num)
    {
        $this->form_height_11 = $num;
        return $this;
    }

    public function getRoute11()
    {
        return $this->route_11;
    }
    public function setRoute11($str)
    {
        $this->route_11 = $str;
        return $this;
    }

    // Form12
    public function getGreenFormId12()
    {
        return $this->greenform_id_12;
    }
    public function setGreenFormId12($str)
    {
        $this->greenform_id_12 = $str;
        return $this;
    }

    public function getFormHeight12()
    {
        return $this->form_height_12;
    }
    public function setFormHeight12($num)
    {
        $this->form_height_12 = $num;
        return $this;
    }

    public function getRoute12()
    {
        return $this->route_12;
    }
    public function setRoute12($str)
    {
        $this->route_12 = $str;
        return $this;
    }

    // Form13
    public function getGreenFormId13()
    {
        return $this->greenform_id_13;
    }
    public function setGreenFormId13($str)
    {
        $this->greenform_id_13 = $str;
        return $this;
    }

    public function getFormHeight13()
    {
        return $this->form_height_13;
    }
    public function setFormHeight13($num)
    {
        $this->form_height_13 = $num;
        return $this;
    }

    public function getRoute13()
    {
        return $this->route_13;
    }
    public function setRoute13($str)
    {
        $this->route_13 = $str;
        return $this;
    }

    // Form14
    public function getGreenFormId14()
    {
        return $this->greenform_id_14;
    }
    public function setGreenFormId14($str)
    {
        $this->greenform_id_14 = $str;
        return $this;
    }

    public function getFormHeight14()
    {
        return $this->form_height_14;
    }
    public function setFormHeight14($num)
    {
        $this->form_height_14 = $num;
        return $this;
    }

    public function getRoute14()
    {
        return $this->route_14;
    }
    public function setRoute14($str)
    {
        $this->route_14 = $str;
        return $this;
    }

    // Form15
    public function getGreenFormId15()
    {
        return $this->greenform_id_15;
    }
    public function setGreenFormId15($str)
    {
        $this->greenform_id_15 = $str;
        return $this;
    }

    public function getFormHeight15()
    {
        return $this->form_height_15;
    }
    public function setFormHeight15($num)
    {
        $this->form_height_15 = $num;
        return $this;
    }

    public function getRoute15()
    {
        return $this->route_15;
    }
    public function setRoute15($str)
    {
        $this->route_15 = $str;
        return $this;
    }

    public function getOrderToGreenformreg()
    {
        return $this->order_to_greenformreg;
    }
    public function setOrderToGreenformreg($str)
    {
        $this->order_to_greenformreg = $str;
        return $this;
    }

    public function getOgGreenformId()
    {
        return $this->og_greenform_id;
    }
    public function setOgGreenformId($str)
    {
        $this->og_greenform_id = $str;
        return $this;
    }

}
