<?php

/* UserAdmin.twig */
class __TwigTemplate_229f7c9c4f557660dfc12eece326801916cf7f532f6db58008a7faac8423fa41 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "UserAdmin.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LayoutAdmin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["users"]);
        foreach ($context['_seq'] as $context["_key"] => $context["users"]) {
            // line 5
            echo "
        <div class=\"big-title-admin\">
            <h1>";
            // line 7
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "pseudo", array());
            echo "</h1>
            <div class=\"row\">
                <h6 class=\"col-3 offset-1\">email: ";
            // line 9
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "email", array());
            echo "</h6>
                <h6 class=\"col-4\">Date de création <br> ";
            // line 10
            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "creation_date", array()), "d/m/Y");
            echo "</h6>
                <h6 class=\"col-3\">Droits:
                    ";
            // line 12
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 1)) {
                echo "Visiteur";
            }
            // line 13
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 2)) {
                echo "Modérateur";
            }
            // line 14
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 3)) {
                echo "Autheur";
            }
            // line 15
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 4)) {
                echo "Administrateur";
            }
            // line 16
            echo "                </h6>

                <h6 class=\"col-10 offset-1 text-justify\">pharse de présentation: ";
            // line 18
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "content", array());
            echo "</h6>
            </div>
        </div>

        <div class=\"container\">
        <form action=\"\" method=\"post\">

            <input type=\"text\" name=\"updateUsers[id]\" value=\"";
            // line 25
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "id", array());
            echo "\" hidden>

            <div class=\"form-group\">
                <label for=\"updateUsers[rights]\">Modifier les droits</label>
                <select name=\"updateUsers[rights]\" class=\"form-control\">
                    <option value=\"1\" ";
            // line 30
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 1)) {
                echo "selected=\"selected\"";
            }
            echo ">Visiteur      </option>
                    <option value=\"2\" ";
            // line 31
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 2)) {
                echo "selected=\"selected\"";
            }
            echo ">Modérateur    </option>
                    <option value=\"3\" ";
            // line 32
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 3)) {
                echo "selected=\"selected\"";
            }
            echo ">Autheur       </option>
                    <option value=\"4\" ";
            // line 33
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 4)) {
                echo "selected=\"selected\"";
            }
            echo ">Administrateur</option>
                </select>
            </div>

            <button type=\"submit\" class=\"btn btn-outline-success col-2 offset-10\">Modifier !</button>

        </form>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['users'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "UserAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 33,  107 => 32,  101 => 31,  95 => 30,  87 => 25,  77 => 18,  73 => 16,  68 => 15,  63 => 14,  58 => 13,  54 => 12,  49 => 10,  45 => 9,  40 => 7,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UserAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/UserAdmin.twig");
    }
}
