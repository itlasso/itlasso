<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/notech/templates/node/node--page.html.twig */
class __TwigTemplate_7cda35fff4037a0758e13ba3885994ec extends Template
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
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $context["classes"] = ["node", ("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source,         // line 4
($context["node"] ?? null), "bundle", [], "any", false, false, true, 4), 4, $this->source))), ((CoreExtension::getAttribute($this->env, $this->source,         // line 5
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 5)) ? ("node--promoted") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 6
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 6)) ? ("node--sticky") : ("")), (( !CoreExtension::getAttribute($this->env, $this->source,         // line 7
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 7)) ? ("node--unpublished") : ("")), ((        // line 8
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 8, $this->source)))) : (""))];
        // line 11
        if ((($context["teaser"] ?? null) == true)) {
            yield " 
<div";
            // line 12
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 12), 12, $this->source), "about"), "html", null, true);
            yield ">
  \t<div class=\"header-title\">
\t \t";
            // line 14
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 14, $this->source), "html", null, true);
            yield "
\t\t\t<h2";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["node__title"], "method", false, false, true, 15), 15, $this->source), "html", null, true);
            yield ">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 15, $this->source), "html", null, true);
            yield "</h2>
\t \t";
            // line 16
            $context["title_suffix"] = "";
            // line 17
            yield "\t \t";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 17, $this->source), "html", null, true);
            yield "
\t \t";
            // line 18
            if (($context["display_submitted"] ?? null)) {
                // line 19
                yield "\t\t<div class=\"node__meta\">
\t\t  \t";
                // line 20
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 20, $this->source), "html", null, true);
                yield "
\t\t  \t<span";
                // line 21
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_attributes"] ?? null), 21, $this->source), "html", null, true);
                yield ">
\t\t\t \t";
                // line 22
                yield t("Submitted by @author_name on @date", array("@author_name" => ($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
                // line 23
                yield "\t\t  \t</span>
\t\t  \t";
                // line 24
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 24, $this->source), "html", null, true);
                yield "
\t\t\t</div>
\t \t";
            }
            // line 27
            yield "  \t</div>
  \t<div";
            // line 28
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["node__content", "clearfix"], "method", false, false, true, 28), 28, $this->source), "html", null, true);
            yield ">
\t \t";
            // line 29
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 29, $this->source), "html", null, true);
            yield "
  \t</div>
</div>
<!-- End Display article for teaser page -->
";
        } else {
            // line 34
            yield "<!-- Start Display article for detail page -->

<div";
            // line 36
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 36), 36, $this->source), "about"), "html", null, true);
            yield ">
  \t<div class=\"header-title\">
\t \t<div class=\"container\">
\t\t\t<h2 class=\"title\"><span>";
            // line 39
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 39, $this->source), "html", null, true);
            yield "</span></h2>
\t \t</div>
  \t</div>
  \t<div";
            // line 42
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["node__content", "clearfix"], "method", false, false, true, 42), 42, $this->source), "html", null, true);
            yield ">
\t \t";
            // line 43
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 43, $this->source), "html", null, true);
            yield "
  \t</div>
</div>

";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "teaser", "attributes", "title_prefix", "title_attributes", "label", "display_submitted", "author_picture", "author_attributes", "author_name", "date", "metadata", "content_attributes", "content"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/notech/templates/node/node--page.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  132 => 43,  128 => 42,  122 => 39,  116 => 36,  112 => 34,  104 => 29,  100 => 28,  97 => 27,  91 => 24,  88 => 23,  86 => 22,  82 => 21,  78 => 20,  75 => 19,  73 => 18,  68 => 17,  66 => 16,  60 => 15,  56 => 14,  51 => 12,  47 => 11,  45 => 8,  44 => 7,  43 => 6,  42 => 5,  41 => 4,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
  \tset classes = [
\t \t'node',
\t \t'node--type-' ~ node.bundle|clean_class,
\t \tnode.isPromoted() ? 'node--promoted',
\t \tnode.isSticky() ? 'node--sticky',
\t \tnot node.isPublished() ? 'node--unpublished',
\t \tview_mode ? 'node--view-mode-' ~ view_mode|clean_class
  \t]
%}
{% if teaser == true %} 
<div{{ attributes.addClass(classes)|without('about') }}>
  \t<div class=\"header-title\">
\t \t{{ title_prefix }}
\t\t\t<h2{{ title_attributes.addClass('node__title') }}>{{ label }}</h2>
\t \t{% set title_suffix = '' %}
\t \t{{ title_suffix }}
\t \t{% if display_submitted %}
\t\t<div class=\"node__meta\">
\t\t  \t{{ author_picture }}
\t\t  \t<span{{ author_attributes }}>
\t\t\t \t{% trans %}Submitted by {{ author_name }} on {{ date }}{% endtrans %}
\t\t  \t</span>
\t\t  \t{{ metadata }}
\t\t\t</div>
\t \t{% endif %}
  \t</div>
  \t<div{{ content_attributes.addClass('node__content', 'clearfix') }}>
\t \t{{ content }}
  \t</div>
</div>
<!-- End Display article for teaser page -->
{% else %}
<!-- Start Display article for detail page -->

<div{{ attributes.addClass(classes)|without('about') }}>
  \t<div class=\"header-title\">
\t \t<div class=\"container\">
\t\t\t<h2 class=\"title\"><span>{{ label }}</span></h2>
\t \t</div>
  \t</div>
  \t<div{{ content_attributes.addClass('node__content', 'clearfix') }}>
\t \t{{ content }}
  \t</div>
</div>

{% endif %}", "themes/custom/notech/templates/node/node--page.html.twig", "/var/www/html/themes/custom/notech/templates/node/node--page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 11, "trans" => 22);
        static $filters = array("clean_class" => 4, "escape" => 12, "without" => 12);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans'],
                ['clean_class', 'escape', 'without'],
                [],
                $this->source
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
