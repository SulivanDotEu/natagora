<?php

/* WalvaNatagoraBundle:Formation:index.html.twig */
class __TwigTemplate_588cc64ae5aa8b6f0381f1b44f4cc7c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WalvaNatagoraBundle:Formation:layout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WalvaNatagoraBundle:Formation:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Formation list</h1>

    <table class=\"table table-striped table-hover\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nom complet</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 17
            echo "            <tr>
                <td><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("formation_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</a></td>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nom"), "html", null, true);
            echo "</td>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nomComplet"), "html", null, true);
            echo "</td>
                <td>
                <ul>
                    <li>
                        <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("formation_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">show</a>
                    </li>
                    <li>
                        <a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("formation_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">edit</a>
                    </li>
                </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
    </table>

        <ul>
        <li>
            <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("formation_new");
        echo "\">
                Create a new entry
            </a>
        </li>
    </ul>
    ";
    }

    public function getTemplateName()
    {
        return "WalvaNatagoraBundle:Formation:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 61,  77 => 30,  90 => 31,  261 => 135,  256 => 133,  253 => 132,  249 => 120,  238 => 113,  233 => 121,  231 => 119,  226 => 116,  217 => 108,  205 => 98,  195 => 14,  191 => 13,  188 => 12,  185 => 11,  179 => 9,  127 => 82,  113 => 54,  81 => 34,  124 => 59,  76 => 28,  58 => 19,  59 => 6,  53 => 13,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 134,  252 => 80,  247 => 78,  241 => 114,  235 => 74,  229 => 73,  224 => 113,  220 => 70,  214 => 107,  208 => 99,  169 => 60,  143 => 56,  140 => 55,  132 => 51,  128 => 49,  119 => 45,  107 => 41,  71 => 26,  177 => 65,  165 => 64,  160 => 123,  135 => 47,  126 => 50,  114 => 46,  84 => 34,  70 => 23,  67 => 23,  61 => 18,  38 => 6,  94 => 38,  89 => 32,  85 => 34,  75 => 27,  68 => 26,  56 => 22,  87 => 33,  21 => 2,  26 => 2,  93 => 28,  88 => 38,  78 => 30,  46 => 14,  27 => 4,  44 => 11,  31 => 4,  28 => 3,  201 => 92,  196 => 90,  183 => 70,  171 => 132,  166 => 71,  163 => 70,  158 => 107,  156 => 58,  151 => 102,  142 => 59,  138 => 57,  136 => 56,  121 => 59,  117 => 45,  105 => 49,  91 => 38,  62 => 20,  49 => 17,  24 => 6,  25 => 3,  19 => 3,  79 => 18,  72 => 27,  69 => 24,  47 => 12,  40 => 11,  37 => 10,  22 => 2,  246 => 119,  157 => 56,  145 => 46,  139 => 50,  131 => 83,  123 => 47,  120 => 40,  115 => 43,  111 => 51,  108 => 49,  101 => 36,  98 => 42,  96 => 31,  83 => 25,  74 => 26,  66 => 24,  55 => 23,  52 => 18,  50 => 12,  43 => 8,  41 => 7,  35 => 4,  32 => 3,  29 => 5,  209 => 82,  203 => 78,  199 => 15,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 137,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 98,  147 => 58,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 53,  112 => 42,  109 => 41,  106 => 36,  103 => 46,  99 => 36,  95 => 41,  92 => 32,  86 => 30,  82 => 28,  80 => 29,  73 => 23,  64 => 19,  60 => 22,  57 => 18,  54 => 16,  51 => 22,  48 => 13,  45 => 16,  42 => 7,  39 => 10,  36 => 5,  33 => 7,  30 => 6,);
    }
}
