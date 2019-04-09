<?php

/* CssJs.twig */
class __TwigTemplate_dd04473a3f25eb0dcb956306bb678acf927e600eb72a0e08ba1dd75bcf454d5a extends Twig_Template
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
        echo "<script src=\"/Web/assets/js/Custom.js\"></script>
<script src=\"/Web/assets/js/jquery-3.2.1.slim.js\"></script>
<script src=\"/Web/assets/js/popper.min.js\"></script>
<script src=\"/Web/assets/js/bootstrap.js\"></script>

<script src=\"/Web/assets/js/holder.min.js\"></script>
<script src=\"/Web/assets/js/fontawesome.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "CssJs.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "CssJs.twig", "/home/david/www/blog/App/View/FrontOffice/Parts/CssJs.twig");
    }
}
