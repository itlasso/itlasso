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

/* themes/custom/notech/templates/navigation/breadcrumb.html.twig */
class __TwigTemplate_003d583abdef22474aa5bb859f9bcd6a extends Template
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
        // line 10
        yield "<div class=\"breadcrumb-links\">
  <div class=\"content-inner\">
    ";
        // line 12
        if (($context["breadcrumb"] ?? null)) {
            // line 13
            yield "      <nav class=\"breadcrumb ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["background"] ?? null), 13, $this->source), "html", null, true);
            yield "\" aria-labelledby=\"system-breadcrumb\">
        <ol>
          ";
            // line 15
            $context["i"] = 0;
            yield "  
          ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumb"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 17
                yield "            ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 18
                yield "            <li>
              ";
                // line 19
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 19)) {
                    // line 20
                    yield "                <a href=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                    yield "\">";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                    yield "</a>
              ";
                } else {
                    // line 22
                    yield "                ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "text", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
                    yield "
              ";
                }
                // line 24
                yield "              ";
                if ((($context["i"] ?? null) < (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["breadcrumb"] ?? null)) - 1))) {
                    // line 25
                    yield "                <span class=\"\">&nbsp;/&nbsp;</span>
              ";
                }
                // line 26
                yield "  
            </li>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            yield "          <li></li>
        </ol>
      </nav>
    ";
        }
        // line 33
        yield "  </div> 
</div>  ";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["breadcrumb", "background"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/notech/templates/navigation/breadcrumb.html.twig";
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
        return array (  103 => 33,  97 => 29,  89 => 26,  85 => 25,  82 => 24,  76 => 22,  68 => 20,  66 => 19,  63 => 18,  60 => 17,  56 => 16,  52 => 15,  46 => 13,  44 => 12,  40 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a breadcrumb trail.
 *
 * Available variables:
 * - breadcrumb: Breadcrumb trail items.
 */
#}
<div class=\"breadcrumb-links\">
  <div class=\"content-inner\">
    {% if breadcrumb %}
      <nav class=\"breadcrumb {{ background }}\" aria-labelledby=\"system-breadcrumb\">
        <ol>
          {% set i = 0 %}  
          {% for item in breadcrumb %}
            {% set i = i + 1 %}
            <li>
              {% if item.url %}
                <a href=\"{{ item.url }}\">{{ item.text }}</a>
              {% else %}
                {{ item.text }}
              {% endif %}
              {% if i < breadcrumb|length - 1 %}
                <span class=\"\">&nbsp;/&nbsp;</span>
              {% endif %}  
            </li>
          {% endfor %}
          <li></li>
        </ol>
      </nav>
    {% endif %}
  </div> 
</div>  ", "themes/custom/notech/templates/navigation/breadcrumb.html.twig", "/var/www/html/themes/custom/notech/templates/navigation/breadcrumb.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 12, "set" => 15, "for" => 16);
        static $filters = array("escape" => 13, "length" => 24);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'length'],
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
