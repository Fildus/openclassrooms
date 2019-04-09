<?php

/* ModalUnsubscribe.twig */
class __TwigTemplate_a4824c95481713dc6de033986e374b20a95948332055ec4539a564aa68a19bd2 extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"UNSUBSCRIBE\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"UNSUBSCRIBE\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">

            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"login\">Se désinscrire</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>

            <div class=\"modal-body\">
                <form>
                    <div class=\"form-group\">
                        <p>Attention toutes vos informations seront perdues.<br>Vos messages postés en commentaires seront supprimés</p>
                    </div>
                </form>
            </div>

            <div class=\"modal-footer\">

                <form action=\"#\" method=\"post\" name=\"unSubscribe\">
                    <button type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\">Fermer</button>
                    <button type=\"submit\" class=\"btn btn-danger\" name=\"unSubscribe[delete]\">Supprimer mon compte !</button>
                </form>

            </div>

        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "ModalUnsubscribe.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ModalUnsubscribe.twig", "/home/david/www/blog/App/View/FrontOffice/Form/ModalUnsubscribe.twig");
    }
}
