<?php

/* LayoutAdmin.twig */
class __TwigTemplate_37bdb4c2889670c1843b4e6a86a28ed03a2fa8c1ea3eea21a7dbb56aa0ca51ee extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"fr\">
<head>
    ";
        // line 4
        echo twig_include($this->env, $context, "HeadAdmin.twig");
        echo "
</head>
<body>
";
        // line 7
        echo twig_include($this->env, $context, "ModalConnexion.twig");
        echo "
";
        // line 8
        echo twig_include($this->env, $context, "ModalLogin.twig");
        echo "
";
        // line 9
        echo twig_include($this->env, $context, "ModalSubscribe.twig");
        echo "
";
        // line 10
        echo twig_include($this->env, $context, "ModalUnsubscribe.twig");
        echo "
";
        // line 11
        if (($context["session"] ?? null)) {
            // line 12
            echo "    ";
            echo twig_include($this->env, $context, "ModalCompte.twig");
            echo "
";
        }
        // line 14
        echo "
<div class=\"container\">
\t<div class=\"row\">
\t\t<div class=\"col-12\">
\t\t\t<div class=\"background\">

\t\t\t\t<header>
                    ";
        // line 21
        echo twig_include($this->env, $context, "Header.twig");
        echo "
\t\t\t\t</header>

\t\t\t\t<main role=\"main\">
                    ";
        // line 25
        $this->displayBlock("content", $context, $blocks);
        echo "
\t\t\t\t</main>

\t\t\t</div>
\t\t</div>
\t</div>
</div>

<footer class=\"container-fluid footer\">
    ";
        // line 34
        echo twig_include($this->env, $context, "NavAdmin.twig");
        echo "
</footer>

";
        // line 37
        echo twig_include($this->env, $context, "CssJsAdmin.twig");
        echo "
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "LayoutAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 37,  82 => 34,  70 => 25,  63 => 21,  54 => 14,  48 => 12,  46 => 11,  42 => 10,  38 => 9,  34 => 8,  30 => 7,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "LayoutAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Templates/LayoutAdmin.twig");
    }
}
