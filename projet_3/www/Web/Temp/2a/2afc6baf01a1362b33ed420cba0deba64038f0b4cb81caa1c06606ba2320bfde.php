<?php

/* ChapterAdmin.twig */
class __TwigTemplate_703a3cf981eb0e5b744a8ea637e3ec1708ab0742cddc6f899e4ee00ac64f870f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LayoutAdmin.twig", "ChapterAdmin.twig", 1);
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
        $context['_seq'] = twig_ensure_traversable($context["chapters"]);
        foreach ($context['_seq'] as $context["_key"] => $context["chapters"]) {
            // line 5
            echo "        <div class=\"big-title-admin\">
            <h1>Chapitre</h1>
            <h2>";
            // line 7
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "name", array());
            echo "</h2>
        </div>
        <div class=\"container\">
            <img  class=\"img-custom\" style=\"display: block; margin: auto;\" src=\"";
            // line 10
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "img", array());
            echo "\" alt=\"\"><br>
        </div>

        <div class=\"container\">
            <div class=\"row\">
            <form action=\"\" method=\"post\" name=\"updateChapter\" class=\"col-12\">

                <label for=\"updateChapter[name]\">Nom du chapitre :</label>
                <input type=\"text\" name=\"updateChapter[name]\" value=\"";
            // line 18
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "name", array());
            echo "\" class=\"form-control\" maxlength=\"50\" minlength=\"4\">

                <label for=\"updateChapter[summary]\"> Sommaire du chapitre :</label>
                <textarea name=\"updateChapter[summary]\" class=\"form-control\" minlength=\"6\" maxlength=\"500\">";
            // line 21
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "summary", array());
            echo "</textarea>

                <input type=\"text\" name=\"updateChapter[id]\" value=\"";
            // line 23
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
            echo "\" hidden>

                <br>

                <div class=\"col-12 d-flex flex-row-reverse\" style=\"padding-bottom:10px;\">
                    <a class=\"btn btn-outline-dark\" href=\"/chapitre-";
            // line 28
            echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
            echo "\">Voir</a>
                    &nbsp;
                    <button type=\"submit\" class=\"btn btn-outline-success float-right\">Enregistrer</button>
                </div>

            </form>

            ";
            // line 35
            if ( !twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "img", array())) {
                // line 36
                echo "
                <form method=\"POST\" action=\"\" enctype=\"multipart/form-data\" class=\"col-12\">
                    <br>
                    <div class=\"container\">
                        <div class=\"row\">
                            <input type=\"text\" name=\"img[id]\" value=\"";
                // line 41
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
                echo "\" hidden class=\"col-12\">
                            <div class=\"col-12\">
                                <div class=\"row\">
                                    <input type=\"file\" name=\"img\" class=\"col-8\">
                                    <input type=\"submit\" name=\"createImage\" value=\"Envoyer le fichier\" class=\"btn btn-outline-success col-4 float-right\">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            ";
            }
            // line 53
            echo "
            ";
            // line 54
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "img", array())) {
                // line 55
                echo "                <form method=\"POST\" action=\"\" enctype=\"multipart/form-data\" class=\"col-12\">
                    <br>
                    <input type=\"text\" name=\"deleteImage[path]\" value=\"";
                // line 57
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "img", array());
                echo "\" hidden>
                    <input type=\"text\" name=\"deleteImage[id]\" value=\"";
                // line 58
                echo twig_get_attribute($this->env, $this->getSourceContext(), $context["chapters"], "id", array());
                echo "\" hidden>
                    ";
                // line 59
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["session"]);
                foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
                    // line 60
                    echo "                        ";
                    if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["session"], "rights", array()) == 4)) {
                        // line 61
                        echo "                            <input type=\"submit\" name=\"deleteImage[text]\" value=\"Supprimer l'image\" class=\"btn btn-outline-danger float-right\">
                        ";
                    }
                    // line 63
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "
                </form>
            ";
            }
            // line 67
            echo "
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapters'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "ChapterAdmin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 67,  144 => 64,  138 => 63,  134 => 61,  131 => 60,  127 => 59,  123 => 58,  119 => 57,  115 => 55,  113 => 54,  110 => 53,  95 => 41,  88 => 36,  86 => 35,  76 => 28,  68 => 23,  63 => 21,  57 => 18,  46 => 10,  40 => 7,  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ChapterAdmin.twig", "/home/david/www/blog/App/View/BackOffice/Pages/ChapterAdmin.twig");
    }
}
