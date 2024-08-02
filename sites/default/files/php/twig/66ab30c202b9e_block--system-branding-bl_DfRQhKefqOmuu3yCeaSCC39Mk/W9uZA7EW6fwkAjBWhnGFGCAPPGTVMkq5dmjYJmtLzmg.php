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

/* themes/custom/notech/templates/block/block--system-branding-block.html.twig */
class __TwigTemplate_c06604cca386eaea1979d4b6b788ed63 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension(SandboxExtension::class);
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        yield "
";
        // line 16
        $context["attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["site-branding"], "method", false, false, true, 16);
        // line 17
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["site_logo", "setting_logo", "site_name", "site_slogan"]);        return; yield '';
    }

    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        yield "  ";
        if (($context["site_logo"] ?? null)) {
            // line 19
            yield "    <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
            yield "\" title=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
            yield "\" rel=\"home\" class=\"site-branding-logo\">
      ";
            // line 20
            if (($context["setting_logo"] ?? null)) {
                // line 21
                yield "         <img class=\"logo-default\" src=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace($this->sandbox->ensureToStringAllowed(($context["site_logo"] ?? null), 21, $this->source), [".svg" => ".png"]), "html", null, true);
                yield "\" alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
                yield "\" />
         <img class=\"logo-default logo-white hidden\" src=\"";
                // line 22
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::replace($this->sandbox->ensureToStringAllowed(($context["site_logo"] ?? null), 22, $this->source), ["logo.svg" => "logo-white.png"]), "html", null, true);
                yield "\" alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
                yield "\" />
      ";
            } else {
                // line 23
                yield "  
        <img class=\"logo-site\" src=\"";
                // line 24
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_logo"] ?? null), 24, $this->source), "html", null, true);
                yield "\" alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
                yield "\" />
      ";
            }
            // line 25
            yield "  
    </a>
  ";
        }
        // line 28
        yield "  ";
        if ((($context["site_name"] ?? null) || ($context["site_slogan"] ?? null))) {
            // line 29
            yield "    <div class=\"site-branding__text\">
      ";
            // line 30
            if (($context["site_name"] ?? null)) {
                // line 31
                yield "        <div class=\"site-branding__name\">
          <a href=\"";
                // line 32
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"));
                yield "\" title=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Home"));
                yield "\" rel=\"home\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 32, $this->source), "html", null, true);
                yield "</a>
        </div>
      ";
            }
            // line 35
            yield "      ";
            if (($context["site_slogan"] ?? null)) {
                // line 36
                yield "        <div class=\"site-branding__slogan\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_slogan"] ?? null), 36, $this->source), "html", null, true);
                yield "</div>
      ";
            }
            // line 38
            yield "    </div>
  ";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/notech/templates/block/block--system-branding-block.html.twig";
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
        return array (  126 => 38,  120 => 36,  117 => 35,  107 => 32,  104 => 31,  102 => 30,  99 => 29,  96 => 28,  91 => 25,  84 => 24,  81 => 23,  74 => 22,  67 => 21,  65 => 20,  58 => 19,  55 => 18,  46 => 17,  44 => 16,  41 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Bartik's theme implementation for a branding block.
 *
 * Each branding element variable (logo, name, slogan) is only available if
 * enabled in the block configuration.
 *
 * Available variables:
 * - site_logo: Logo for site as defined in Appearance or theme settings.
 * - site_name: Name for site as defined in Site information settings.
 * - site_slogan: Slogan for site as defined in Site information settings.
 */
#}

{% set attributes = attributes.addClass('site-branding') %}
{% block content %}
  {% if site_logo %}
    <a href=\"{{ path('<front>') }}\" title=\"{{ 'Home'|t }}\" rel=\"home\" class=\"site-branding-logo\">
      {% if setting_logo %}
         <img class=\"logo-default\" src=\"{{ site_logo|replace({'.svg': '.png'}) }}\" alt=\"{{ 'Home'|t }}\" />
         <img class=\"logo-default logo-white hidden\" src=\"{{ site_logo|replace({'logo.svg': 'logo-white.png'}) }}\" alt=\"{{ 'Home'|t }}\" />
      {% else %}  
        <img class=\"logo-site\" src=\"{{ site_logo }}\" alt=\"{{ 'Home'|t }}\" />
      {% endif %}  
    </a>
  {% endif %}
  {% if site_name or site_slogan %}
    <div class=\"site-branding__text\">
      {% if site_name %}
        <div class=\"site-branding__name\">
          <a href=\"{{ path('<front>') }}\" title=\"{{ 'Home'|t }}\" rel=\"home\">{{ site_name }}</a>
        </div>
      {% endif %}
      {% if site_slogan %}
        <div class=\"site-branding__slogan\">{{ site_slogan }}</div>
      {% endif %}
    </div>
  {% endif %}
{% endblock %}
", "themes/custom/notech/templates/block/block--system-branding-block.html.twig", "/var/www/html/themes/custom/notech/templates/block/block--system-branding-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16, "block" => 17, "if" => 18);
        static $filters = array("t" => 19, "escape" => 21, "replace" => 21);
        static $functions = array("path" => 19);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['t', 'escape', 'replace'],
                ['path'],
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
