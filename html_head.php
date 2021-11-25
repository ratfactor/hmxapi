<html>
<head>
    <!-- see html_tail.php for javascript, including htmx include -->
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
    <link rel="stylesheet" href="/static/styles.css">
    <style>
    </style>
</head>
<body>

<nav hx-boost="true" hx-target="#main">
    <a href="/">Home</a>
    <a href="/books">Books</a>
    <a href="/authors">Authors</a>
    <?php if ($htmx_request): ?>
        <span style="background:#BFB">htmx</span>
    <?php endif; ?>
</nav>

<section id="main"> <!-- This is the target of main body htmx swapping -->
