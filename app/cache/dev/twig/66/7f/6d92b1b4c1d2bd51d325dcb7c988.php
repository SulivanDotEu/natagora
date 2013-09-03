<?php

/* WalvaUserBundle:Security:login.html.twig */
class __TwigTemplate_667f6d92b1b4c1d2bd51d325dcb7c988 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::login.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::login.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
  ";
        // line 10
        echo "  

  ";
        // line 13
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\" class=\"form-signin\">
    
    <h2 class=\"form-signin-heading\">Please sign in</h2>
    ";
        // line 16
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 17
            echo "<div class=\"alert alert-error\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message"), "html", null, true);
            echo "</div>
  ";
        }
        // line 19
        echo "    <!--<label for=\"username\">Login :</label>-->
    <input type=\"text\" class=\"input-block-level\" id=\"username\" name=\"_username\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" placeholder=\"Email address\" />

    <!--<label for=\"password\">Mot de passe :</label>-->
    <input type=\"password\" class=\"input-block-level\" id=\"password\" name=\"_password\" placeholder=\"Password\"/>
    <br />
    
    <input type=\"submit\" value=\"Connexion\" class=\"btn btn-large btn-primary\"/>
</form>



<form action=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
    <label for=\"username\">Login :</label>
    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />
 
    <label for=\"password\">Mot de passe :</label>
    <input type=\"password\" id=\"password\" name=\"_password\" />
    <br />
    <input type=\"submit\" value=\"Connexion\" />
  </form>

";
    }

    public function getTemplateName()
    {
        return "WalvaUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 10,  104 => 42,  97 => 37,  63 => 25,  129 => 61,  77 => 30,  90 => 31,  261 => 135,  256 => 133,  253 => 132,  249 => 120,  238 => 113,  233 => 121,  231 => 119,  226 => 116,  217 => 108,  205 => 98,  195 => 14,  191 => 13,  188 => 12,  185 => 11,  179 => 9,  127 => 82,  113 => 54,  81 => 34,  124 => 59,  76 => 28,  58 => 19,  59 => 6,  53 => 19,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 134,  252 => 80,  247 => 78,  241 => 114,  235 => 74,  229 => 73,  224 => 113,  220 => 70,  214 => 107,  208 => 99,  169 => 60,  143 => 56,  140 => 55,  132 => 51,  128 => 49,  119 => 45,  107 => 41,  71 => 30,  177 => 65,  165 => 64,  160 => 123,  135 => 47,  126 => 61,  114 => 46,  84 => 37,  70 => 31,  67 => 26,  61 => 18,  38 => 13,  94 => 38,  89 => 32,  85 => 31,  75 => 33,  68 => 23,  56 => 20,  87 => 33,  21 => 2,  26 => 2,  93 => 28,  88 => 38,  78 => 30,  46 => 14,  27 => 4,  44 => 11,  31 => 8,  28 => 7,  201 => 92,  196 => 90,  183 => 70,  171 => 132,  166 => 71,  163 => 70,  158 => 107,  156 => 58,  151 => 102,  142 => 59,  138 => 57,  136 => 56,  121 => 59,  117 => 45,  105 => 49,  91 => 38,  62 => 21,  49 => 17,  24 => 6,  25 => 3,  19 => 3,  79 => 28,  72 => 24,  69 => 24,  47 => 17,  40 => 11,  37 => 10,  22 => 2,  246 => 119,  157 => 56,  145 => 46,  139 => 50,  131 => 83,  123 => 47,  120 => 40,  115 => 43,  111 => 51,  108 => 49,  101 => 36,  98 => 42,  96 => 31,  83 => 25,  74 => 30,  66 => 24,  55 => 23,  52 => 18,  50 => 12,  43 => 8,  41 => 7,  35 => 6,  32 => 3,  29 => 5,  209 => 82,  203 => 78,  199 => 15,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 137,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 98,  147 => 58,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 53,  112 => 42,  109 => 41,  106 => 36,  103 => 46,  99 => 36,  95 => 42,  92 => 32,  86 => 30,  82 => 28,  80 => 29,  73 => 23,  64 => 22,  60 => 22,  57 => 14,  54 => 20,  51 => 19,  48 => 13,  45 => 16,  42 => 7,  39 => 10,  36 => 5,  33 => 7,  30 => 6,);
    }
}
