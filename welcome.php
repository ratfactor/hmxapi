<h1>Welcome!</h3>

<p>The navigation links above <strong>&uArr;</strong> are "boosted" by htmx - they replace the whole page body.</p>

<h2>Load content inline</h2>

<p>The buttons below <strong>&dArr;</strong> request the exact same content in container div tags.</p>

<div style="border: 2px solid silver; margin:1em; padding:1em;">
    <button hx-get="/books" hx-target="closest div">Get Books</button>
</div>

<div style="border: 2px solid silver; margin:1em; padding:1em;">
    <button hx-get="/authors" hx-target="closest div">Get Authors</button>
</div>
