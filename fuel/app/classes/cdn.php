<?php

class cdn 
{
    private static $_uikit_dir = 'uikit/uikit/dist/';


    public static function uikit()
    {
        print Asset::css(self::vendor(self::$_uikit_dir.'css/uikit.min.css'));
        print Asset::css('http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css');
        print Asset::js(self::vendor(self::$_uikit_dir.'js/uikit.min.js'));
    }
    
    public static function uikit_css_addon()
    {
        print Asset::css(self::vendor(self::$_uikit_dir.'css/addons/uikit.addons.min.css'));
    }
    
    public static function uikit_js_addon($name)
    {
        print Asset::js(self::vendor(self::$_uikit_dir."js/addons/$name"));
    }
    
    public static function uikit_htmleditor()
    {
        $codemirror = self::base('common/uikit-markdown/codemirror/');
        print Asset::css($codemirror.'lib/codemirror.css');
        print Asset::js($codemirror.'lib/codemirror.js');
        
        print Asset::js($codemirror.'mode/markdown/markdown.js');
        print Asset::js($codemirror.'addon/mode/overlay.js');
        print Asset::js($codemirror.'mode/xml/xml.js');
        print Asset::js($codemirror.'mode/gfm/gfm.js');
        print Asset::js(self::base('common/uikit-markdown/marked.js'));
        
        self::uikit_js_addon('htmleditor.js');
    }


    public static function jquery()
    {
        print Asset::js(self::component('jquery/jquery.min.js'));
    }
    
    public static function default_fonts($fontname)
    {
        print Asset::css(self::base("common/font-change/$fontname/css/fonts.css"));
        print Asset::css(self::base("common/font-change/$fontname/css/kore.css"));
    }

    public static function component($uri)
    {
        return self::base('components/'.$uri);
    }
    
    public static function vendor($uri)
    {
        return self::base('vendor/'.$uri);
    }
    
    public static function base($uri)
    {
        return Uri::create('http://cdn.deremoe.com/'.$uri);
    }
}
