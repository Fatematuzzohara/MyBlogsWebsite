<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/bartik/templates/comment.html.twig */
class __TwigTemplate_762706ab6b3ee003aa3e8e482cb3f961a7e32a05d71fc5b17fcc78acacd9d041 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
        $context["classes"] = [0 => "comment", 1 => "js-comment", 2 => (((        // line 73
($context["status"] ?? null) != "published")) ? (("comment--" . $this->sandbox->ensureToStringAllowed(($context["status"] ?? null), 73, $this->source))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 74
($context["comment"] ?? null), "owner", [], "any", false, false, true, 74), "anonymous", [], "any", false, false, true, 74)) ? ("by-anonymous") : ("")), 4 => (((        // line 75
($context["author_id"] ?? null) && (($context["author_id"] ?? null) == twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getOwnerId", [], "method", false, false, true, 75)))) ? ((("by-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getEntityTypeId", [], "method", false, false, true, 75), 75, $this->source)) . "-author")) : ("")), 5 => "clearfix"];
        // line 79
        echo "<article role=\"article\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 79), 79, $this->source), "role"), "html", null, true);
        echo ">
  ";
        // line 85
        echo "  <span class=\"hidden\" data-comment-timestamp=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["new_indicator_timestamp"] ?? null), 85, $this->source), "html", null, true);
        echo "\"></span>

  ";
        // line 87
        if (($context["submitted"] ?? null)) {
            // line 88
            echo "    <footer class=\"comment__meta\">
      ";
            // line 89
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 89, $this->source), "html", null, true);
            echo "
      <p class=\"comment__author\">";
            // line 90
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author"] ?? null), 90, $this->source), "html", null, true);
            echo "</p>
      <p class=\"comment__time\">";
            // line 91
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["created"] ?? null), 91, $this->source), "html", null, true);
            echo "</p>
      <p class=\"comment__permalink\">";
            // line 92
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["permalink"] ?? null), 92, $this->source), "html", null, true);
            echo "</p>
      ";
            // line 98
            echo "      ";
            if (($context["parent"] ?? null)) {
                // line 99
                echo "        <p class=\"visually-hidden\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["parent"] ?? null), 99, $this->source), "html", null, true);
                echo "</p>
      ";
            }
            // line 101
            echo "    </footer>
  ";
        }
        // line 103
        echo "
  <div";
        // line 104
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "comment__content"], "method", false, false, true, 104), 104, $this->source), "html", null, true);
        echo ">
    ";
        // line 105
        if (($context["title"] ?? null)) {
            // line 106
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 106, $this->source), "html", null, true);
            echo "
      <h3";
            // line 107
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 107, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 107, $this->source), "html", null, true);
            echo "</h3>
      ";
            // line 108
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 108, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 110
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 110, $this->source), "html", null, true);
        echo "
  </div>
</article>
";
    }

    public function getTemplateName()
    {
        return "core/themes/bartik/templates/comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 110,  109 => 108,  103 => 107,  98 => 106,  96 => 105,  92 => 104,  89 => 103,  85 => 101,  79 => 99,  76 => 98,  72 => 92,  68 => 91,  64 => 90,  60 => 89,  57 => 88,  55 => 87,  49 => 85,  44 => 79,  42 => 75,  41 => 74,  40 => 73,  39 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/bartik/templates/comment.html.twig", "C:\\xampp\\htdocs\\drupalTraining\\core\\themes\\bartik\\templates\\comment.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 70, "if" => 87);
        static $filters = array("escape" => 79, "without" => 79);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'without'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
