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

switch ($uri) {
    case '':
    case '/': route('welcome.php'); break;
    case '/books': route('books.php'); break;
    case '/authors': route('authors.php'); break;
    default:
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        exit;
}

function route($fname) {
    global $hx_keys;

    // Render entire HTML document if not htmx request.
    $whole_page = count($hx_keys) === 0;

    // Render the "head" portion of the page if body will be replaced.
    $render_head = $whole_page || $hx_keys['boosted'];

    // Render parts of document as needed and the requested route
    if ($whole_page) require('html_head.php');
    if ($render_head) require('page_head.php');
    require_once($fname);
    if ($whole_page) require('html_tail.php');
}
