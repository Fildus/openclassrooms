<?php

/* ArticleAdmin.twig */
class __TwigTemplate_87a14c3e433adbd1482b1168601a1d0869dec3705f866da5adfb5fbf3fafc868 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "ArticleAdmin.twig", 1);
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
        $context['_seq'] = twig_ensure_traversable($context["article"]);
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 5
            echo "
        <div class=\"big-title-admin\">
            <h1>";
            // line 7
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_title", array());
            echo "</h1>
            <div class=\"row\">
                <h6 class=\"col-3\">Autheur:              ";
            // line 9
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "users_pseudo", array());
            echo "                          </h6>
                <h6 class=\"col-3\">Date de création :<br>";
            // line 10
            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_creation_date", array()), "d/m/Y");
            echo "   </h6>
                <h6 class=\"col-3\">Chapitre:             ";
            // line 11
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "chapter_name", array());
            echo "                          </h6>
                <h6 class=\"col-3\">Visibilité:           ";
            // line 12
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_visibility", array());
            echo "                    </h6>
            </div>
        </div>

        <div class=\"container\">
            <form action=\"\" method=\"post\">

                <label for=\"updateArticle[title]\">Le titre de l'article :</label>
                <input name=\"updateArticle[title]\" id=\"updateArticle[title]\" type=\"text\" class=\"card-title col-12 form-control\" value=\"";
            // line 20
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_title", array());
            echo "\" maxlength=\"50\" minlength=\"4\">

                <label for=\"updateArticle[summary]\">Sommaire de l'article (ne pas mettre de signes spéciaux):</label>
                <textarea name=\"updateArticle[summary]\" id=\"updateArticle[summary]]\" type=\"text\" class=\"card-title col-12 form-control\" minlength=\"6\" maxlength=\"500\">";
            // line 23
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_summary", array());
            echo "</textarea>

                <label for=\"updateArticle[content]\">Le contenu de l'article :</label>
                <textarea name=\"updateArticle[content]\" id=\"updateArticle[content]\" class=\"col-12 textarea-custom-admin form-control\" minlength=\"6\" maxlength=\"10000\">
                    ";
            // line 27
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_content", array());
            echo "
                </textarea>

                <div class=\"form-group\">
                    <label for=\"updateArticle[visibility]\">Selectionnez la visibilitée</label>
                    <select name=\"updateArticle[visibility]\" class=\"form-control\">
                        <option value=\"prive\"  ";
            // line 33
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_visibility", array()) == "prive")) {
                echo " selected=\"selected\"";
            }
            echo ">Brouillon</option>
                        <option value=\"public\" ";
            // line 34
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_visibility", array()) == "public")) {
                echo "selected=\"selected\"";
            }
            echo ">publié</option>
                    </select>
                </div>

                <input name=\"updateArticle[id]\" type=\"text\" value=\"";
            // line 38
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_id", array());
            echo "\" hidden>

                <div class=\"form-group\">
                    <label for=\"updateArticle[chapter_id]\">Selectionnez le chapitre</label>
                    <select name=\"updateArticle[chapter_id]\" class=\"form-control\">
                        ";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["chapters"]);
            foreach ($context['_seq'] as $context["_key"] => $context["chapters"]) {
                // line 44
                echo "                            <option value=\"";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
                echo "\" ";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_chapter_id", array()))) {
                    echo "selected=\"selected\"";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "name", array());
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapters'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                    </select>
                </div>

                <div class=\"col-12 d-flex flex-row-reverse\">
                    <a href=\"/article-";
            // line 50
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["article"], "article_id", array());
            echo "\" class=\"btn btn-outline-dark\">Voir</a>
                    &nbsp;
                    <button type=\"submit\" class=\"btn btn-outline-success\">Enregistrer</button>
                </div>

            </form>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "ArticleAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 50,  132 => 46,  117 => 44,  113 => 43,  105 => 38,  96 => 34,  90 => 33,  81 => 27,  74 => 23,  68 => 20,  57 => 12,  53 => 11,  49 => 10,  45 => 9,  40 => 7,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ArticleAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/ArticleAdmin.twig");
    }
}
