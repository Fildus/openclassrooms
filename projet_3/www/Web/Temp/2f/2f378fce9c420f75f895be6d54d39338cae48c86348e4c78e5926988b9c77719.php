<?php

/* NavAdmin.twig */
class __TwigTemplate_be29483d75d76645544e4320ce0f7990e1419364020ed5f56128eccd698febc6 extends Twig_Template
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
            echo " <div class=\"col-2\"></div> ";
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
        echo "    <div class=\"col-8 row\">
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["session"]);
        foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
            // line 10
            echo "
            ";
            // line 11
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) >= 3)) {
                // line 12
                echo "                <div class=\"nav-item active nav-item-admin-custom col-lg-3 col-md-12 text-center\">
                    <a class=\"nav-link\" href=\"/admin/chapitres/page-1\"><i class=\"fas fa-book\"></i> Chapitres<span class=\"sr-only\">(current)</span></a>
                </div>
            ";
            }
            // line 16
            echo "
        ";
            // line 17
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) >= 3)) {
                // line 18
                echo "            <div class=\"nav-item active nav-item-admin-custom col-lg-3 col-md-12 text-center\">
                <a class=\"nav-link\" href=\"/admin/articles/page-1\"><i class=\"fas fa-edit\"></i> Articles<span class=\"sr-only\">(current)</span></a>
            </div>
        ";
            }
            // line 22
            echo "
        ";
            // line 23
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) >= 2)) {
                // line 24
                echo "            <div class=\"nav-item active nav-item-admin-custom col-lg-3 col-md-12 text-center\">
                <a class=\"nav-link\" href=\"/admin/commentaires/page-1\"><i class=\"fas fa-comments\"></i> Commentaires<span class=\"sr-only\">(current)</span></a>
            </div>
        ";
            }
            // line 28
            echo "
        ";
            // line 29
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) == 4)) {
                // line 30
                echo "            <div class=\"nav-item active nav-item-admin-custom col-lg-3 col-md-12 text-center\">
                <a class=\"nav-link\" href=\"/admin/utilisateurs/page-1\"><i class=\"fas fa-users\"></i> Utilisateurs<span class=\"sr-only\">(current)</span></a>
            </div>
        ";
            }
            // line 34
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </div>
    ";
        // line 37
        if (($context["page"] ?? null)) {
            // line 38
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["page"]);
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 39
                echo "            <div class=\"right-button col-2 text-center\"><a href=\"";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["page"], "next", array());
                echo "\"><i class=\"fas fa-arrow-right\"></i></a></div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "    ";
        }
        // line 42
        echo "    ";
        if ( !($context["page"] ?? null)) {
            echo " <div class=\"col-2\"></div> ";
        }
        // line 43
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "NavAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 43,  126 => 42,  123 => 41,  114 => 39,  109 => 38,  107 => 37,  104 => 36,  97 => 34,  91 => 30,  89 => 29,  86 => 28,  80 => 24,  78 => 23,  75 => 22,  69 => 18,  67 => 17,  64 => 16,  58 => 12,  56 => 11,  53 => 10,  49 => 9,  46 => 8,  43 => 7,  34 => 5,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "NavAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Parts/NavAdmin.twig");
    }
}
