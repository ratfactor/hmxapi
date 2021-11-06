<?php
// Show new author form
// ===========================================================================
if ($querystring === 'new-form'):
?>

<h1>Add an Author</h1>
<p>Please don't put too much effort into this info. It won't actually be saved!</p>
<form method="post" action="/authors">
    <label for="name">Name:</label>
    <input id="name" name="name">
    <br>

    <label for="born">Born (year):</label>
    <input id="born" name="born">
    <br>

    <label for="books">Books (comma-separated):</label>
    <input id="books" name="books">
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

<h1>Author Added!</h1>
<p>Congratulations! Your new author entry has been carefully placed in the collection.</p>
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
    <h1>Authors</h1>

    <a href="/authors?new-form" hx-boost="true" hx-target="this" hx-swap="outerHTML">Add Author</a>
<?php endif; ?>

<div class="thumblist">
<?php foreach ($authors as $id => $author): ?>
    <div><a href="authors/<?=$id?>">
        <img src="/static/<?=$author['image']?>">
        <span><?=$author['name']?></span>
    </a></div>
<?php endforeach; ?>
</div>
