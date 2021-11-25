<h1>Welcome to the HTML hypermedia API demo!</h3>

<p>This is an API for humans (also known in some circles as a "web site"). It is also a demonstration of <a href="https://en.wikipedia.org/wiki/Progressive_enhancement">progressive enhancement</a> (wikipedia.org). Here's what it looks like when rendered by the text-only browser <a href="https://en.wikipedia.org/wiki/Lynx_(web_browser)">Lynx</a> (wikipedia.org):</p>

<div>
    <img src="/static/lynx.png" alt="Screenshot of this site viewed in Lynx">
</div>

<p>This page is the starting point for browsing the API. It can also be reached directly as the resource <a href="/welcome">/welcome</a>.</p>

<p>The resources <a href="/books">/books</a> and <a href="/authors">/authors</a> can be used as regular URLs (try them!) or as resources. If you have JavaScript enabled, you'll see these resources rendered inline below via the <a href="https://htmx.org/">htmx</a> (htmx.org) library.</p>

<div hx-get="/welcome/htmx" hx-trigger="load"></div>

<noscript>Looks like JavaScript is not enabled. I am a <code>&lt;noscript&gt;</code> tag. Hello! :-)</noscript>

<p>Here's an example of 404 error: <a href="/no-page-here">/no-page-here</a>.</p>
