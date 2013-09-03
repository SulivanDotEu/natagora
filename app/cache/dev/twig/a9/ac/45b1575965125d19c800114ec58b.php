<?php

/* ::layout.html.twig */
class __TwigTemplate_a9ac45b1575965125d19c800114ec58b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'header' => array($this, 'block_header'),
            'container' => array($this, 'block_container'),
            'left_menu' => array($this, 'block_left_menu'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "    </head>

    <body>
        <div class=\"navbar navbar-static-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </a>
                    <div class=\"nav-collapse\">
                        <ul class=\"nav\">
                            <li class=\"\"><a href=\"http://bootsnipp.com/\"><i class=\"icon-home\"></i> Accueil</a></li>
                            <ul class=\"nav\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                        <i class=\"icon-calendar\">
                                        </i> Evenement 
                                        <b class=\"caret\"></b>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("evenement_new");
        echo "\"><i class=\"icon-plus\"></i> Ajouter</a></li>
                                        <li class=\"\"><a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("evenement");
        echo "\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class=\"nav\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                        <i class=\"icon-calendar\">
                                        </i> Lieu 
                                        <b class=\"caret\"></b>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("lieu_new");
        echo "\"><i class=\"icon-plus\"></i> Ajouter</a></li>
                                        <li class=\"\"><a href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("lieu");
        echo "\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class=\"nav\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                        <i class=\"icon-calendar\">
                                        </i> Formation
                                        <b class=\"caret\"></b>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"";
        // line 68
        echo $this->env->getExtension('routing')->getPath("formation_new");
        echo "\"><i class=\"icon-plus\"></i> Ajouter</a></li>
                                        <li class=\"\"><a href=\"";
        // line 69
        echo $this->env->getExtension('routing')->getPath("formation");
        echo "\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class=\"nav\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                        <i class=\"icon-calendar\">
                                        </i> Formateur 
                                        <b class=\"caret\"></b>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"";
        // line 82
        echo $this->env->getExtension('routing')->getPath("formateur_new");
        echo "\"><i class=\"icon-plus\"></i> Ajouter</a></li>
                                        <li class=\"\"><a href=\"";
        // line 83
        echo $this->env->getExtension('routing')->getPath("formateur");
        echo "\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                    </ul>
                                </li>
                            </ul>
                            

                        </ul>

                    </div><!--/.nav-collapse -->

                </div>
            </div>
        </div>
        <div id=\"header\" class=\"\">
            <div class=\"container\">
";
        // line 98
        $this->displayBlock('header', $context, $blocks);
        // line 102
        echo "
                </div>
            </div>
            <div class=\"container-fluid\" id=\"mainContainer\">
                <div class=\"row-fluid\">
                    ";
        // line 107
        $this->displayBlock('container', $context, $blocks);
        // line 129
        echo "                    </div>

                    <hr>

                    <footer>
                        <p>Natagora &AMP; Benjamin Ellis © 2013 and beyond.</p>
                    </footer>
                </div>

  ";
        // line 138
        $this->displayBlock('javascripts', $context, $blocks);
        // line 143
        echo "
            </body>
        </html>";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "Support Kot";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 12
        echo "
        <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/supportkot.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
    }

    // line 98
    public function block_header($context, array $blocks = array())
    {
        // line 99
        echo "                    <h1>Titre de la page</h1>
                    <p>Ce projet est propulsé par Symfony2, et construit grâce au tutoriel du siteduzero.</p>
                ";
    }

    // line 107
    public function block_container($context, array $blocks = array())
    {
        // line 108
        echo "                        <div id=\"menu\" class=\"span3\">

                        ";
        // line 110
        $this->displayBlock('left_menu', $context, $blocks);
        // line 112
        echo "

          ";
        // line 115
        echo "                        </div>
                        <div id=\"content\" class=\"span9\">
                            <ul class=\"breadcrumb\">

                        ";
        // line 119
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 122
        echo "

                            </ul>
          ";
        // line 125
        $this->displayBlock('body', $context, $blocks);
        // line 127
        echo "                        </div>
                        ";
    }

    // line 110
    public function block_left_menu($context, array $blocks = array())
    {
        // line 111
        echo "          ";
    }

    // line 119
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 120
        echo "                                <li><a href=\"#\">Formations-nature.be</a> <span class=\"divider\">/</span></li>
                            ";
    }

    // line 125
    public function block_body($context, array $blocks = array())
    {
        // line 126
        echo "          ";
    }

    // line 138
    public function block_javascripts($context, array $blocks = array())
    {
        // line 139
        echo "    ";
        // line 140
        echo "                <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
                <script type=\"text/javascript\" src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 141,  275 => 140,  273 => 139,  270 => 138,  266 => 126,  263 => 125,  258 => 120,  255 => 119,  251 => 111,  248 => 110,  243 => 127,  241 => 125,  236 => 122,  234 => 119,  228 => 115,  224 => 112,  222 => 110,  218 => 108,  215 => 107,  209 => 99,  206 => 98,  200 => 15,  196 => 14,  192 => 13,  189 => 12,  186 => 11,  180 => 9,  174 => 143,  172 => 138,  161 => 129,  159 => 107,  152 => 102,  150 => 98,  132 => 83,  128 => 82,  112 => 69,  108 => 68,  92 => 55,  88 => 54,  72 => 41,  68 => 40,  43 => 17,  41 => 11,  36 => 9,  27 => 2,);
    }
}
