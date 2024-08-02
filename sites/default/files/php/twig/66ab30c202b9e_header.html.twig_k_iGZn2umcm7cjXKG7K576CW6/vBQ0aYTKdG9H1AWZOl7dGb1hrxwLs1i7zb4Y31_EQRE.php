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

/* themes/custom/notech/templates/page/header.html.twig */
class __TwigTemplate_a7b2686cd60a516383a0be46cc9033f8 extends Template
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
        yield "<header id=\"header\" class=\"header-default header-one\">
\t
\t";
        // line 3
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "topbar", [], "any", false, false, true, 3)) {
            // line 4
            yield "\t\t<div class=\"topbar topbar__one\">
\t\t\t<div class=\"topbar__content header-default__topbar-content\">
\t\t\t\t<div class=\"topbar__left\">
\t\t\t\t\t<div class=\"topbar__left-content\"> 
\t\t\t\t\t\t";
            // line 8
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "topbar", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            yield "
\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t\t<div class=\"topbar__right\">
\t\t\t\t\t<div class=\"topbar__right-content\"> 
\t\t\t\t\t\t";
            // line 13
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "topbar_right", [], "any", false, false, true, 13)) {
                // line 14
                yield "\t\t\t\t\t\t\t";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "topbar_right", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                yield "
\t\t\t\t\t\t";
            }
            // line 16
            yield "\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 21
        yield "
\t";
        // line 22
        $context["class_sticky"] = "";
        // line 23
        yield "\t";
        if ((($context["sticky_menu"] ?? null) == 1)) {
            // line 24
            yield "\t\t";
            $context["class_sticky"] = "gv-sticky-menu";
            // line 25
            yield "\t";
        }
        yield "  

\t<div class=\"header-one__main ";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["class_sticky"] ?? null), 27, $this->source), "html", null, true);
        yield "\">
\t\t<div class=\"header-one__content\">
\t\t\t<div class=\"header-one__main-inner p-relative\">
\t\t\t\t<div class=\"header-one__left\">\t\t
\t\t\t\t\t<div class=\"header-one__branding\">
\t\t\t\t\t\t";
        // line 32
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 32)) {
            // line 33
            yield "\t\t\t\t\t\t\t";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
            yield "
\t\t\t\t\t\t";
        }
        // line 35
        yield "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"header-one__main-menu\">
\t\t\t\t\t\t<div class=\"gva-offcanvas-mobile\">
\t\t\t\t\t\t\t<div class=\"close-offcanvas hidden\"><i class=\"fa fa-times\"></i></div>
\t\t\t\t\t\t\t<div class=\"main-menu-inner\">
\t\t\t\t\t\t\t\t";
        // line 40
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "main_menu", [], "any", false, false, true, 40)) {
            // line 41
            yield "\t\t\t\t\t\t\t\t\t";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "main_menu", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t";
        }
        // line 43
        yield "\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
        // line 45
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "offcanvas", [], "any", false, false, true, 45)) {
            // line 46
            yield "\t\t\t\t\t\t\t\t<div class=\"after-offcanvas hidden\">
\t\t\t\t\t\t\t\t\t";
            // line 47
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "offcanvas", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 50
        yield "\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div id=\"menu-bar\" class=\"menu-bar menu-bar-mobile d-xxl-none d-xl-none\">
\t\t\t\t\t\t\t<span class=\"one\"></span>
\t\t\t\t\t\t\t<span class=\"two\"></span>
\t\t\t\t\t\t\t<span class=\"three\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"header-one__right\">
\t\t\t\t\t";
        // line 60
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 60)) {
            // line 61
            yield "\t\t\t\t\t\t<div class=\"search-one__box\">
\t\t\t\t\t\t\t<span class=\"search-one__icon\"><i class=\"gv-icon-52\"></i></span>
\t\t\t\t\t\t\t<div class=\"search-one__content\">  
\t\t\t\t\t\t\t\t";
            // line 64
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 64), 64, $this->source), "html", null, true);
            yield "
\t\t\t\t\t\t\t</div>  
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 68
        yield "
\t\t\t\t\t";
        // line 69
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "quick_side", [], "any", false, false, true, 69)) {
            // line 70
            yield "\t\t\t\t\t\t<div class=\"quick-side-icon d-none d-xxl-block d-xl-block\">
\t\t\t\t\t\t\t<div class=\"icon\"><a href=\"#\"><span class=\"qicon gv-icon-103\"></span></a></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 73
        yield " 
\t\t\t\t</div>\t
\t\t\t</div>
\t\t</div>
\t</div>

</header>

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "sticky_menu"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/notech/templates/page/header.html.twig";
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
        return array (  175 => 73,  169 => 70,  167 => 69,  164 => 68,  157 => 64,  152 => 61,  150 => 60,  138 => 50,  132 => 47,  129 => 46,  127 => 45,  123 => 43,  117 => 41,  115 => 40,  108 => 35,  102 => 33,  100 => 32,  92 => 27,  86 => 25,  83 => 24,  80 => 23,  78 => 22,  75 => 21,  68 => 16,  62 => 14,  60 => 13,  52 => 8,  46 => 4,  44 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header id=\"header\" class=\"header-default header-one\">
\t
\t{% if page.topbar %}
\t\t<div class=\"topbar topbar__one\">
\t\t\t<div class=\"topbar__content header-default__topbar-content\">
\t\t\t\t<div class=\"topbar__left\">
\t\t\t\t\t<div class=\"topbar__left-content\"> 
\t\t\t\t\t\t{{ page.topbar }}
\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t\t<div class=\"topbar__right\">
\t\t\t\t\t<div class=\"topbar__right-content\"> 
\t\t\t\t\t\t{% if page.topbar_right %}
\t\t\t\t\t\t\t{{ page.topbar_right }}
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t{% endif %}

\t{% set class_sticky = '' %}
\t{% if sticky_menu == 1 %}
\t\t{% set class_sticky = 'gv-sticky-menu' %}
\t{% endif %}  

\t<div class=\"header-one__main {{ class_sticky }}\">
\t\t<div class=\"header-one__content\">
\t\t\t<div class=\"header-one__main-inner p-relative\">
\t\t\t\t<div class=\"header-one__left\">\t\t
\t\t\t\t\t<div class=\"header-one__branding\">
\t\t\t\t\t\t{% if page.branding %}
\t\t\t\t\t\t\t{{ page.branding }}
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"header-one__main-menu\">
\t\t\t\t\t\t<div class=\"gva-offcanvas-mobile\">
\t\t\t\t\t\t\t<div class=\"close-offcanvas hidden\"><i class=\"fa fa-times\"></i></div>
\t\t\t\t\t\t\t<div class=\"main-menu-inner\">
\t\t\t\t\t\t\t\t{% if page.main_menu %}
\t\t\t\t\t\t\t\t\t{{ page.main_menu }}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t{% if page.offcanvas %}
\t\t\t\t\t\t\t\t<div class=\"after-offcanvas hidden\">
\t\t\t\t\t\t\t\t\t{{ page.offcanvas }}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t<div id=\"menu-bar\" class=\"menu-bar menu-bar-mobile d-xxl-none d-xl-none\">
\t\t\t\t\t\t\t<span class=\"one\"></span>
\t\t\t\t\t\t\t<span class=\"two\"></span>
\t\t\t\t\t\t\t<span class=\"three\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"header-one__right\">
\t\t\t\t\t{% if page.search %}
\t\t\t\t\t\t<div class=\"search-one__box\">
\t\t\t\t\t\t\t<span class=\"search-one__icon\"><i class=\"gv-icon-52\"></i></span>
\t\t\t\t\t\t\t<div class=\"search-one__content\">  
\t\t\t\t\t\t\t\t{{ page.search }}
\t\t\t\t\t\t\t</div>  
\t\t\t\t\t\t</div>
\t\t\t\t\t{% endif %}

\t\t\t\t\t{% if page.quick_side %}
\t\t\t\t\t\t<div class=\"quick-side-icon d-none d-xxl-block d-xl-block\">
\t\t\t\t\t\t\t<div class=\"icon\"><a href=\"#\"><span class=\"qicon gv-icon-103\"></span></a></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t{% endif %} 
\t\t\t\t</div>\t
\t\t\t</div>
\t\t</div>
\t</div>

</header>

", "themes/custom/notech/templates/page/header.html.twig", "/var/www/html/themes/custom/notech/templates/page/header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3, "set" => 22);
        static $filters = array("escape" => 8);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set'],
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
