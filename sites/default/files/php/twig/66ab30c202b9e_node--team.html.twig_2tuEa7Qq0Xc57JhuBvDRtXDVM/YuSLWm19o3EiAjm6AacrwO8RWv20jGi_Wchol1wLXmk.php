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

/* themes/custom/notech/templates/node/node--team.html.twig */
class __TwigTemplate_09bb505d39b04333d6132047be07482b extends Template
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
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 8, $this->source)))) : ("")), "clearfix"];
        // line 12
        yield "
<!-- Start Display article for teaser page -->
";
        // line 14
        if ((($context["view_mode"] ?? null) == "teaser")) {
            // line 15
            yield "
   <div class=\"team-block team-v1\">
      <div class=\"team-image\">
         ";
            // line 18
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_team_image", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
            yield "
         <div class=\"socials-team\">
            ";
            // line 20
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_facebook", [], "any", false, false, true, 20), "value", [], "any", false, false, true, 20)) {
                // line 21
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_facebook", [], "any", false, false, true, 21), "value", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-facebook\"></i></a>
            ";
            }
            // line 23
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_google", [], "any", false, false, true, 23), "value", [], "any", false, false, true, 23)) {
                // line 24
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_google", [], "any", false, false, true, 24), "value", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-google\"></i></a>
            ";
            }
            // line 26
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_pinterest", [], "any", false, false, true, 26), "value", [], "any", false, false, true, 26)) {
                // line 27
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_pinterest", [], "any", false, false, true, 27), "value", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-pinterest\"></i></a>
            ";
            }
            // line 29
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_twitter", [], "any", false, false, true, 29), "value", [], "any", false, false, true, 29)) {
                // line 30
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_twitter", [], "any", false, false, true, 30), "value", [], "any", false, false, true, 30), 30, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-twitter\"></i></a>
            ";
            }
            // line 32
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_linkedin", [], "any", false, false, true, 32), "value", [], "any", false, false, true, 32)) {
                // line 33
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_linkedin", [], "any", false, false, true, 33), "value", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-linkedin\"></i></a>
            ";
            }
            // line 35
            yield "         </div>
      </div>
      <div class=\"team-content\">
         <h3 class=\"team-name\"><a href=\"";
            // line 38
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 38, $this->source), "html", null, true);
            yield "\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_name", [], "any", false, false, true, 38), "value", [], "any", false, false, true, 38), 38, $this->source));
            yield "</a></h3>
         <div class=\"team-job\">";
            // line 39
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_position", [], "any", false, false, true, 39), "value", [], "any", false, false, true, 39), 39, $this->source));
            yield "</div>
         <div class=\"team-skills\">
            ";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_skills", [], "any", false, false, true, 41));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 42
                yield "               ";
                $context["skill"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, true, 42), 42, $this->source), "--");
                // line 43
                yield "               ";
                if (((($__internal_compile_0 = ($context["skill"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["0"] ?? null) : null) && (($__internal_compile_1 = ($context["skill"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["1"] ?? null) : null))) {
                    // line 44
                    yield "                  <div class=\"team-skill\">
                     <div class=\"progress-label\">";
                    // line 45
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_2 = ($context["skill"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["0"] ?? null) : null), 45, $this->source), "html", null, true);
                    yield "</div>
                        <div class=\"progress\">
                           <div class=\"progress-bar\" data-progress-animation=\"";
                    // line 47
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_3 = ($context["skill"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["1"] ?? null) : null), 47, $this->source), "html", null, true);
                    yield "%\"><span></span></div>
                           <span class=\"percentage\"><span></span>";
                    // line 48
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_4 = ($context["skill"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["1"] ?? null) : null), 48, $this->source), "html", null, true);
                    yield "%</span>
                     </div>
                  </div>
               ";
                }
                // line 52
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            yield "         </div>
      </div>
  </div>

";
        } elseif ((        // line 57
($context["view_mode"] ?? null) == "teaser_2")) {
            // line 58
            yield "
<div";
            // line 59
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 59), 59, $this->source), "html", null, true);
            yield ">
   <div class=\"team-block team-two__single\">
      <div class=\"team-two__image\">
         ";
            // line 62
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_team_image", [], "any", false, false, true, 62), 62, $this->source), "html", null, true);
            yield "
         <div class=\"team-two__socials\">
            ";
            // line 64
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_facebook", [], "any", false, false, true, 64), "value", [], "any", false, false, true, 64)) {
                // line 65
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_facebook", [], "any", false, false, true, 65), "value", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-facebook\"></i></a>
            ";
            }
            // line 67
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_google", [], "any", false, false, true, 67), "value", [], "any", false, false, true, 67)) {
                // line 68
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_google", [], "any", false, false, true, 68), "value", [], "any", false, false, true, 68), 68, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-google\"></i></a>
            ";
            }
            // line 70
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_pinterest", [], "any", false, false, true, 70), "value", [], "any", false, false, true, 70)) {
                // line 71
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_pinterest", [], "any", false, false, true, 71), "value", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-pinterest\"></i></a>
            ";
            }
            // line 73
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_twitter", [], "any", false, false, true, 73), "value", [], "any", false, false, true, 73)) {
                // line 74
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_twitter", [], "any", false, false, true, 74), "value", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-twitter\"></i></a>
            ";
            }
            // line 76
            yield "            ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_linkedin", [], "any", false, false, true, 76), "value", [], "any", false, false, true, 76)) {
                // line 77
                yield "               <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_linkedin", [], "any", false, false, true, 77), "value", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-linkedin\"></i></a>
            ";
            }
            // line 79
            yield "         </div>
      </div>
      <div class=\"team-two__content\">
         <h3 class=\"team-two__name\"><a href=\"";
            // line 82
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 82, $this->source), "html", null, true);
            yield "\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_name", [], "any", false, false, true, 82), "value", [], "any", false, false, true, 82), 82, $this->source));
            yield "</a></h3>
         ";
            // line 83
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_position", [], "any", false, false, true, 83), "value", [], "any", false, false, true, 83)) {
                // line 84
                yield "           <div class=\"team-two__job\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_position", [], "any", false, false, true, 84), "value", [], "any", false, false, true, 84), 84, $this->source));
                yield "</div>
         ";
            }
            // line 86
            yield "      </div>
   </div>
</div>

<!-- End Display article for teaser page -->
";
        } else {
            // line 92
            yield "<!-- Start Display article for detail page -->

<article";
            // line 94
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 94), "addClass", ["node-detail"], "method", false, false, true, 94), 94, $this->source), "html", null, true);
            yield ">
  <div class=\"team-single-page\">

    <div class=\"team-name clearfix\">
      <div class=\"name\">";
            // line 98
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_name", [], "any", false, false, true, 98), "value", [], "any", false, false, true, 98), 98, $this->source));
            yield "</div>
      <div class=\"job\">";
            // line 99
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_position", [], "any", false, false, true, 99), "value", [], "any", false, false, true, 99), 99, $this->source));
            yield "</div>
      <div class=\"line\"><span class=\"one\"></span><span class=\"second\"></span><span class=\"three\"></span></div>
    </div>
    <div class=\"team-description\">";
            // line 102
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_team_description", [], "any", false, false, true, 102), 102, $this->source), "html", null, true);
            yield "</div>
    <div class=\"team-info\">
      <div class=\"row\">
        <div class=\"col-lg-4 col-sm-12 col-xs-12\">
          <div class=\"team-image\">";
            // line 106
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_team_image", [], "any", false, false, true, 106), 106, $this->source), "html", null, true);
            yield "</div>
        </div>
        <div class=\"col-lg-8 col-sm-12 col-xs-12\">
          <div class=\"team-contact\">
            <div class=\"heading\">";
            // line 110
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Contact Info"));
            yield "</div>
            <div class=\"content-inner\">";
            // line 111
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_team_contact", [], "any", false, false, true, 111), 111, $this->source), "html", null, true);
            yield "</div>
            <div class=\"socials\">
                ";
            // line 113
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_facebook", [], "any", false, false, true, 113), "value", [], "any", false, false, true, 113)) {
                // line 114
                yield "                  <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_facebook", [], "any", false, false, true, 114), "value", [], "any", false, false, true, 114), 114, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-facebook\"></i></a>
                ";
            }
            // line 116
            yield "                ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_google", [], "any", false, false, true, 116), "value", [], "any", false, false, true, 116)) {
                // line 117
                yield "                  <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_google", [], "any", false, false, true, 117), "value", [], "any", false, false, true, 117), 117, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-google\"></i></a>
                ";
            }
            // line 119
            yield "                ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_pinterest", [], "any", false, false, true, 119), "value", [], "any", false, false, true, 119)) {
                // line 120
                yield "                  <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_pinterest", [], "any", false, false, true, 120), "value", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-pinterest\"></i></a>
                ";
            }
            // line 122
            yield "                ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_twitter", [], "any", false, false, true, 122), "value", [], "any", false, false, true, 122)) {
                // line 123
                yield "                  <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_twitter", [], "any", false, false, true, 123), "value", [], "any", false, false, true, 123), 123, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-twitter\"></i></a>
                ";
            }
            // line 125
            yield "                ";
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_linkedin", [], "any", false, false, true, 125), "value", [], "any", false, false, true, 125)) {
                // line 126
                yield "                  <a class=\"gva-social\" href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_linkedin", [], "any", false, false, true, 126), "value", [], "any", false, false, true, 126), 126, $this->source), "html", null, true);
                yield "\"><i class=\"fab fa-linkedin\"></i></a>
                ";
            }
            // line 128
            yield "            </div>
          </div>
          <div class=\"team-education\">
            <div class=\"heading\">";
            // line 131
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Education"));
            yield "</div>
            <div class=\"content-inner\">";
            // line 132
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_team_education", [], "any", false, false, true, 132), 132, $this->source), "html", null, true);
            yield "</div>
          </div>
          <div class=\"team-skills mt-30\">
            ";
            // line 135
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_team_skills", [], "any", false, false, true, 135));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 136
                yield "              ";
                $context["skill"] = Twig\Extension\CoreExtension::split($this->env->getCharset(), $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, true, 136), 136, $this->source), "--");
                // line 137
                yield "              ";
                if (((($__internal_compile_5 = ($context["skill"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["0"] ?? null) : null) && (($__internal_compile_6 = ($context["skill"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["1"] ?? null) : null))) {
                    // line 138
                    yield "                <div class=\"team-skill mb-10\">
                  <div class=\"progress-label\">";
                    // line 139
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_7 = ($context["skill"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["0"] ?? null) : null), 139, $this->source), "html", null, true);
                    yield "</div>
                   <div class=\"progress\">
                     <div class=\"progress-bar\" data-progress-animation=\"";
                    // line 141
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_8 = ($context["skill"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["1"] ?? null) : null), 141, $this->source), "html", null, true);
                    yield "%\"><span></span></div>
                     <span class=\"percentage\"><span></span>";
                    // line 142
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_9 = ($context["skill"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["1"] ?? null) : null), 142, $this->source), "html", null, true);
                    yield "%</span>
                  </div>
                </div>
              ";
                }
                // line 146
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 147
            yield "          </div>
        </div>
      </div>
    </div>

    <div";
            // line 152
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["node__content", "clearfix"], "method", false, false, true, 152), 152, $this->source), "html", null, true);
            yield ">
      ";
            // line 153
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 153, $this->source), "field_team_name", "field_team_contact", "field_team_image", "field_team_skills", "field_team_contact", "field_team_quote", "field_team_social", "field_team_education", "field_team_position", "field_team_email", "field_team_description", "comment"), "html", null, true);
            yield "
    </div>

    <div class=\"team-quote\"> ";
            // line 156
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_team_quote", [], "any", false, false, true, 156), 156, $this->source), "html", null, true);
            yield " </div>

    ";
            // line 158
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "comment", [], "any", false, false, true, 158)) {
                // line 159
                yield "      <div id=\"node-single-comment\">
        ";
                // line 160
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "comment", [], "any", false, false, true, 160), 160, $this->source), "html", null, true);
                yield "
      </div>
    ";
            }
            // line 163
            yield "
  </div>
</article>

<!-- End Display article for detail page -->
";
        }
        // line 169
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "content", "url", "attributes", "content_attributes"]);        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "themes/custom/notech/templates/node/node--team.html.twig";
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
        return array (  430 => 169,  422 => 163,  416 => 160,  413 => 159,  411 => 158,  406 => 156,  400 => 153,  396 => 152,  389 => 147,  383 => 146,  376 => 142,  372 => 141,  367 => 139,  364 => 138,  361 => 137,  358 => 136,  354 => 135,  348 => 132,  344 => 131,  339 => 128,  333 => 126,  330 => 125,  324 => 123,  321 => 122,  315 => 120,  312 => 119,  306 => 117,  303 => 116,  297 => 114,  295 => 113,  290 => 111,  286 => 110,  279 => 106,  272 => 102,  266 => 99,  262 => 98,  255 => 94,  251 => 92,  243 => 86,  237 => 84,  235 => 83,  229 => 82,  224 => 79,  218 => 77,  215 => 76,  209 => 74,  206 => 73,  200 => 71,  197 => 70,  191 => 68,  188 => 67,  182 => 65,  180 => 64,  175 => 62,  169 => 59,  166 => 58,  164 => 57,  158 => 53,  152 => 52,  145 => 48,  141 => 47,  136 => 45,  133 => 44,  130 => 43,  127 => 42,  123 => 41,  118 => 39,  112 => 38,  107 => 35,  101 => 33,  98 => 32,  92 => 30,  89 => 29,  83 => 27,  80 => 26,  74 => 24,  71 => 23,  65 => 21,  63 => 20,  58 => 18,  53 => 15,  51 => 14,  47 => 12,  45 => 8,  44 => 7,  43 => 6,  42 => 5,  41 => 4,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
  set classes = [
    'node',
    'node--type-' ~ node.bundle|clean_class,
    node.isPromoted() ? 'node--promoted',
    node.isSticky() ? 'node--sticky',
    not node.isPublished() ? 'node--unpublished',
    view_mode ? 'node--view-mode-' ~ view_mode|clean_class,
    'clearfix',
  ]
%}

<!-- Start Display article for teaser page -->
{% if view_mode == 'teaser' %}

   <div class=\"team-block team-v1\">
      <div class=\"team-image\">
         {{ content.field_team_image }}
         <div class=\"socials-team\">
            {% if node.field_team_facebook.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_facebook.value }}\"><i class=\"fab fa-facebook\"></i></a>
            {% endif %}
            {% if node.field_team_google.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_google.value }}\"><i class=\"fab fa-google\"></i></a>
            {% endif %}
            {% if node.field_team_pinterest.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_pinterest.value }}\"><i class=\"fab fa-pinterest\"></i></a>
            {% endif %}
            {% if node.field_team_twitter.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_twitter.value }}\"><i class=\"fab fa-twitter\"></i></a>
            {% endif %}
            {% if node.field_team_linkedin.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_linkedin.value }}\"><i class=\"fab fa-linkedin\"></i></a>
            {% endif %}
         </div>
      </div>
      <div class=\"team-content\">
         <h3 class=\"team-name\"><a href=\"{{ url }}\">{{ node.field_team_name.value|e }}</a></h3>
         <div class=\"team-job\">{{ node.field_team_position.value|e }}</div>
         <div class=\"team-skills\">
            {% for item in node.field_team_skills %}
               {% set skill = item.value|split('--') %}
               {% if skill['0'] and skill['1'] %}
                  <div class=\"team-skill\">
                     <div class=\"progress-label\">{{ skill['0'] }}</div>
                        <div class=\"progress\">
                           <div class=\"progress-bar\" data-progress-animation=\"{{ skill['1'] }}%\"><span></span></div>
                           <span class=\"percentage\"><span></span>{{ skill['1'] }}%</span>
                     </div>
                  </div>
               {% endif %}
            {% endfor %}
         </div>
      </div>
  </div>

{% elseif view_mode == 'teaser_2' %}

<div{{ attributes.addClass(classes) }}>
   <div class=\"team-block team-two__single\">
      <div class=\"team-two__image\">
         {{ content.field_team_image }}
         <div class=\"team-two__socials\">
            {% if node.field_team_facebook.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_facebook.value }}\"><i class=\"fab fa-facebook\"></i></a>
            {% endif %}
            {% if node.field_team_google.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_google.value }}\"><i class=\"fab fa-google\"></i></a>
            {% endif %}
            {% if node.field_team_pinterest.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_pinterest.value }}\"><i class=\"fab fa-pinterest\"></i></a>
            {% endif %}
            {% if node.field_team_twitter.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_twitter.value }}\"><i class=\"fab fa-twitter\"></i></a>
            {% endif %}
            {% if node.field_team_linkedin.value %}
               <a class=\"gva-social\" href=\"{{ node.field_team_linkedin.value }}\"><i class=\"fab fa-linkedin\"></i></a>
            {% endif %}
         </div>
      </div>
      <div class=\"team-two__content\">
         <h3 class=\"team-two__name\"><a href=\"{{ url }}\">{{ node.field_team_name.value|e }}</a></h3>
         {% if node.field_team_position.value %}
           <div class=\"team-two__job\">{{ node.field_team_position.value|e }}</div>
         {% endif %}
      </div>
   </div>
</div>

<!-- End Display article for teaser page -->
{% else %}
<!-- Start Display article for detail page -->

<article{{ attributes.addClass(classes).addClass('node-detail') }}>
  <div class=\"team-single-page\">

    <div class=\"team-name clearfix\">
      <div class=\"name\">{{ node.field_team_name.value|e }}</div>
      <div class=\"job\">{{ node.field_team_position.value|e }}</div>
      <div class=\"line\"><span class=\"one\"></span><span class=\"second\"></span><span class=\"three\"></span></div>
    </div>
    <div class=\"team-description\">{{ content.field_team_description }}</div>
    <div class=\"team-info\">
      <div class=\"row\">
        <div class=\"col-lg-4 col-sm-12 col-xs-12\">
          <div class=\"team-image\">{{ content.field_team_image }}</div>
        </div>
        <div class=\"col-lg-8 col-sm-12 col-xs-12\">
          <div class=\"team-contact\">
            <div class=\"heading\">{{'Contact Info'|t}}</div>
            <div class=\"content-inner\">{{ content.field_team_contact }}</div>
            <div class=\"socials\">
                {% if node.field_team_facebook.value %}
                  <a class=\"gva-social\" href=\"{{ node.field_team_facebook.value }}\"><i class=\"fab fa-facebook\"></i></a>
                {% endif %}
                {% if node.field_team_google.value %}
                  <a class=\"gva-social\" href=\"{{ node.field_team_google.value }}\"><i class=\"fab fa-google\"></i></a>
                {% endif %}
                {% if node.field_team_pinterest.value %}
                  <a class=\"gva-social\" href=\"{{ node.field_team_pinterest.value }}\"><i class=\"fab fa-pinterest\"></i></a>
                {% endif %}
                {% if node.field_team_twitter.value %}
                  <a class=\"gva-social\" href=\"{{ node.field_team_twitter.value }}\"><i class=\"fab fa-twitter\"></i></a>
                {% endif %}
                {% if node.field_team_linkedin.value %}
                  <a class=\"gva-social\" href=\"{{ node.field_team_linkedin.value }}\"><i class=\"fab fa-linkedin\"></i></a>
                {% endif %}
            </div>
          </div>
          <div class=\"team-education\">
            <div class=\"heading\">{{'Education'|t}}</div>
            <div class=\"content-inner\">{{ content.field_team_education }}</div>
          </div>
          <div class=\"team-skills mt-30\">
            {% for item in node.field_team_skills %}
              {% set skill = item.value|split('--') %}
              {% if skill['0'] and skill['1'] %}
                <div class=\"team-skill mb-10\">
                  <div class=\"progress-label\">{{ skill['0'] }}</div>
                   <div class=\"progress\">
                     <div class=\"progress-bar\" data-progress-animation=\"{{ skill['1'] }}%\"><span></span></div>
                     <span class=\"percentage\"><span></span>{{ skill['1'] }}%</span>
                  </div>
                </div>
              {% endif %}
            {% endfor %}
          </div>
        </div>
      </div>
    </div>

    <div{{ content_attributes.addClass('node__content', 'clearfix') }}>
      {{ content|without('field_team_name', 'field_team_contact', 'field_team_image', 'field_team_skills', 'field_team_contact', 'field_team_quote', 'field_team_social', 'field_team_education', 'field_team_position', 'field_team_email', 'field_team_description', 'comment') }}
    </div>

    <div class=\"team-quote\"> {{content.field_team_quote}} </div>

    {% if content.comment %}
      <div id=\"node-single-comment\">
        {{ content.comment }}
      </div>
    {% endif %}

  </div>
</article>

<!-- End Display article for detail page -->
{% endif %}

", "themes/custom/notech/templates/node/node--team.html.twig", "/var/www/html/themes/custom/notech/templates/node/node--team.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 14, "for" => 41);
        static $filters = array("clean_class" => 4, "escape" => 18, "e" => 38, "split" => 42, "t" => 110, "without" => 153);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['clean_class', 'escape', 'e', 'split', 't', 'without'],
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
