<html>
<head>
    <!-- see html_tail.php for javascript, including htmx include -->
    <style>
    nav { background-color: #000; }
    nav a { margin: 5px; font-size: larger; color: #FFF; display: inline-block; }
    .thumblist { display: flex; flex-wrap: wrap; }
    .thumblist div { margin: 10px; cursor: pointer; }
    .thumblist img { height: 160px; display: block; }
    .thumblist span { display: block; width: 120px; text-decoration: underline; }
    .item-image { float: left; margin: 1em; width: 200px; }
    form { padding: 1em; }
    input  { display: block; margin-bottom: 1em; }
    </style>
</head>
<body>

<nav hx-boost="true" hx-target="#main">
    <a href="/">Home</a>
    <a href="/books">Books</a>
    <a href="/authors">Authors</a>
    <a href="/does-not-exist">Error!</a>
    <?php if ($htmx_request): ?>
        <span style="background:#BFB">htmx</span>
    <?php endif; ?>
</nav>

<section id="main"> <!-- This is the target of main body htmx swapping -->
