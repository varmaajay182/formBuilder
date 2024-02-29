<?php

namespace Codecrewinfotech\FormBuilder\Helpers;

use Codecrewinfotech\FormBuilder\Models\formBuilder;

class shortcodeHelper

{
    public static function generateRandomShortcode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortcode = '';

        for ($i = 0; $i < $length; $i++) {
            $shortcode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $shortcode;
    }

    public static function doShortcode($shortcode)
    {
        $shortCode = formBuilder::where('short_code',$shortcode)->first();
        return $shortCode->elements;
       
    }
}