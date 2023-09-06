<?php

namespace models;

class Check
{
    public function getCurrentUrlSlug()
    {
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parseUrl = parse_url($url);
        $path = $parseUrl['path'];
        $slug = str_replace(APP_BASE_PATH, '', $path);
        return ltrim($slug, '/');//Удаляем слеш в начале строки url
    }
}