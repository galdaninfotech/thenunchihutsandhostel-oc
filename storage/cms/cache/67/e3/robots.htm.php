<?php 
class Cms5fe9575f0956d522593554_a882adec3c154e1d17d8454365feb5a8Class extends \Cms\Classes\PageCode
{
public function onStart(){
    $content = "User-agent: 
        Disallow: /cgi-bin/
        Disallow: /config/
        Disallow: /modules/
        Disallow: /plugins/
        Disallow: /storage/
        Disallow: /vendor/";
    return Response::make($content)->header('Content-Type', 'text/plain');
}
}
