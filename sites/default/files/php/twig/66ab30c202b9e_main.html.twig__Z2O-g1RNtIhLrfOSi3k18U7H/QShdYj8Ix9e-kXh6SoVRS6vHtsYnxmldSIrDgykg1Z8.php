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

/* @notech/page/main.html.twig */
class __TwigTemplate_b4859647771e5747fa8c5e7fbe43333f extends Template
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
        // line 1
        yield "<div class=\"content-main-inner\">
\t<div class=\"row\">
\t\t
\t\t";
        // line 4
        $context["cl_main"] = "col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 ";
        // line 5
        yield "\t\t";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 5) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 5))) {
            yield "\t
\t\t\t";
            // line 6
            $context["cl_main"] = "col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 ";
            // line 7
            yield "\t\t";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 7) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 7))) {
            yield "\t
\t\t\t";
            // line 8
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 8)) {
                // line 9
                yield "\t\t\t \t";
                $context["cl_main"] = "col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 sb-r ";
                // line 10
                yield "\t\t\t";
            }
            yield " \t\t
\t\t\t";
            // line 11
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 11)) {
                // line 12
                yield "\t\t\t\t";
                $context["cl_main"] = "col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 sb-l ";
                // line 13
                yield "\t\t\t";
            }
            yield "\t\t\t\t
      ";
        }
        // line 14
        yield " 

\t\t<div id=\"page-main-content\" class=\"main-content ";
        // line 16
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cl_main"] ?? null), 16, $this->source), "html", null, true);
        yield "\">
\t\t\t<div class=\"main-content-inner\">
\t\t\t\t";
        // line 18
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 18)) {
            // line 19
            yield "\t\t\t\t\t<div class=\"content-main\">
\t\t\t\t\t\t";
            // line 20
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            yield "
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 23
        yield "\t\t\t</div>
\t\t</div>

\t\t<!-- Sidebar Left -->
\t\t";
        // line 27
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 27)) {
            // line 28
            yield "\t\t\t";
            $context["cl_left"] = "col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-2 order-sm-2 order-xs-2";
            // line 29
            yield "\t\t\t";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 29)) {
                // line 30
                yield "\t\t\t \t";
                $context["cl_left"] = "col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-2 order-sm-2 order-xs-2";
                // line 31
                yield "\t\t\t";
            }
            yield " \t\t
\t\t\t
\t\t\t<div class=\"";
            // line 33
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cl_left"] ?? null), 33, $this->source), "html", null, true);
            yield " sidebar sidebar-left\">
\t\t\t\t<div class=\"sidebar-inner\">
\t\t\t\t\t";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
            yield "
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 39
        yield "\t\t<!-- End Sidebar Left -->

\t\t<!-- Sidebar Right -->
\t\t";
        // line 42
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 42)) {
            // line 43
            yield "\t\t\t";
            $context["cl_right"] = "col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 order-xl-3 order-lg-3 order-md-3 order-sm-3 order-xs-3";
            // line 44
            yield "\t\t\t";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 44)) {
                // line 45
                yield "\t\t\t\t";
                $context["cl_right"] = "col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 order-xl-3 order-lg-3 order-md-3 order-sm-3 order-xs-3";
                // line 46
                yield "\t\t\t";
            }
            yield "\t 

\t\t\t<div class=\"";
            // line 48
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cl_right"] ?? null), 48, $this->source), "html", null, true);
            yield " sidebar sidebar-right theiaStickySidebar\">
\t\t\t\t<div class=\"sidebar-inner\">
\t\t\t\t\t";
            // line 50
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 50), 50, $this->source), "html", null, true);
            yield "
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 54
        yield "\t\t<!-- End Sidebar Right -->
\t\t
\t</div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@notech/page/main.html.twig";
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
        return array (  169 => 54,  162 => 50,  157 => 48,  151 => 46,  148 => 45,  145 => 44,  142 => 43,  140 => 42,  135 => 39,  128 => 35,  123 => 33,  117 => 31,  114 => 30,  111 => 29,  108 => 28,  106 => 27,  100 => 23,  94 => 20,  91 => 19,  89 => 18,  84 => 16,  80 => 14,  74 => 13,  71 => 12,  69 => 11,  64 => 10,  61 => 9,  59 => 8,  54 => 7,  52 => 6,  47 => 5,  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"content-main-inner\">
\t<div class=\"row\">
\t\t
\t\t{% set cl_main = 'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 ' %}
\t\t{% if page.sidebar_right and page.sidebar_left %}\t
\t\t\t{% set cl_main = 'col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 ' %}
\t\t{% elseif page.sidebar_right or page.sidebar_left %}\t
\t\t\t{% if page.sidebar_right %}
\t\t\t \t{% set cl_main = 'col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 sb-r ' %}
\t\t\t{% endif %} \t\t
\t\t\t{% if page.sidebar_left %}
\t\t\t\t{% set cl_main = 'col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-xs-1 sb-l ' %}
\t\t\t{% endif %}\t\t\t\t
      {% endif %} 

\t\t<div id=\"page-main-content\" class=\"main-content {{ cl_main }}\">
\t\t\t<div class=\"main-content-inner\">
\t\t\t\t{% if page.content %}
\t\t\t\t\t<div class=\"content-main\">
\t\t\t\t\t\t{{ page.content }}
\t\t\t\t\t</div>
\t\t\t\t{% endif %}
\t\t\t</div>
\t\t</div>

\t\t<!-- Sidebar Left -->
\t\t{% if page.sidebar_left %}
\t\t\t{% set cl_left = 'col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-2 order-sm-2 order-xs-2' %}
\t\t\t{%\tif page.sidebar_right %}
\t\t\t \t{% set cl_left = 'col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 order-xl-1 order-lg-1 order-md-2 order-sm-2 order-xs-2' %}
\t\t\t{% endif %} \t\t
\t\t\t
\t\t\t<div class=\"{{ cl_left }} sidebar sidebar-left\">
\t\t\t\t<div class=\"sidebar-inner\">
\t\t\t\t\t{{ page.sidebar_left }}
\t\t\t\t</div>
\t\t\t</div>
\t\t{% endif %}
\t\t<!-- End Sidebar Left -->

\t\t<!-- Sidebar Right -->
\t\t{% if page.sidebar_right %}
\t\t\t{% set cl_right = 'col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 order-xl-3 order-lg-3 order-md-3 order-sm-3 order-xs-3'  %}
\t\t\t{% if page.sidebar_left %}
\t\t\t\t{% set cl_right = 'col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 order-xl-3 order-lg-3 order-md-3 order-sm-3 order-xs-3' %}
\t\t\t{% endif %}\t 

\t\t\t<div class=\"{{ cl_right }} sidebar sidebar-right theiaStickySidebar\">
\t\t\t\t<div class=\"sidebar-inner\">
\t\t\t\t\t{{ page.sidebar_right }}
\t\t\t\t</div>
\t\t\t</div>
\t\t{% endif %}
\t\t<!-- End Sidebar Right -->
\t\t
\t</div>
</div>
", "@notech/page/main.html.twig", "/var/www/html/themes/custom/notech/templates/page/main.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 4, "if" => 5);
        static $filters = array("escape" => 16);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
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
