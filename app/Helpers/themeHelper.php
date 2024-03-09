<?php

if (!function_exists('themeView')) {

    function themeView($theme, $prop=null)
    {
        
        if (tenant()?->theme) {
            $dir = tenant()->theme . '.' . $theme;
        

           if($prop) return view($dir, $prop);
           return view($dir);            
        }
        
        if($prop) return view($theme, $prop);
        return view($theme);        
    }
}
