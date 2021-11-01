<?php
if (!isset($req_book_id)) {
    http_response_code(500);
    echo "<h1>500 Need book ID.</h1>";
    exit;
}

// Get book "database" with $authors and $books.
require('bookdb.php');

$book = $books[$req_book_id];
?>

<?=$req_book_id?>
<?php if ($render_head): ?>
    <h1><?=$book['title']?></h1>
<?php else: ?>
    <strong><?=$book['title']?></strong>
<?php endif; ?>

