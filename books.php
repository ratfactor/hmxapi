<?php
// Get book "database" with $authors and $books.
require('bookdb.php');
?>

<?php if ($render_head): ?>
    <h1>Books</h1>
<?php endif; ?>

<div class="thumblist">
<?php foreach ($books as $id => $book): ?>
    <div hx-get="books/<?=$id?>">
        <img src="images/<?=$book['image']?>">
        <span><?=$book['title']?></span>
    </div>
<?php endforeach; ?>
</div>
