<?php

/* Header.twig */
class __TwigTemplate_dae9280d5cfd24372af97db6afdcfeb902648b209da2bcf76a6798caf17386d9 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-expand-md fixed-top\">


\t<a class=\"nav-item-custom\" href=\"/\"><i class=\"fas fa-book\"></i> Chapitres</a>
\t
\t<button class=\"navbar-toggler .custom-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
\t
\t<div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">

\t\t<ul class=\"navbar-nav mr-auto\">
            ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["session"]);
        foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
            // line 14
            echo "                ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) == 4)) {
                // line 15
                echo "\t\t\t\t\t<li class=\"nav-item active nav-item-custom\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"/admin/chapitres/page-1\"><i class=\"fas fa-cog\"></i> Admin<span class=\"sr-only\">(current)</span></a>
\t\t\t\t\t</li>
\t\t\t\t\t";
            } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),             // line 18
$context["session"], "rights", array()) == 3)) {
                // line 19
                echo "\t\t\t\t\t\t<li class=\"nav-item active nav-item-custom\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/admin/chapitres/page-1\"><i class=\"fas fa-cog\"></i> Admin<span class=\"sr-only\">(current)</span></a>
\t\t\t\t\t\t</li>
                \t";
            } elseif ((twig_get_attribute($this->env, $this->getSourceContext(),             // line 22
$context["session"], "rights", array()) == 2)) {
                // line 23
                echo "\t\t\t\t\t<li class=\"nav-item active nav-item-custom\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"/admin/commentaires/page-1\"><i class=\"fas fa-cog\"></i> Admin<span class=\"sr-only\">(current)</span></a>
\t\t\t\t\t</li>
                ";
            }
            // line 27
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "\t\t\t<li class=\"nav-item nav-item-custom\">
                ";
        // line 29
        if ( !($context["session"] ?? null)) {
            // line 30
            echo "\t\t\t\t<a class=\"nav-link\" data-toggle=\"modal\" data-target=\"#CONNEXION\"><i class=\"fas fa-sign-in-alt\"></i>
                ";
        }
        // line 32
        echo "\t\t\t\t";
        if (($context["session"] ?? null)) {
            // line 33
            echo "\t\t\t\t<a class=\"nav-link\" style=\"color:#008000;\" data-toggle=\"modal\" data-target=\"#CONNEXION\"><i class=\"fas fa-power-off\"></i>
\t\t\t\t";
        }
        // line 35
        echo "
\t\t\t\t";
        // line 36
        if ( !($context["session"] ?? null)) {
            // line 37
            echo "\t\t\t\t\t\t<span>Connexion</span>
\t\t\t\t\t";
        }
        // line 39
        echo "\t\t\t\t\t";
        if (($context["session"] ?? null)) {
            // line 40
            echo "\t\t\t\t\t\t<span style=\"color: #008000;\">Connecté</span>
\t\t\t\t\t";
        }
        // line 41
        echo " <span class=\"sr-only\">(current)</span>
\t\t\t\t</a>
            </li>
\t\t
\t\t</ul>

\t</div>
\t
</nav>";
    }

    public function getTemplateName()
    {
        return "Header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 41,  94 => 40,  91 => 39,  87 => 37,  85 => 36,  82 => 35,  78 => 33,  75 => 32,  71 => 30,  69 => 29,  66 => 28,  60 => 27,  54 => 23,  52 => 22,  47 => 19,  45 => 18,  40 => 15,  37 => 14,  33 => 13,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Header.twig", "/home/david/www/blog/App/View/FrontOffice/Parts/Header.twig");
    }
}
