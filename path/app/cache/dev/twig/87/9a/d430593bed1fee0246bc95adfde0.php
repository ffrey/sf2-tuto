<?php

/* AcmeBlogBundle:Blog:list.html.twig */
class __TwigTemplate_879ad430593bed1fee0246bc95adfde0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeBlogBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeBlogBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "List of posts";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "   ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "result"));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 13
            echo "   \t\t- titre : <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_blog_show"), "html", null, true);
            echo "?id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "post"), "title"), "html", null, true);
            echo "</a><br/>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "AcmeBlogBundle:Blog:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 13,  36 => 12,  33 => 11,  27 => 9,);
    }
}
