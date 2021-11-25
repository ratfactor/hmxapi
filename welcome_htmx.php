<h2>Inline content loaded with htmx</h2>

<p>This portion of the page is loaded asynchronously in the background by the htmx library. The author and book lists below are both loaded by two more <em>nested</em> htmx requests to populate the areas from the the <code>/books</code> and <code>/authors</code> resources.</p>

<h3>Books</h3>
<div hx-get="/books?partial" hx-trigger="load">Loading books...</div>

<h3>Authors</h3>
<div hx-get="/authors?partial" hx-trigger="load">Loading authors...</div>

<p>The idea here is that browsers with JavaScript can get this "richer" single-page experience. But <em>all</em> content and actions are still available to a browser written in 1992.</a>

<strong>End of inline content</strong>
