<?php

if (!function_exists('articleUrl')) {
    function articleUrl($file){
        return 'public/storage/images/article/headline/'.$file;
    }
}