<?php
$GLOBALS['uri'] = $_SERVER['REQUEST_URI'];
$GLOBALS['route_fname'] = '';
$GLOBALS['hx_keys'] = [];       // htmx HTTP request header values
$GLOBALS['render_html'] = true; // Render whole html document
$GLOBALS['render_head'] = false;

// First, return requested file if it exists. This application is NOT secure. :-)
if(is_file(__DIR__ . $uri)){
    return false; // Tells PHP's built-in webserver to fetch file.
}

// Populate hx_keys
foreach ($_SERVER as $key => $value) {
    if (preg_match('/^HTTP_HX_(.*)/', $key, $matches)) {
        $keyname = strtolower($matches[1]);
        $hx_keys[$keyname] = $value; // The matched key = value
    }
}

// The routing is just a silly series of regex matches on the URI.
function route($regex, $fname, $id=null) {
    if (preg_match($regex, $GLOBALS['uri'], $m)) {
        $GLOBALS['route_fname'] = $fname;
        if (!is_null($id)) {
            $GLOBALS[$id] = $m[1]; // 
        }
        return true; // We've matched the URI!
    }
    return false;
}
        
// Pretty weird structure here but, just stops checking after first match:
if     (route('|^/$|',               'welcome.php')) ;
elseif (route('|/books$|',           'books.php')) ;
elseif (route('|/books/([0-9]+)|',   'book_id.php',    'req_book')) ;
elseif (route('|/authors$|',         'authors.php')) ;
elseif (route('|/authors/([0-9]+)|', 'author_id.php',  'req_author')) ;
elseif (route('|/images/(.*)/meta|', 'image_meta.php', 'req_imgfname')) ;
else {
    http_response_code(404);
    $route_fname = '404.php';
}

// Render entire HTML document if not htmx request. Render head if body replaced.
$render_html = count($hx_keys) === 0;
$render_head = $render_html || isset($hx_keys['boosted']);

// Render parts of document as needed and the requested route
if ($render_html) require('html_head.php');
if ($render_head) require('page_head.php');
require_once($route_fname);
if ($render_html) require('html_tail.php');
