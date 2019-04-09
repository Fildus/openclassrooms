<?php

/* ModalCompte.twig */
class __TwigTemplate_c37c77d7aa48481d4ea1ebef0d8a3332a4b0e49b00f2fc3122396aff89f89a42 extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["session"]);
        foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["user"]);
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 3
                echo "        <div class=\"modal fade\" id=\"ACCOUNT\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"login\">Compte de <strong>";
                // line 7
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["user"], "pseudo", array());
                echo "</strong></h5>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                        <form action=\"\" method=\"post\">
                            <div class=\"form-group\">
                                <p>Date de création <strong>";
                // line 15
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["user"], "creation_date", array());
                echo "</strong></p>

                                <div class=\"input-group mb-3\">
                                    <div class=\"input-group-prepend\">
                                        <span class=\"input-group-text\" id=\"basic-addon1\"><i class=\"fas fa-user\"></i></span>
                                    </div>
                                    <input name=\"updateUsers[pseudo]\" type=\"text\" class=\"form-control\" value=\"";
                // line 21
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["user"], "pseudo", array());
                echo "\" required minlength=\"4\" maxlength=\"50\">
                                </div>

                                <div class=\"input-group mb-3\">
                                    <div class=\"input-group-append\">
                                        <span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-envelope-open\"></i></span>
                                    </div>
                                    <label for=\"email\" class=\"form-control-label\"></label>
                                    <input id=\"email\" name=\"updateUsers[email]\" type=\"email\" class=\"form-control\" value=\"";
                // line 29
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["user"], "email", array());
                echo "\" required>
                                </div>

                                <div class=\"input-group mb-3\">
                                    <div class=\"input-group-append\">
                                        <span class=\"input-group-text\" id=\"basic-addon2\"><i class=\"fas fa-book\"></i></span>
                                    </div>
                                    <label for=\"email\" class=\"form-control-label\"></label>
                                    <textarea id=\"content\" name=\"updateUsers[content]\" type=\"text\" class=\"form-control\" rows=\"5\" maxlength=\"200\">";
                // line 37
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["user"], "content", array());
                echo "</textarea>
                                </div>

                                <input name=\"updateUsers[id]\" type=\"text\" value=\"";
                // line 40
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["user"], "id", array());
                echo "\" hidden>


                            </div>

                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Fermer</button>
                                <button type=\"submit\" class=\"btn btn-success\">Modifier!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "ModalCompte.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 40,  76 => 37,  65 => 29,  54 => 21,  45 => 15,  34 => 7,  28 => 3,  23 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ModalCompte.twig", "/home/david/www/blog/App/View/FrontOffice/Form/ModalCompte.twig");
    }
}
