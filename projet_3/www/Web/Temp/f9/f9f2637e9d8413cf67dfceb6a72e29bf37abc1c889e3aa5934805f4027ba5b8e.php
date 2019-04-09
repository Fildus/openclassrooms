<?php

/* UsersAdmin.twig */
class __TwigTemplate_d35156377829443947e2c3bf9a94ef3a588e2dd07ef9978caff169d244aebffd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "UsersAdmin.twig", 1);
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
        echo "
    <div class=\"big-title-admin\">
        <h1>Utilisateurs</h1>
    </div>

    <div class=\"container\">
    <table class=\"table table-striped  text-center\">
        <thead class=\"thead-dark\">
        <tr>
            <th scope=\"col\">Pseudonyme              </th>
            <th scope=\"col\">Date de création        </th>
            <th scope=\"col\">Droits                  </th>
            <th scope=\"col\">Plus d'infos            </th>
            <th scope=\"col\">Supprimer               </th>
        </tr>
        </thead>

        <tbody>
        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["users"]);
        foreach ($context['_seq'] as $context["_key"] => $context["users"]) {
            // line 23
            echo "            <tr>
                <td>";
            // line 24
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "pseudo", array());
            echo "                      </td>
                <td>";
            // line 25
            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "creation_date", array()), "d/m/Y");
            echo " </td>
                <td>
                    ";
            // line 27
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 1)) {
                echo "Visiteur";
            }
            // line 28
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 2)) {
                echo "Modérateur";
            }
            // line 29
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 3)) {
                echo "Autheur";
            }
            // line 30
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "rights", array()) == 4)) {
                echo "Administrateur";
            }
            // line 31
            echo "                </td>


                <td>
                    <a href=\"/admin/utilisateur-";
            // line 35
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "id", array());
            echo "\" class=\"btn btn-outline-primary\">Plus d'infos</a>
                </td>

                <td>
                    <form action=\"\" method=\"post\">
                        <button class=\"btn btn-outline-danger col-12\" type=\"submit\" name=\"deleteUser[id]\" value=\"";
            // line 40
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["users"], "id", array());
            echo "\">
                            Supprimer!
                        </button>
                    </form>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['users'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "        </tbody>
    </table>

";
    }

    public function getTemplateName()
    {
        return "UsersAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 47,  100 => 40,  92 => 35,  86 => 31,  81 => 30,  76 => 29,  71 => 28,  67 => 27,  62 => 25,  58 => 24,  55 => 23,  51 => 22,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UsersAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/UsersAdmin.twig");
    }
}
