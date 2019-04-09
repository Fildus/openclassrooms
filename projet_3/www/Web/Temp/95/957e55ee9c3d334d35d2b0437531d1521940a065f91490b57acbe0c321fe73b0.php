<?php

/* Nav.twig */
class __TwigTemplate_e789c42f379c19c389ce63b00d957bdb503591fb45f490aee8402f9ce7128a11 extends Twig_Template
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
        echo "<div class=\"row\">
    ";
        // line 2
        if ( !($context["page"] ?? null)) {
            echo " <div class=\"col-1\"></div> ";
        }
        // line 3
        echo "    ";
        if (($context["page"] ?? null)) {
            // line 4
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["page"]);
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 5
                echo "            <div class=\"left-button col-2 text-center\"><a href=\"";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["page"], "previous", array());
                echo "\"><i class=\"fas fa-arrow-left\"></i></a></div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "    ";
        }
        // line 8
        echo "    <div class=\"col-8\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"row\">
                    <div class=\"col-4 twitter\">
                        <center><a class=\"tfi\"><i class=\"fab fa-twitter\"></i></a></center>
                    </div>
                    <div class=\"col-4 facebook\">
                        <center><a class=\"tfi\"><i class=\"fab fa-facebook-f\" ></i></a></center>
                    </div>
                    <div class=\"col-4 instagram\">
                        <center><a class=\"tfi\"><i class=\"fab fa-instagram\"></i></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
        // line 25
        if (($context["page"] ?? null)) {
            // line 26
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["page"]);
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 27
                echo "            <div class=\"right-button col-2 text-center\"><a href=\"";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["page"], "next", array());
                echo "\"><i class=\"fas fa-arrow-right\"></i></a></div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "    ";
        }
        // line 30
        echo "    ";
        if ( !($context["page"] ?? null)) {
            echo " <div class=\"col-2\"></div> ";
        }
        // line 31
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "Nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 31,  84 => 30,  81 => 29,  72 => 27,  67 => 26,  65 => 25,  46 => 8,  43 => 7,  34 => 5,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Nav.twig", "/home/david/www/blog/App/View/FrontOffice/Parts/Nav.twig");
    }
}
