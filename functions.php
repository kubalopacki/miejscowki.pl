<?php

function redirect($url, $code)
{
    http_response_code($code);
    header('Location: ' . $url);

    exit(0);
}