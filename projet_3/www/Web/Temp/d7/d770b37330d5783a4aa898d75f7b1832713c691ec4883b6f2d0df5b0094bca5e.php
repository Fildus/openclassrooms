<?php

/* CommentAdmin.twig */
class __TwigTemplate_b523b1bf122ccb853cb71f6219151e8d9f15d28043f5fa93fb7c80d4aea4fe1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "CommentAdmin.twig", 1);
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
        $context['_seq'] = twig_ensure_traversable($context["comments"]);
        foreach ($context['_seq'] as $context["_key"] => $context["comments"]) {
            // line 5
            echo "
        <div class=\"big-title-admin\">
            <h1>Commentaire signalé</h1>
            <div class=\"row\">
                <h6 class=\"col-12\">Autheur: ";
            // line 9
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "user_pseudo", array());
            echo "</h6>
                <h6 class=\"col-12\">Date d'inscription";
            // line 10
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "user_creation_date", array());
            echo "</h6>
                <h6 class=\"col-12\">Mail: ";
            // line 11
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "user_email", array());
            echo "</h6>
                <h6 class=\"col-12\">Date de publication du commentaire: ";
            // line 12
            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "comment_creation_date", array()), "d/m/Y");
            echo "</h6>
            </div>
        </div>

        <div class=\"container\" style=\"padding: 30px;\">
            <h3 style=\"color: #26292E;\">Contenu du commentaire</h3>
            <div class=\"row\">
                <div class=\"col-12 card-each-comment\">
                    <h4 class=\"col-12\">";
            // line 20
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "comment_title", array());
            echo "</h4>
                    <p class=\"col-12\">";
            // line 21
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "comment_content", array());
            echo "</p>
                </div>
            </div>
        </div>

    <div class=\"container\" style=\"padding: 30px;\">
        <h3 style=\"color: #26292E;\">Signalisation</h3>
        ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["alert"]);
            foreach ($context['_seq'] as $context["_key"] => $context["alert"]) {
                // line 29
                echo "            <div class=\"row\">
                <div class=\"col-12 card-each-comment\" style=\"border:dashed 3px #ff0000;\">
                    <h4 class=\"col-12\">";
                // line 31
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["alert"], "content", array());
                echo "</h4>
                    <p class=\"col-12\">";
                // line 32
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["alert"], "creation_date", array());
                echo "</p>
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alert'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "    </div>

    <div class=\"container\">
        <form action=\"\" method=\"post\">
            <button type=\"submit\" name=\"deleteComment[id]\" value=\"";
            // line 40
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["comments"], "comment_id", array());
            echo " \" class=\"btn btn-danger col-2 offset-10\">
                Supprimer!
            </button>
        </form>
    </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comments'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "CommentAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 40,  101 => 36,  91 => 32,  87 => 31,  83 => 29,  79 => 28,  69 => 21,  65 => 20,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "CommentAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/CommentAdmin.twig");
    }
}
