<h1>Welcome!</h3>

<p>This is an HTML hypermedia API demo. It's an API for humans and computers!</p>

<p>The UI also works completely without JavaScript. If JavaScript is enabled, you'll
see book and author lists rendered inline below. Otherwise, click on the top-level
navigation links above. Again, if JavaScript is present, the links above will return
the body of the page, which will be rendered by htmx. Otherwise, a whole HTML document
is returned.</p>

<div hx-get="/welcome/htmx" hx-trigger="load"></div>
