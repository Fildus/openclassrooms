<?php

/* LogoutSuccess.twig */
class __TwigTemplate_6eddefc497476cb5e878acc0c7bee577181c271455ad1263de1f1490ca5689fd extends Twig_Template
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
        echo "<div class=\"container\">
    <div class=\"alert alert-light alert-dismissible fade show\" role=\"alert\">
        <p>Vous êtes maintenant déconnecté</p>
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "LogoutSuccess.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "LogoutSuccess.twig", "/home/david/www/blog/App/View/FrontOffice/Alerts/LogoutSuccess.twig");
    }
}
