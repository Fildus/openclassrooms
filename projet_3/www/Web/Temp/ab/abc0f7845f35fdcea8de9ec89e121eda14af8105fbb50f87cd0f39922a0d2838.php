<?php

/* CommentsAdmin.twig */
class __TwigTemplate_8e70aa833d35cb8d8bbb19a06f4d065313ac9ea26ff638f3848a897590c721be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "CommentsAdmin.twig", 1);
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
        <h1>Commentaires signalés</h1>
    </div>

    <div class=\"container\">
        <table class=\"table table-striped  text-center\">
            <thead class=\"thead-dark\">
                <tr>
                    <th scope=\"col\">Titre du commentaire    </th>
                    <th scope=\"col\">Titre de l'article      </th>
                    <th scope=\"col\">Utilisateur en cause    </th>
                    <th scope=\"col\">Plus d'infos            </th>
                    <th scope=\"col\">Supprimer le commentaire</th>
                </tr>
            </thead>

            <tbody>
                ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["comments"]);
        foreach ($context['_seq'] as $context["_key"] => $context["comments"]) {
            // line 23
            echo "                    <tr>
                        <td>";
            // line 24
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "comment_title", array());
            echo "            </td>
                        <td>";
            // line 25
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "article_title", array());
            echo "            </td>
                        <td>";
            // line 26
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "user_pseudo", array());
            echo "              </td>

                        <td>
                            <a href=\"/admin/commentaire-";
            // line 29
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "comment_id", array());
            echo "\" class=\"btn btn-outline-primary\">Plus d'infos</a>
                        </td>

                        <td>
                            <form action=\"\" method=\"post\">
                                <button class=\"btn btn-outline-danger col-12\" type=\"submit\" name=\"deleteComment[id]\" value=\"";
            // line 34
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "comment_id", array());
            echo "\">
                                    Supprimer!
                                </button>
                            </form>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comments'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            </tbody>
        </table>

        ";
        // line 44
        echo twig_include($this->env, $context, "NewArticle.twig");
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "CommentsAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 44,  93 => 41,  80 => 34,  72 => 29,  66 => 26,  62 => 25,  58 => 24,  55 => 23,  51 => 22,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "CommentsAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/CommentsAdmin.twig");
    }
}
