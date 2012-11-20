<?php

/* AcmeBlogBundle::layout.html.twig */
class __TwigTemplate_642c84ab329dd62a573826c42ac16dfa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" sizes=\"16x16\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div id=\"symfony-wrapper\">


            <div class=\"symfony-content\">
                ";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "            </div>


        </div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Blog Bundle";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "                ";
    }

    public function getTemplateName()
    {
        return "AcmeBlogBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 14,  57 => 13,  51 => 5,  39 => 13,  29 => 6,  25 => 5,  19 => 1,  41 => 15,  36 => 12,  33 => 11,  27 => 9,);
    }
}
