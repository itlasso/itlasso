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

/* @help_topics/user.create.html.twig */
class __TwigTemplate_3f5c759349f2c1da30d90c0c41379dfe extends Template
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
        // line 7
        $context["people_link_text"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield t("People", array());
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 8
        $context["people_link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\help\HelpTwigExtension']->getRouteLink($this->sandbox->ensureToStringAllowed(($context["people_link_text"] ?? null), 8, $this->source), "entity.user.collection"));
        // line 9
        yield "<h2>";
        yield t("Goal", array());
        yield "</h2>
<p>";
        // line 10
        yield t("Create a new user account.", array());
        yield "</p>
<h2>";
        // line 11
        yield t("Steps", array());
        yield "</h2>
<ol>
  <li>";
        // line 13
        yield t("In the <em>Manage</em> administrative menu, navigate to <em>@people_link</em>.", array("@people_link" => ($context["people_link"] ?? null), ));
        yield "</li>
  <li>";
        // line 14
        yield t("Click <em>Add user</em>.", array());
        yield "</li>
  <li>";
        // line 15
        yield t("Enter the <em>Email address</em>, <em>Username</em>, and <em>Password</em> (twice) for the new user.", array());
        yield "</li>
  <li>";
        // line 16
        yield t("Verify that the <em>Roles</em> checked for the new user are correct.", array());
        yield "</li>
  <li>";
        // line 17
        yield t("If you want the new user to receive an email message notifying them of the new account, check <em>Notify user of new account</em>.", array());
        yield "</li>
  <li>";
        // line 18
        yield t("Optionally, change other settings on the form.", array());
        yield "</li>
  <li>";
        // line 19
        yield t("Click <em>Create new account</em>.", array());
        yield "</li>
  <li>";
        // line 20
        yield t("You will be left on the <em>Add user</em> page; repeat these steps if you have more user accounts to create.", array());
        yield "</li>
</ol>";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@help_topics/user.create.html.twig";
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
        return array (  89 => 20,  85 => 19,  81 => 18,  77 => 17,  73 => 16,  69 => 15,  65 => 14,  61 => 13,  56 => 11,  52 => 10,  47 => 9,  45 => 8,  40 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("{% line 7 %}{% set people_link_text %}{% trans %}People{% endtrans %}{% endset %}
{% set people_link = render_var(help_route_link(people_link_text, 'entity.user.collection')) %}
<h2>{% trans %}Goal{% endtrans %}</h2>
<p>{% trans %}Create a new user account.{% endtrans %}</p>
<h2>{% trans %}Steps{% endtrans %}</h2>
<ol>
  <li>{% trans %}In the <em>Manage</em> administrative menu, navigate to <em>{{ people_link }}</em>.{% endtrans %}</li>
  <li>{% trans %}Click <em>Add user</em>.{% endtrans %}</li>
  <li>{% trans %}Enter the <em>Email address</em>, <em>Username</em>, and <em>Password</em> (twice) for the new user.{% endtrans %}</li>
  <li>{% trans %}Verify that the <em>Roles</em> checked for the new user are correct.{% endtrans %}</li>
  <li>{% trans %}If you want the new user to receive an email message notifying them of the new account, check <em>Notify user of new account</em>.{% endtrans %}</li>
  <li>{% trans %}Optionally, change other settings on the form.{% endtrans %}</li>
  <li>{% trans %}Click <em>Create new account</em>.{% endtrans %}</li>
  <li>{% trans %}You will be left on the <em>Add user</em> page; repeat these steps if you have more user accounts to create.{% endtrans %}</li>
</ol>", "@help_topics/user.create.html.twig", "/var/www/html/core/modules/user/help_topics/user.create.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "trans" => 7);
        static $filters = array("escape" => 13);
        static $functions = array("render_var" => 8, "help_route_link" => 8);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans'],
                ['escape'],
                ['render_var', 'help_route_link'],
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
