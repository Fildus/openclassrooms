<?php

/* LayoutFront.twig */
class __TwigTemplate_8381965878e95f35269870be62d6b2cc6bc096ee6baa26a0e25ea19691441d6e extends Twig_Template
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
\t<head>
        ";
        // line 4
        echo twig_include($this->env, $context, "Head.twig");
        echo "
\t</head>

\t<body>

\t\t<div class=\"container background\">
            ";
        // line 10
        echo twig_include($this->env, $context, "ModalConnexion.twig");
        echo "
            ";
        // line 11
        echo twig_include($this->env, $context, "ModalUnsubscribe.twig");
        echo "
            ";
        // line 12
        echo twig_include($this->env, $context, "ModalLogin.twig");
        echo "
            ";
        // line 13
        echo twig_include($this->env, $context, "ModalSubscribe.twig");
        echo "
                ";
        // line 14
        if (($context["session"] ?? null)) {
            // line 15
            echo "                    ";
            echo twig_include($this->env, $context, "ModalCompte.twig");
            echo "
                ";
        }
        // line 17
        echo "
\t\t\t<header>
\t\t\t\t";
        // line 19
        echo twig_include($this->env, $context, "Header.twig");
        echo "
\t\t\t</header>

\t\t\t<main role=\"main\">
\t\t\t\t";
        // line 23
        $this->displayBlock("content", $context, $blocks);
        echo "
\t\t\t</main>

\t\t</div>


\t\t<footer class=\"container-fluid footer\">
            ";
        // line 30
        echo twig_include($this->env, $context, "Nav.twig");
        echo "
\t\t</footer>
\t\t\t";
        // line 32
        echo twig_include($this->env, $context, "CssJs.twig");
        echo "
    </body>

</html>";
    }

    public function getTemplateName()
    {
        return "LayoutFront.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 32,  78 => 30,  68 => 23,  61 => 19,  57 => 17,  51 => 15,  49 => 14,  45 => 13,  41 => 12,  37 => 11,  33 => 10,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "LayoutFront.twig", "/home/david/www/blog/App/View/FrontOffice/Templates/LayoutFront.twig");
    }
}
