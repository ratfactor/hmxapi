<?php
$parsed_url = parse_url($_SERVER['REQUEST_URI']);

// Using explicit GLOBALS here to make the intent clear. :-)
$GLOBALS['querystring'] = isset($parsed_url['query']) ? $parsed_url['query'] : '';
$GLOBALS['uri'] = $parsed_url['path'];
$GLOBALS['method'] = $_SERVER['REQUEST_METHOD'];
$GLOBALS['route_fname'] = '';
$GLOBALS['htmx_request'] = isset($_SERVER['HTTP_HX_REQUEST']);
$GLOBALS['render_html'] = !$htmx_request; // Render whole html document

// The routing is just a silly series of regex matches on the URI.
// This function does the matching and is used below.
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
        
// Pretty weird structure here. Just stops checking after first match:
if     (route('|^/$|',                'welcome.php')) ;
elseif (route('|^/welcome$|',         'welcome.php')) ;
elseif (route('|^/welcome/htmx|',     'welcome_htmx.php')) ;
elseif (route('|^/books$|',           'books.php')) ;
elseif (route('|^/books/([0-9]+)|',   'book_id.php',    'req_book')) ;
elseif (route('|^/authors$|',         'authors.php')) ;
elseif (route('|^/authors/([0-9]+)|', 'author_id.php',  'req_author')) ;
elseif (route('|^/images/(.*)/meta|', 'image_meta.php', 'req_imgfname')) ;
else {
    http_response_code(404);
    $route_fname = '404.php';
}

// Render parts of document as needed and the requested route
if ($render_html) require('html_head.php');
require_once($route_fname);
if ($render_html) require('html_tail.php');
