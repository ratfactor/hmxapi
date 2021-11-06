<h2>Loaded htmx inline content</h2>

<p>This portion of the page is loaded asynchronously in the background by htmx, so if you see this message, JavaScript and the htmx library are working.</p>

<p>The author and book lists below are both loaded by two more <em>nested</em> htmx requests to populate the areas from the two separate resources.</p>

<h3>Books</h3>
<div hx-get="/books?partial" hx-trigger="load">Loading books...</div>

<h3>Authors</h3>
<div hx-get="/authors?partial" hx-trigger="load">Loading authors...</div>
