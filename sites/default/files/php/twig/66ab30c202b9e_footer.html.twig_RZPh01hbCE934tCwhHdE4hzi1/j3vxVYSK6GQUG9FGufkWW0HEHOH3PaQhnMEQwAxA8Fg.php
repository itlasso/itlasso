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

/* @notech/page/footer.html.twig */
class __TwigTemplate_4006172bc157636e6dad91619557cd94 extends Template
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
        yield "<footer id=\"footer\" class=\"footer\">
  \t";
        // line 2
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 2)) {
            // line 3
            yield "  \t\t<div class=\"footer-inner\">
\t\t  \t<div class=\"footer-content\">
\t\t\t\t";
            // line 5
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            yield "
\t\t  \t</div>
\t\t</div>   
  ";
        }
        // line 9
        yield "
  ";
        // line 10
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 10)) {
            // line 11
            yield "\t <div class=\"copyright\">
\t\t<div class=\"container\">
\t\t  <div class=\"copyright-inner\">
\t\t\t\t";
            // line 14
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            yield "
\t\t  </div>   
\t\t</div>   
\t </div>
  ";
        }
        // line 19
        yield "
</footer>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@notech/page/footer.html.twig";
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
        return array (  74 => 19,  66 => 14,  61 => 11,  59 => 10,  56 => 9,  49 => 5,  45 => 3,  43 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer id=\"footer\" class=\"footer\">
  \t{% if page.footer %}
  \t\t<div class=\"footer-inner\">
\t\t  \t<div class=\"footer-content\">
\t\t\t\t{{ page.footer }}
\t\t  \t</div>
\t\t</div>   
  {% endif %}

  {% if page.copyright %}
\t <div class=\"copyright\">
\t\t<div class=\"container\">
\t\t  <div class=\"copyright-inner\">
\t\t\t\t{{ page.copyright }}
\t\t  </div>   
\t\t</div>   
\t </div>
  {% endif %}

</footer>
", "@notech/page/footer.html.twig", "/var/www/html/themes/custom/notech/templates/page/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("escape" => 5);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
