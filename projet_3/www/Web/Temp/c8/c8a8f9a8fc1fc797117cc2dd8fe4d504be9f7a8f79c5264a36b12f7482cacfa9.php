<?php

/* LoginSuccess.twig */
class __TwigTemplate_12951f511f729e8446e5ef114c8a6175f19d69a3aede23936b3b83d89306b398 extends Twig_Template
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
    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        <p>Vous êtes maintenant connecté</p>
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "LoginSuccess.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "LoginSuccess.twig", "/home/david/www/blog/App/View/FrontOffice/Alerts/LoginSuccess.twig");
    }
}
