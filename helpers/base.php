<?php

if (!function_exists('articleUrl')) {
    function articleUrl($file){
        return 'storage/images/article/headline/'.$file;
    }
}

if (!function_exists('splitInput')) {
    function splitInput($input){
        return explode(':', $input);
    }
}

if (!function_exists('api_success')) {
    function api_success($data, $code = 200, $addHeaders = [])
    {
        $payload = [
            "version"   => 'v1',
            "success"   => true,
            "data"      => $data
        ];

        return response()
            ->json($payload, $code)
            ->withHeaders($addHeaders);
    }
}

if (!function_exists('api_error')) {
    function api_error($message, $code = 400, $addHeaders = [])
    {
        $payload   = [
            "version"   => 'v1',
            "success"   => true,
            "error" => [
                "code"       => $code,
                "message"    => $message,
            ]
        ];

        return response()
            ->json($payload, $code)
            ->withHeaders($addHeaders);
    }
}

if (!function_exists('truncate')) {
    function truncate($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }

        return $text;
    }
}