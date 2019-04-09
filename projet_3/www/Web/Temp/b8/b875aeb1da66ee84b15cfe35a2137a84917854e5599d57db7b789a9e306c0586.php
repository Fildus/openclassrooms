<?php

/* ChaptersAdmin.twig */
class __TwigTemplate_d5d212bfa0d9b3b71abd98bc2319acef11229f412cf25d6a4a9a06c6ea3cb8b4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "ChaptersAdmin.twig", 1);
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
        <h1>Chapitres</h1>
    </div>

    <div class=\"container\">
        <table class=\"table table-striped  text-center\">
            <thead class=\"thead-dark\">
            <tr>
                <th scope=\"col\">Titre           </th>
                <th scope=\"col\">Éditer          </th>
                <th scope=\"col\">Supprimer       </th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["chapters"]);
        foreach ($context['_seq'] as $context["_key"] => $context["chapters"]) {
            // line 20
            echo "                <tr>
                    <td>";
            // line 21
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "name", array());
            echo "  </td>
                    <td>
                        <a href=\"/admin/chapitre-";
            // line 23
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
            echo "\" class=\"btn btn-outline-primary\">Editer</a>
                    </td>
                    <td>
                        ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["session"]);
            foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
                // line 27
                echo "                            ";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) == 4)) {
                    // line 28
                    echo "                                <form action=\"\" method=\"post\"><button type=\"submit\" name=\"deleteChapter[id]\" value=\"";
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
                    echo "\" class=\"btn btn-outline-danger\">Supprimer</button></form>
                            ";
                } else {
                    // line 30
                    echo "                                <button class=\"btn btn-outline-dark\">Non disponible</button>
                            ";
                }
                // line 32
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapters'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "            </tbody>
        </table>
        ";
        // line 38
        echo twig_include($this->env, $context, "NewChapter.twig");
        echo "
        <div class=\"col-12 d-flex flex-column-reverse\">
            <button type=\"button\" data-toggle=\"modal\" data-target=\"#NewChapter\" class=\"btn btn-success align-self-end\">Nouveau chapitre</button>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "ChaptersAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 38,  97 => 36,  89 => 33,  83 => 32,  79 => 30,  73 => 28,  70 => 27,  66 => 26,  60 => 23,  55 => 21,  52 => 20,  48 => 19,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ChaptersAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/ChaptersAdmin.twig");
    }
}
