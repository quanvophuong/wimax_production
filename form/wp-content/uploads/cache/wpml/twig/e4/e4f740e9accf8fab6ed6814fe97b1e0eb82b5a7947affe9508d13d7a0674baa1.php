<?php

/* slot-subform-statics-shortcode_actions.twig */
class __TwigTemplate_d2500817369ecd5a672c6ea7fcc4fa07529862a80229cbd9efe77f3d9c54ada6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->loadTemplate("preview.twig", "slot-subform-statics-shortcode_actions.twig", 1)->display(array_merge($context, array("preview" => $this->getAttribute($this->getAttribute((isset($context["previews"]) ? $context["previews"] : null), "statics", array()), "shortcode_actions", array()))));
        // line 2
        echo "
<div class=\"wpml-ls-subform-options\">

\t";
        // line 5
        $this->loadTemplate("dropdown-templates.twig", "slot-subform-statics-shortcode_actions.twig", 5)->display(array_merge($context, array("id" => "in-shortcode-action", "name" => "statics[shortcode_actions][template]", "value" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 9
(isset($context["settings"]) ? $context["settings"] : null), "statics", array()), "shortcode_actions", array()), "template", array()), "slot_type" => "shortcode_actions")));
        // line 13
        echo "
\t";
        // line 14
        $this->loadTemplate("checkboxes-includes.twig", "slot-subform-statics-shortcode_actions.twig", 14)->display(array_merge($context, array("id" => "in-shortcode-actions", "name_base" => "statics[shortcode_actions]", "slot_settings" => $this->getAttribute($this->getAttribute(        // line 18
(isset($context["settings"]) ? $context["settings"] : null), "statics", array()), "shortcode_actions", array()), "template_slug" => $this->getAttribute(        // line 19
(isset($context["slot_settings"]) ? $context["slot_settings"] : null), "template", array()))));
        // line 22
        echo "
\t";
        // line 23
        $this->loadTemplate("panel-colors.twig", "slot-subform-statics-shortcode_actions.twig", 23)->display(array_merge($context, array("id" => "in-shortcode-actions", "name_base" => "statics[shortcode_actions]", "slot_settings" => $this->getAttribute($this->getAttribute(        // line 27
(isset($context["settings"]) ? $context["settings"] : null), "statics", array()), "shortcode_actions", array()))));
        // line 30
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "slot-subform-statics-shortcode_actions.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 30,  40 => 27,  39 => 23,  36 => 22,  34 => 19,  33 => 18,  32 => 14,  29 => 13,  27 => 9,  26 => 5,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "slot-subform-statics-shortcode_actions.twig", "/home/seulab/wifi-tokyo-rentalshop.com/public_html/wordpress/wp-content/plugins/sitepress-multilingual-cms/templates/language-switcher-admin-ui/slot-subform-statics-shortcode_actions.twig");
    }
}
