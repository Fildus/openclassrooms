<?php

/* ModalConnexion.twig */
class __TwigTemplate_058fc25ef02292a18a1ef1ff33705d6d68bdb8d9d1759618eb463493db338af0 extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"CONNEXION\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"#CONNEXION\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"ModalLabel\">Menu de connexion</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">
                ";
        // line 11
        if ( !($context["session"] ?? null)) {
            // line 12
            echo "                    <button type=\"button\" class=\"btn btn-outline-success col-12\" data-toggle=\"modal\" data-target=\"#LOGIN\" data-whatever=\"@mdo\">Login</button>
                ";
        }
        // line 14
        echo "                ";
        if (($context["session"] ?? null)) {
            // line 15
            echo "
                    ";
            // line 16
            if (($context["session"] ?? null)) {
                // line 17
                echo "                        <form name=\"compte\" action=\"#\" method=\"post\">
                            <button type=\"button\" class=\"btn btn-outline-info col-12\" data-toggle=\"modal\" data-target=\"#ACCOUNT\" data-whatever=\"@mdo\">Mon compte</button>
                        </form>
                    ";
            }
            // line 21
            echo "
                    <form name=\"logout\" action=\"#\" method=\"post\">
                        <button name=\"logout[logout]\" type=\"submit\" class=\"btn btn-outline-dark col-12\" id=\"logout\">Logout</button>
                    </form>
                ";
        }
        // line 26
        echo "                <div class=\"container\">
                    <div class=\"row\">
                        ";
        // line 28
        if ( !($context["session"] ?? null)) {
            // line 29
            echo "                            <button type=\"button\" class=\"btn btn-outline-info col-12\" data-toggle=\"modal\" data-target=\"#SUBSCRIBE\" data-whatever=\"@mdo\">S'enregistrer</button>
                        ";
        }
        // line 31
        echo "                        ";
        if (($context["session"] ?? null)) {
            // line 32
            echo "                            <button type=\"button\" class=\"btn btn-outline-danger col-5 offset-7\" data-toggle=\"modal\" data-target=\"#UNSUBSCRIBE\" data-whatever=\"@mdo\">Se désinscrire</button>
                        ";
        }
        // line 34
        echo "                    </div>
                </div>
             </div>
            <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fermer</button>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "ModalConnexion.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 34,  71 => 32,  68 => 31,  64 => 29,  62 => 28,  58 => 26,  51 => 21,  45 => 17,  43 => 16,  40 => 15,  37 => 14,  33 => 12,  31 => 11,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ModalConnexion.twig", "/home/david/www/blog/App/View/FrontOffice/Form/ModalConnexion.twig");
    }
}
