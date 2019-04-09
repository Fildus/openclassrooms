<?php

/* CssJsAdmin.twig */
class __TwigTemplate_b2c6bbde004082091f8a581e783e15a9423868003530ef9aa55bfdaa9201eb7a extends Twig_Template
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

<!-- Script tiny MCE -->
<script src=\"https://cloud.tinymce.com/stable/tinymce.min.js\"></script>
<script>tinymce.init({ selector:'textarea'});</script>";
    }

    public function getTemplateName()
    {
        return "CssJsAdmin.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "CssJsAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Parts/CssJsAdmin.twig");
    }
}
