<?php

/* NewArticle.twig */
class __TwigTemplate_8c406020878443bda32be2ee0a1fb23c7267f96ab4ab3c5e394a9682f03ca768 extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"NewArticle\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"#NewArticle\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title custom-black-title\" id=\"login\">Nouvel Article</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">

                <form name=\"login\" method=\"post\" action=\"#\">
                    <div class=\"form-group\">

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-prepend\">
                                <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fas fa-edit\"></i></span>
                            </div>
                            <label for=\"article\" class=\"form-control-label\"></label>
                            <input name=\"createArticle[title]\" type=\"text\" class=\"form-control\" placeholder=\"Nom de l'article\" aria-label=\"article\" aria-describedby=\"basic-addon1\" minlength=\"4\" maxlength=\"50\">
                        </div>
                        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["session"]);
        foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
            // line 23
            echo "                            <input name=\"createArticle[author_id]\" type=\"text\" value=\"";
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "id", array());
            echo "\" hidden>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "                        <input name=\"createArticle[content]\" type=\"text\" value=\"Votre contenu\" hidden>

                    </div>

                    <div class=\"modal-footer\">
                        ";
        // line 30
        if (($context["session"] ?? null)) {
            // line 31
            echo "                            <button type=\"submit\" class=\"btn btn-success\">Créer</button>
                        ";
        }
        // line 33
        echo "                        ";
        if ( !($context["session"] ?? null)) {
            // line 34
            echo "                            <button type=\"button\" class=\"btn btn-outline-info\">Vous n'étes pas enregistré</button>
                        ";
        }
        // line 36
        echo "                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fermer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "NewArticle.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 36,  71 => 34,  68 => 33,  64 => 31,  62 => 30,  55 => 25,  46 => 23,  42 => 22,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "NewArticle.twig", "/home/david/www/blog/App/View/BackOffice/Form/NewArticle.twig");
    }
}
