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

                                        <i class=\"icon-bullhorn\">
                                        </i> Projets et activités <span class=\"label label-success\">2</span>
                                        <b class=\"caret\"></b>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"http://bootsnipp.com/resources\"><i class=\"icon-share\"></i> Acceuil des étudiants</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/forms\"><i class=\"icon-tasks\"></i> Insertion professionnelle</a></li>
                                        <li class=\"divider\"></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Welcome Day</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Welcome Night</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Atelier Blocus</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Atelier Méthodologie</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Soirées Témoignages</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Soirée Postuler</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Soirée Vie Active</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Témoignage parcours internationaux</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Run&AMP;Bloque</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <li class=\"\"><a href=\"http://bootsnipp.com/tags\"><i class=\"icon-calendar\"></i> Calendrier</a></li>
                            <ul class=\"nav\">
                                <li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-list-alt\"></i> Parainage <span class=\"label label-success\">new</span> <b class=\"caret\"></b></a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"http://bootsnipp.com/resources\"><i class=\"icon-share\"></i> List of Resources</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/forms\"><i class=\"icon-tasks\"></i> Form Builder</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/buttons\"><i class=\"icon-pencil\"></i> Button Builder <span class=\"label label-success\">new</span></a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class=\"nav\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                        <i class=\"icon-info-sign\">
                                        </i> A propos <span class=\"label label-success\">2</span>
                                        <b class=\"caret\"></b>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"http://bootsnipp.com/resources\"><i class=\"icon-share\"></i> Equipe</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/forms\"><i class=\"icon-tasks\"></i> Contact</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/forms\"><i class=\"icon-tasks\"></i> Liens</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/forms\"><i class=\"icon-tasks\"></i> Partenaires et Sponsors</a></li>

                                    </ul>
                                </li>
                            </ul>
                            <ul class=\"nav\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                        <i class=\"icon-wrench\">
                                        </i> Administration <span class=\"label label-success\">2</span>
                                        <b class=\"caret\"></b>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li class=\"\"><a href=\"";
        // line 92
        echo $this->env->getExtension('routing')->getPath("formation");
        echo "\"><i class=\"icon-share\"></i> Année</a></li>
                                        <li class=\"\"><a href=\"";
        // line 93
        echo $this->env->getExtension('routing')->getPath("formation");
        echo "\"><i class=\"icon-tasks\"></i> Fac</a></li>
                                        <li class=\"\"><a href=\"";
        // line 94
        echo $this->env->getExtension('routing')->getPath("formation");
        echo "\"><i class=\"icon-tasks\"></i> Parrain</a></li>
                                        <li class=\"\"><a href=\"http://bootsnipp.com/forms\"><i class=\"icon-tasks\"></i> Partenaires et Sponsors</a></li>

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
        // line 109
        $this->displayBlock('header', $context, $blocks);
        // line 113
        echo "
                </div>
            </div>
            <div class=\"container-fluid\" id=\"mainContainer\">
                <div class=\"row-fluid\">
                    ";
        // line 118
        $this->displayBlock('container', $context, $blocks);
        // line 140
        echo "                    </div>

                    <hr>

                    <footer>
                        <p>Natagora &AMP; Benjamin Ellis © 2013 and beyond.</p>
                    </footer>
                </div>

  ";
        // line 149
        $this->displayBlock('javascripts', $context, $blocks);
        // line 154
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

    // line 109
    public function block_header($context, array $blocks = array())
    {
        // line 110
        echo "                    <h1>Titre de la page</h1>
                    <p>Ce projet est propulsé par Symfony2, et construit grâce au tutoriel du siteduzero.</p>
                ";
    }

    // line 118
    public function block_container($context, array $blocks = array())
    {
        // line 119
        echo "                        <div id=\"menu\" class=\"span3\">

                        ";
        // line 121
        $this->displayBlock('left_menu', $context, $blocks);
        // line 123
        echo "

          ";
        // line 126
        echo "                        </div>
                        <div id=\"content\" class=\"span9\">
                            <ul class=\"breadcrumb\">

                        ";
        // line 130
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 133
        echo "

                            </ul>
          ";
        // line 136
        $this->displayBlock('body', $context, $blocks);
        // line 138
        echo "                        </div>
                        ";
    }

    // line 121
    public function block_left_menu($context, array $blocks = array())
    {
        // line 122
        echo "          ";
    }

    // line 130
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 131
        echo "                                <li><a href=\"#\">Formations-nature.be</a> <span class=\"divider\">/</span></li>
                            ";
    }

    // line 136
    public function block_body($context, array $blocks = array())
    {
        // line 137
        echo "          ";
    }

    // line 149
    public function block_javascripts($context, array $blocks = array())
    {
        // line 150
        echo "    ";
        // line 151
        echo "                <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
                <script type=\"text/javascript\" src=\"";
        // line 152
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
        return array (  274 => 152,  271 => 151,  269 => 150,  266 => 149,  262 => 137,  259 => 136,  254 => 131,  251 => 130,  247 => 122,  244 => 121,  239 => 138,  237 => 136,  232 => 133,  230 => 130,  224 => 126,  220 => 123,  218 => 121,  214 => 119,  211 => 118,  205 => 110,  202 => 109,  196 => 15,  192 => 14,  188 => 13,  185 => 12,  182 => 11,  176 => 9,  170 => 154,  168 => 149,  157 => 140,  155 => 118,  148 => 113,  146 => 109,  128 => 94,  124 => 93,  120 => 92,  41 => 11,  36 => 9,  27 => 2,  61 => 17,  46 => 13,  43 => 17,  40 => 10,  33 => 7,  30 => 6,  73 => 23,  67 => 19,  57 => 14,  53 => 19,  50 => 16,  45 => 8,  42 => 7,  35 => 4,  32 => 3,  126 => 50,  119 => 45,  107 => 39,  101 => 36,  94 => 32,  90 => 31,  86 => 30,  82 => 29,  78 => 28,  74 => 27,  70 => 26,  64 => 18,  58 => 16,  55 => 23,  51 => 22,  31 => 4,  28 => 3,);
    }
}
