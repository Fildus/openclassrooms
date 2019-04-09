<?php

/* NewChapter.twig */
class __TwigTemplate_64d5c6bcce6a5d5107ba1246857b93d47e6e29a008e21a695863d2a28c0fbb66 extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"NewChapter\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"#NewChapter\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title custom-black-title\" id=\"chapter\">Nouveau chapitre</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">

                <form name=\"chapter\" method=\"post\" action=\"#\">
                    <div class=\"form-group\">

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-prepend\">
                                <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fas fa-edit\"></i></span>
                            </div>
                            <label for=\"createChapter[name]\" class=\"form-control-label\"></label>
                            <input name=\"createChapter[name]\" type=\"text\" class=\"form-control\" placeholder=\"Nom du chapitre\" aria-label=\"article\" aria-describedby=\"basic-addon1\" maxlength=\"50\" minlength=\"4\">
                        </div>

                    </div>

                    <div class=\"modal-footer\">
                        ";
        // line 26
        if (($context["session"] ?? null)) {
            // line 27
            echo "                            <button type=\"submit\" class=\"btn btn-success\">Créer</button>
                        ";
        }
        // line 29
        echo "                        ";
        if ( !($context["session"] ?? null)) {
            // line 30
            echo "                            <button type=\"button\" class=\"btn btn-outline-info\">Vous n'étes pas enregistré</button>
                        ";
        }
        // line 32
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
        return "NewChapter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 32,  55 => 30,  52 => 29,  48 => 27,  46 => 26,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "NewChapter.twig", "/home/david/www/blog/App/View/BackOffice/Form/NewChapter.twig");
    }
}
