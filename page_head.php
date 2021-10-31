<nav hx-boost="true">
    <a href="/">Home</a>
    <a href="/books">Books</a>
    <a href="/authors">Authors</a>
    <a href="/404">Error!</a>
    <?php foreach($hx_keys as $hx => $val): ?>
        <span style="background:#BFB"><?=$hx?>=<?=$val?></span>
    <?php endforeach; ?>
</nav>
