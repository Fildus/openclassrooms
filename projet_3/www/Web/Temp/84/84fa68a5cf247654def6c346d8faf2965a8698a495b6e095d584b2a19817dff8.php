<?php

/* ModalSubscribe.twig */
class __TwigTemplate_0d3225b7d83380cca2291cecf44af65921429cb180c3f9f7ee2d9d88394e5224 extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"SUBSCRIBE\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"login\">Inscritpion</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">
                <form action=\"\" method=\"post\">
                    <div class=\"form-group\">

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-prepend\">
                                <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fas fa-user\"></i></span>
                            </div>
                            <input name=\"subscribe[username]\" type=\"text\" class=\"form-control\" placeholder=\"Nom/Pseudo\" aria-label=\"Nom/Pseudo\" aria-describedby=\"basic-addon1\" required minlength=\"4\" maxlength=\"50\">
                        </div>

                        <br>

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-append\">
                                <span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-key\"></i></span>
                            </div>
                            <label for=\"password\" class=\"form-control-label\"></label>
                            <input id=\"password_A\" name=\"subscribe[password]\" type=\"password\" class=\"form-control\" placeholder=\"Mot de passe\" aria-label=\"Mot de passe\" aria-describedby=\"basic-addon2\" required minlength=\"4\" maxlength=\"50\">
                        </div>

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-append\">
                                <span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-key\"></i></span>
                            </div>
                            <label for=\"passwordconfirm\" class=\"form-control-label\"></label>
                            <input id=\"password_B\" name=\"subscribe[password-confirm]\" type=\"password\" class=\"form-control\" placeholder=\"Confirmation du mot de passe\" aria-label=\"Conformation du mot de passe\" aria-describedby=\"basic-addon2\" required minlength=\"4\" maxlength=\"50\">
                        </div>

                        <br>

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-append\">
                                <span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-envelope-open\"></i></span>
                            </div>
                            <label for=\"email\" class=\"form-control-label\"></label>
                            <input id=\"email_subscribe_A\" name=\"subscribe[email]\" type=\"email\" class=\"form-control\" placeholder=\"Email\" aria-label=\"email\" aria-describedby=\"basic-addon2\" required>
                        </div>

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-append\">
                                <span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-envelope-open\"></i></span>
                            </div>
                            <label for=\"emailconfirm\" class=\"form-control-label\"></label>
                            <input id=\"email_subscribe_B\" name=\"subscribe[email-confirm]\" type=\"email\" class=\"form-control\" placeholder=\"Confirmation de l'email\" aria-label=\"emailconfirm\" aria-describedby=\"basic-addon2\" required>
                        </div>

                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fermer</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Envoyer!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "ModalSubscribe.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ModalSubscribe.twig", "/home/david/www/blog/App/View/FrontOffice/Form/ModalSubscribe.twig");
    }
}
