<?php
$uri = $_SERVER['REQUEST_URI'];

// First, return requested file if it exists. This application is NOT secure. :-)
if(is_file(__DIR__ . $uri)){
    return false; // Tells PHP's built-in webserver to fetch file.
}

// htmx adds 'HX-xxxxx' request headers when it's making an XHR request.
$hx_keys = [];
foreach ($_SERVER as $key => $value) {
    if (preg_match('/^HTTP_HX_(.*)/', $key, $matches)) {
        $keyname = strtolower($matches[1]);
        $hx_keys[$keyname] = $value; // The matched key = value
    }
}

// The "router" here is just a silly series of regex matches on the URI.
$fname = "nothing";

if     ($uri === '/') { $fname='welcome.php'; }
elseif (preg_match('|/books/([0-9]+)|', $uri, $m)) { $req_book_id = $m[1]; $fname='book_id.php'; }
elseif (preg_match('|/books|', $uri)) { $fname='books.php'; }
elseif (preg_match('|/authors/([0-9]+)|', $uri, $m)) { $req_author_id = $m[1]; $fname='author_id.php'; }
elseif (preg_match('|/authors|', $uri)) { $fname='authors.php'; }
else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1>";
    exit;
}

// Render entire HTML document if not htmx request. Render head if body replaced.
$whole_page = count($hx_keys) === 0;
$render_head = $whole_page || isset($hx_keys['boosted']);

// Render parts of document as needed and the requested route
if ($whole_page) require('html_head.php');
if ($render_head) require('page_head.php');
require_once($fname);
if ($whole_page) require('html_tail.php');
