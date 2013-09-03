<?php

/* ::login.html.twig */
class __TwigTemplate_975f5d752c1a07af5a636a1a0c145867 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <title>Sign in &middot; Twitter Bootstrap</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">


        ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 51
        echo "
            <!-- Fav and touch icons -->
            <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"../assets/ico/apple-touch-icon-144-precomposed.png\">
            <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"../assets/ico/apple-touch-icon-114-precomposed.png\">
            <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"../assets/ico/apple-touch-icon-72-precomposed.png\">
            <link rel=\"apple-touch-icon-precomposed\" href=\"../assets/ico/apple-touch-icon-57-precomposed.png\">
            <link rel=\"shortcut icon\" href=\"../assets/ico/favicon.png\">
        </head>

        <body>

            <div class=\"container\">

                ";
        // line 64
        $this->displayBlock('body', $context, $blocks);
        // line 68
        echo "


            </div> <!-- /container -->

  ";
        // line 73
        $this->displayBlock('javascripts', $context, $blocks);
        // line 78
        echo "
        </body>
    </html>
";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 13
        echo "
        <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/supportkot.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <style type=\"text/css\">
                body {
                    padding-top: 40px;
                    padding-bottom: 40px;
                    background-color: #f5f5f5;
                }

                .form-signin {
                    max-width: 300px;
                    padding: 19px 29px 29px;
                    margin: 0 auto 20px;
                    background-color: #fff;
                    border: 1px solid #e5e5e5;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    box-shadow: 0 1px 2px rgba(0,0,0,.05);
                }
                .form-signin .form-signin-heading,
                .form-signin .checkbox {
                    margin-bottom: 10px;
                }
                .form-signin input[type=\"text\"],
                .form-signin input[type=\"password\"] {
                    font-size: 16px;
                    height: auto;
                    margin-bottom: 15px;
                    padding: 7px 9px;
                }

            </style>
    ";
    }

    // line 64
    public function block_body($context, array $blocks = array())
    {
        // line 65
        echo "

";
    }

    // line 73
    public function block_javascripts($context, array $blocks = array())
    {
        // line 74
        echo "    ";
        // line 75
        echo "            <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::login.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  137 => 75,  34 => 10,  104 => 42,  97 => 37,  63 => 78,  129 => 61,  77 => 30,  90 => 31,  261 => 135,  256 => 133,  253 => 132,  249 => 120,  238 => 113,  233 => 121,  231 => 119,  226 => 116,  217 => 108,  205 => 98,  195 => 14,  191 => 13,  188 => 12,  185 => 11,  179 => 9,  127 => 82,  113 => 54,  81 => 34,  124 => 59,  76 => 14,  58 => 19,  59 => 6,  53 => 19,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 134,  252 => 80,  247 => 78,  241 => 114,  235 => 74,  229 => 73,  224 => 113,  220 => 70,  214 => 107,  208 => 99,  169 => 60,  143 => 56,  140 => 76,  132 => 73,  128 => 49,  119 => 45,  107 => 41,  71 => 30,  177 => 65,  165 => 64,  160 => 123,  135 => 74,  126 => 65,  114 => 46,  84 => 16,  70 => 12,  67 => 26,  61 => 73,  38 => 13,  94 => 38,  89 => 32,  85 => 31,  75 => 33,  68 => 23,  56 => 20,  87 => 33,  21 => 2,  26 => 2,  93 => 28,  88 => 38,  78 => 30,  46 => 14,  27 => 4,  44 => 11,  31 => 8,  28 => 7,  201 => 92,  196 => 90,  183 => 70,  171 => 132,  166 => 71,  163 => 70,  158 => 107,  156 => 58,  151 => 102,  142 => 59,  138 => 57,  136 => 56,  121 => 59,  117 => 45,  105 => 49,  91 => 38,  62 => 21,  49 => 17,  24 => 6,  25 => 3,  19 => 3,  79 => 28,  72 => 24,  69 => 24,  47 => 17,  40 => 11,  37 => 51,  22 => 1,  246 => 119,  157 => 56,  145 => 46,  139 => 50,  131 => 83,  123 => 64,  120 => 40,  115 => 43,  111 => 51,  108 => 49,  101 => 36,  98 => 42,  96 => 31,  83 => 25,  74 => 30,  66 => 24,  55 => 23,  52 => 64,  50 => 12,  43 => 8,  41 => 7,  35 => 12,  32 => 3,  29 => 5,  209 => 82,  203 => 78,  199 => 15,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 137,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 98,  147 => 58,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 53,  112 => 42,  109 => 41,  106 => 36,  103 => 46,  99 => 36,  95 => 42,  92 => 32,  86 => 30,  82 => 28,  80 => 15,  73 => 13,  64 => 22,  60 => 22,  57 => 14,  54 => 68,  51 => 19,  48 => 13,  45 => 16,  42 => 7,  39 => 10,  36 => 5,  33 => 7,  30 => 6,);
    }
}
