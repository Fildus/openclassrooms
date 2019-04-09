<?php

/* ModalLogin.twig */
class __TwigTemplate_ebf45faa774d396cc5ac0f01250d38c5285e63abe2916b5bca7da79bfb1b1738 extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"LOGIN\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"LOGIN\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title custom-black-title\" id=\"login\">Login</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">

                <form name=\"login\" method=\"post\" action=\"#\">
                    <div class=\"form-group\">

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-prepend\">
                                <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fas fa-user\"></i></span>
                            </div>
                            <label for=\"pseudo\" class=\"form-control-label\"></label>
                            <input name=\"login[pseudo]\" type=\"text\" class=\"form-control\" placeholder=\"Pseudo\" aria-label=\"pseudo\" aria-describedby=\"basic-addon1\" required minlength=\"4\" maxlength=\"50\">
                        </div>

                        <div class=\"input-group mb-3\">
                            <div class=\"input-group-append\">
                                <span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-key\"></i></span>
                            </div>
                            <label for=\"password\" class=\"form-control-label\"></label>
                            <input name=\"login[password]\" type=\"password\" class=\"form-control\" placeholder=\"Password\" aria-label=\"password\" aria-describedby=\"basic-addon2\" required minlength=\"4\" maxlength=\"100\">
                        </div>

                    </div>

                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fermer</button>
                        <button type=\"submit\" class=\"btn btn-primary\">Login</button>
                    </div>
              </form>

            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "ModalLogin.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ModalLogin.twig", "/home/david/www/blog/App/View/FrontOffice/Form/ModalLogin.twig");
    }
}
