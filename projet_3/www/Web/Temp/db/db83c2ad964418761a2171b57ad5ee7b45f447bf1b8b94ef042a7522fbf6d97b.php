<?php

/* Chapters.twig */
class __TwigTemplate_fdcd760c9e15f37acb814ef66ce0a0a8a18795e70a365a0c0e4558acd0e6bf8e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutFront.twig", "Chapters.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LayoutFront.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
    <div class=\"big-title\">
        <h1>Chapitres</h1>
    </div>

    <div class=\"container\">
        <div class=\"row\">
            ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["chapters"]);
        foreach ($context['_seq'] as $context["_key"] => $context["chapters"]) {
            // line 13
            echo "                <div class=\"col-lg-6 col-md-6 col-xs-12 card-resize\">
                    <div class=\"row card-custom\">
                        <div class=\"col-12\">
                            <img src=\"";
            // line 16
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "img", array());
            echo "\"width=\"100%\">
                        </div>
                        <div class=\"col-12\">
                            <div class=\"row\">
                                <h2 class=\"col-12 card-title\">";
            // line 20
            echo ((twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "name", array(), "any", true, true)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "name", array()))) : (""));
            echo "</h2>
                            </div>
                            <div class=\"card-text text-justify\">";
            // line 22
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "summary", array());
            echo "</div>
                        </div>

                        <div class=\"container\" style=\"padding: 0;\">

                            <div class=\"col-12 d-flex flex-row-reverse\" style=\"padding-bottom:10px;\">
                                <a class=\"btn btn-success\" href=\"/chapitre-";
            // line 28
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
            echo "\">Lire</a>
                                &nbsp;
                                ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["session"]);
            foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
                // line 31
                echo "                                    ";
                if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) >= 3)) {
                    // line 32
                    echo "                                <a href=\"/admin/chapitre-";
                    echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
                    echo "\" class=\"btn btn-primary\">Éditer</a>
                                    ";
                }
                // line 34
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "                            </div>

                        </div>

                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapters'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "Chapters.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 42,  94 => 35,  88 => 34,  82 => 32,  79 => 31,  75 => 30,  70 => 28,  61 => 22,  56 => 20,  49 => 16,  44 => 13,  40 => 12,  31 => 5,  28 => 4,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Chapters.twig", "/home/david/www/blog/App/View/FrontOffice/Pages/Chapters.twig");
    }
}
