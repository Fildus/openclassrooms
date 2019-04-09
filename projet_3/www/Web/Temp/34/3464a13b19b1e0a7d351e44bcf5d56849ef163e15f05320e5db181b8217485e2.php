<?php

/* ArticlesAdmin.twig */
class __TwigTemplate_f9952970ff036d7ac412d4c1609f27039f0df14e08cd497e9c9bf08589dc4731 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "ArticlesAdmin.twig", 1);
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
        <h1>Articles</h1>
    </div>

    <div class=\"container\">
        <table class=\"table table-striped  text-center\">
            <thead class=\"thead-dark\">
            <tr>
                <th scope=\"col\">Titre           </th>
                <th scope=\"col\">Author          </th>
                <th scope=\"col\">Chapitre        </th>
                <th scope=\"col\">Visibilité      </th>
                <th scope=\"col\">Éditer          </th>
                <th scope=\"col\">Supprimer       </th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["articles"]);
        foreach ($context['_seq'] as $context["_key"] => $context["articles"]) {
            // line 23
            echo "                <tr>
                    <td>";
            // line 24
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["articles"], "article_title", array());
            echo "                                                         </td>
                    <td>";
            // line 25
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["articles"], "users_pseudo", array());
            echo "                                                         </td>
                    <td>";
            // line 26
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["articles"], "chapter_name", array());
            echo "                                                         </td>
                    <td>";
            // line 27
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["articles"], "article_visibility", array());
            echo "                                                         </td>
                    <td><a href=\"/admin/article-";
            // line 28
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["articles"], "article_id", array());
            echo "\" class=\"btn btn-outline-primary\">Editer</a></td>
                    <td>
                        ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["session"]);
            foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
                // line 31
                echo "                            ";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) == 4)) {
                    // line 32
                    echo "                                <form action=\"\" method=\"post\"><button type=\"submit\" name=\"deleteArticle[id]\" value=\"";
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["articles"], "article_id", array());
                    echo "\" class=\"btn btn-outline-danger\">Supprimer</button></form>
                            ";
                } else {
                    // line 34
                    echo "                                <button class=\"btn btn-outline-dark\">Non disponible</button>
                            ";
                }
                // line 36
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "                    </td>
                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['articles'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </tbody>
        </table>
        ";
        // line 43
        echo twig_include($this->env, $context, "NewArticle.twig");
        echo "
        <div class=\"col-12 d-flex flex-column-reverse\">
            <button type=\"button\" data-toggle=\"modal\" data-target=\"#NewArticle\" class=\"btn btn-success align-self-end\">Nouvel article</button>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "ArticlesAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 43,  111 => 41,  102 => 37,  96 => 36,  92 => 34,  86 => 32,  83 => 31,  79 => 30,  74 => 28,  70 => 27,  66 => 26,  62 => 25,  58 => 24,  55 => 23,  51 => 22,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ArticlesAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/ArticlesAdmin.twig");
    }
}
