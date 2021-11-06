<?php
// Show new book form
// ===========================================================================
if ($querystring === 'new-form'):
?>

<h1>Add a Book</h1>
<p>Please don't put too much effort into this info. It won't actually be saved!</p>
<form method="post" action="/books">
    <label for="title">Title:</label>
    <input id="title" name="title">
    <br>

    <label for="published">Published (year):</label>
    <input id="published" name="published">
    <br>

    <label for="authors">Authors (comma-separated):</label>
    <input id="authors" name="authors">
    <br>

    <input type="submit">
</form>

<?php
    exit; // Snippet done
endif;

// New book submitted, pretend we stored it
// ===========================================================================
if ($method === 'POST'):
?>

<h1>Book Added!</h1>
<p>Congratulations! Your new book entry has been carefully placed in the collection.</p>
<p>(<strong>Not really!</strong> Sorry, this is just a demo.)</p>

<?php
    exit; // Snippet done
endif;


// Book list
// ===========================================================================

// Get book "database" with $authors and $books.
require('bookdb.php');

if ($querystring !== 'partial'):
?>
    <h1>Books</h1>

    <a href="/books?new-form" hx-boost="true" hx-target="this" hx-swap="outerHTML">Add Book</a>
<?php endif; ?>

<div class="thumblist">
<?php foreach ($books as $id => $book): ?>
    <div><a href="books/<?=$id?>">
        <img src="/static/<?=$book['image']?>">
        <span><?=$book['title']?></span>
    </a></div>
<?php endforeach; ?>
</div>
