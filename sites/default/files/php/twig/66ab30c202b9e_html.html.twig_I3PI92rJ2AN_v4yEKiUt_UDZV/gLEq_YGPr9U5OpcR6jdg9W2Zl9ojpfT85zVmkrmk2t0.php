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

/* themes/custom/notech/templates/page/html.html.twig */
class __TwigTemplate_2fb4a0f80ec4af8e284419158350e820 extends Template
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
        // line 26
        yield "<!DOCTYPE html>
<html";
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null), 27, $this->source), "html", null, true);
        yield ">
  <head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N8N26P79');</script>
<!-- End Google Tag Manager -->
    <head-placeholder token=\"";
        // line 36
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 36, $this->source));
        yield "\">
    <title>";
        // line 37
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null), 37, $this->source), " | "));
        yield "</title>
    <css-placeholder token=\"";
        // line 38
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 38, $this->source));
        yield "\">

    <js-placeholder token=\"";
        // line 40
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 40, $this->source));
        yield "\">

    ";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["links_google_fonts"] ?? null), 42, $this->source));
        yield "

    ";
        // line 44
        if (($context["customize_css"] ?? null)) {
            // line 45
            yield "      <style type=\"text/css\">
        ";
            // line 46
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["customize_css"] ?? null), 46, $this->source));
            yield "
      </style>
    ";
        }
        // line 49
        yield "
    ";
        // line 50
        if (($context["customize_styles"] ?? null)) {
            // line 51
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["customize_styles"] ?? null), 51, $this->source));
            yield "
    ";
        }
        // line 53
        yield "
    ";
        // line 54
        if (($context["pagebuilder_style"] ?? null)) {
            // line 55
            yield "      <style type=\"text/css\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["pagebuilder_style"] ?? null), 55, $this->source));
            yield "</style>
    ";
        }
        // line 57
        yield "
  </head>

  ";
        // line 60
        $context["body_classes"] = [((        // line 61
($context["logged_in"] ?? null)) ? ("logged-in") : ("")), (( !        // line 62
($context["root_path"] ?? null)) ? ("frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["root_path"] ?? null), 62, $this->source))))), ((        // line 63
($context["node_type"] ?? null)) ? (("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["node_type"] ?? null), 63, $this->source)))) : ("")), ((        // line 64
($context["node_id"] ?? null)) ? (("node-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["node_id"] ?? null), 64, $this->source)))) : (""))];
        // line 67
        yield "
  <body";
        // line 68
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["body_classes"] ?? null)], "method", false, false, true, 68), 68, $this->source), "html", null, true);
        yield ">

    <a href=\"#main-content\" class=\"visually-hidden focusable\">
      ";
        // line 71
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Skip to main content"));
        yield "
    </a>

    ";
        // line 74
        if (($context["preloader"] ?? null)) {
            yield " 
      <div id=\"gva-preloader\" >
        <div id=\"preloader-inner\" class=\"cssload-container\">
          <div class=\"wait-text\">";
            // line 77
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Please wait..."));
            yield " </div> 
          <div class=\"cssload-item cssload-moon\"></div>
        </div>
      </div>
    ";
        }
        // line 81
        yield "  

    ";
        // line 83
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null), 83, $this->source), "html", null, true);
        yield "
    ";
        // line 84
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null), 84, $this->source), "html", null, true);
        yield "
    ";
        // line 85
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null), 85, $this->source), "html", null, true);
        yield "
    <js-bottom-placeholder token=\"";
        // line 86
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 86, $this->source));
        yield "\">
    
    ";
        // line 88
        if (($context["addon_template"] ?? null)) {
            // line 89
            yield "      <div class=\"permission-save-";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["save_customize_permission"] ?? null), 89, $this->source), "html", null, true);
            yield "\">
         ";
            // line 90
            yield from             $this->loadTemplate(($context["addon_template"] ?? null), "themes/custom/notech/templates/page/html.html.twig", 90)->unwrap()->yield($context);
            // line 91
            yield "      </div>  
    ";
        }
        // line 93
        yield "    <div id=\"gva-overlay\"></div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-N8N26P79\"
height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  </body>
</html>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["html_attributes", "placeholder_token", "head_title", "links_google_fonts", "customize_css", "customize_styles", "pagebuilder_style", "logged_in", "root_path", "node_type", "node_id", "attributes", "preloader", "page_top", "page", "page_bottom", "addon_template", "save_customize_permission"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/notech/templates/page/html.html.twig";
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
        return array (  185 => 93,  181 => 91,  179 => 90,  174 => 89,  172 => 88,  167 => 86,  163 => 85,  159 => 84,  155 => 83,  151 => 81,  143 => 77,  137 => 74,  131 => 71,  125 => 68,  122 => 67,  120 => 64,  119 => 63,  118 => 62,  117 => 61,  116 => 60,  111 => 57,  105 => 55,  103 => 54,  100 => 53,  94 => 51,  92 => 50,  89 => 49,  83 => 46,  80 => 45,  78 => 44,  73 => 42,  68 => 40,  63 => 38,  59 => 37,  55 => 36,  43 => 27,  40 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for the basic structure of a single Drupal page.
 *
 * Variables:
 * - logged_in: A flag indicating if user is logged in.
 * - root_path: The root path of the current page (e.g., node, admin, user).
 * - node_type: The content type for the current node, if the page is a node.
 * - head_title: List of text elements that make up the head_title variable.
 *   May contain or more of the following:
 *   - title: The title of the page.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site.
 * - page_top: Initial rendered markup. This should be printed before 'page'.
 * - page: The rendered page markup.
 * - page_bottom: Closing rendered markup. This variable should be printed after
 *   'page'.
 * - db_offline: A flag indicating if the database is offline.
 * - placeholder_token: The token for generating head, css, js and js-bottom
 *   placeholders.
 *
 * @see template_preprocess_html()
 */
#}
<!DOCTYPE html>
<html{{ html_attributes }}>
  <head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N8N26P79');</script>
<!-- End Google Tag Manager -->
    <head-placeholder token=\"{{ placeholder_token|raw }}\">
    <title>{{ head_title|safe_join(' | ') }}</title>
    <css-placeholder token=\"{{ placeholder_token|raw }}\">

    <js-placeholder token=\"{{ placeholder_token|raw }}\">

    {{ links_google_fonts|raw }}

    {% if customize_css %}
      <style type=\"text/css\">
        {{ customize_css|raw }}
      </style>
    {% endif %}

    {% if customize_styles %}
      {{ customize_styles|raw }}
    {% endif %}

    {% if pagebuilder_style %}
      <style type=\"text/css\">{{ pagebuilder_style|raw  }}</style>
    {% endif %}

  </head>

  {% set body_classes = [
    logged_in ? 'logged-in',
    not root_path ? 'frontpage' : 'path-' ~ root_path|clean_class,
    node_type ? 'node--type-' ~ node_type|clean_class,
    node_id ? 'node-' ~ node_id|clean_class,
    ]
  %}

  <body{{ attributes.addClass(body_classes) }}>

    <a href=\"#main-content\" class=\"visually-hidden focusable\">
      {{ 'Skip to main content'|t }}
    </a>

    {% if preloader %} 
      <div id=\"gva-preloader\" >
        <div id=\"preloader-inner\" class=\"cssload-container\">
          <div class=\"wait-text\">{{ 'Please wait...'|t }} </div> 
          <div class=\"cssload-item cssload-moon\"></div>
        </div>
      </div>
    {% endif %}  

    {{ page_top }}
    {{ page }}
    {{ page_bottom }}
    <js-bottom-placeholder token=\"{{ placeholder_token|raw }}\">
    
    {% if addon_template %}
      <div class=\"permission-save-{{ save_customize_permission }}\">
         {% include addon_template %}
      </div>  
    {% endif %}
    <div id=\"gva-overlay\"></div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-N8N26P79\"
height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  </body>
</html>
", "themes/custom/notech/templates/page/html.html.twig", "/var/www/html/themes/custom/notech/templates/page/html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 44, "set" => 60, "include" => 90);
        static $filters = array("escape" => 27, "raw" => 36, "safe_join" => 37, "clean_class" => 62, "t" => 71);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'include'],
                ['escape', 'raw', 'safe_join', 'clean_class', 't'],
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
