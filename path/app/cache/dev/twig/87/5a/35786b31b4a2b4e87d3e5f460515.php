<?php

/* WebProfilerBundle:Profiler:toolbar_item.html.twig */
class __TwigTemplate_875a35786b31b4a2b4e87d3e5f460515 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ($this->getContext($context, "link")) {
            // line 2
            echo "    ";
            ob_start();
            // line 3
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"), "panel" => $this->getContext($context, "name"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "icon"), "html", null, true);
            echo "</a>
    ";
            $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 6
        echo "<div class=\"sf-toolbar-block\">
     <div class=\"sf-toolbar-icon\">";
        // line 7
        echo twig_escape_filter($this->env, ((array_key_exists("icon", $context)) ? (_twig_default_filter($this->getContext($context, "icon"), "")) : ("")), "html", null, true);
        echo "</div>
     <div class=\"sf-toolbar-info\">";
        // line 8
        echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? (_twig_default_filter($this->getContext($context, "text"), "")) : ("")), "html", null, true);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 8,  19 => 2,  274 => 248,  260 => 236,  258 => 235,  255 => 234,  22 => 3,  17 => 1,  405 => 145,  399 => 144,  394 => 141,  382 => 136,  378 => 134,  369 => 132,  365 => 131,  362 => 130,  348 => 125,  334 => 115,  332 => 114,  327 => 113,  247 => 84,  239 => 82,  237 => 81,  228 => 78,  221 => 75,  211 => 71,  177 => 66,  166 => 60,  144 => 58,  140 => 56,  139 => 51,  112 => 42,  76 => 21,  155 => 56,  134 => 44,  131 => 43,  83 => 25,  43 => 8,  55 => 11,  32 => 5,  29 => 6,  788 => 469,  785 => 468,  774 => 466,  770 => 465,  766 => 463,  753 => 462,  727 => 457,  724 => 456,  705 => 454,  688 => 453,  684 => 451,  680 => 450,  676 => 449,  672 => 448,  668 => 447,  664 => 446,  661 => 445,  659 => 444,  642 => 443,  631 => 442,  616 => 437,  611 => 435,  607 => 434,  604 => 433,  602 => 432,  588 => 431,  556 => 401,  538 => 398,  521 => 397,  518 => 396,  516 => 395,  511 => 393,  506 => 391,  179 => 87,  171 => 85,  164 => 82,  159 => 80,  154 => 77,  148 => 75,  142 => 53,  124 => 45,  110 => 52,  107 => 41,  26 => 3,  203 => 71,  176 => 66,  174 => 65,  168 => 61,  158 => 59,  130 => 47,  100 => 30,  88 => 41,  79 => 22,  202 => 70,  189 => 70,  183 => 68,  165 => 64,  162 => 63,  151 => 54,  145 => 55,  136 => 45,  132 => 54,  125 => 52,  120 => 43,  93 => 34,  89 => 35,  85 => 40,  82 => 28,  47 => 17,  25 => 4,  75 => 24,  69 => 17,  66 => 30,  60 => 25,  56 => 25,  54 => 13,  42 => 10,  386 => 138,  383 => 159,  377 => 158,  375 => 157,  368 => 156,  364 => 155,  360 => 129,  358 => 152,  355 => 127,  352 => 126,  350 => 149,  342 => 147,  340 => 146,  337 => 145,  328 => 140,  325 => 139,  318 => 109,  312 => 105,  309 => 104,  306 => 103,  304 => 102,  299 => 99,  290 => 94,  287 => 93,  285 => 92,  280 => 89,  278 => 114,  273 => 111,  271 => 110,  266 => 88,  262 => 86,  256 => 103,  252 => 101,  245 => 97,  238 => 219,  232 => 79,  229 => 88,  224 => 86,  219 => 83,  213 => 79,  210 => 78,  207 => 73,  205 => 95,  200 => 69,  194 => 67,  191 => 68,  188 => 89,  186 => 67,  181 => 63,  175 => 59,  172 => 67,  169 => 62,  167 => 56,  160 => 57,  141 => 48,  128 => 42,  105 => 36,  101 => 37,  95 => 23,  86 => 20,  80 => 19,  77 => 35,  74 => 34,  71 => 19,  65 => 15,  59 => 13,  45 => 9,  34 => 7,  68 => 20,  61 => 16,  44 => 7,  37 => 9,  20 => 2,  161 => 59,  153 => 58,  150 => 49,  147 => 48,  143 => 57,  137 => 55,  121 => 35,  118 => 50,  113 => 44,  109 => 37,  106 => 31,  104 => 36,  99 => 32,  96 => 31,  94 => 31,  90 => 33,  78 => 32,  72 => 21,  62 => 14,  53 => 24,  50 => 18,  48 => 10,  41 => 9,  39 => 8,  35 => 8,  30 => 4,  27 => 3,  354 => 163,  345 => 160,  341 => 159,  338 => 117,  333 => 157,  331 => 141,  323 => 112,  321 => 149,  314 => 145,  307 => 141,  300 => 137,  293 => 95,  286 => 129,  279 => 125,  272 => 121,  257 => 109,  250 => 138,  243 => 96,  236 => 218,  226 => 87,  223 => 88,  215 => 72,  212 => 82,  209 => 81,  204 => 78,  201 => 77,  196 => 69,  190 => 72,  182 => 70,  180 => 64,  170 => 64,  163 => 58,  156 => 56,  152 => 48,  149 => 53,  146 => 74,  138 => 42,  133 => 47,  129 => 51,  126 => 50,  123 => 44,  117 => 42,  114 => 35,  111 => 40,  108 => 42,  102 => 35,  98 => 24,  91 => 28,  87 => 26,  84 => 29,  81 => 28,  73 => 23,  70 => 22,  67 => 20,  64 => 20,  58 => 13,  52 => 19,  49 => 10,  46 => 8,  40 => 15,  36 => 6,  33 => 8,  31 => 6,  28 => 3,);
    }
}
