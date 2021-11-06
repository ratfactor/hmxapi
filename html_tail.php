</section> <!-- End of "main" -->

<script src="/static/htmx.min.js"></script>
<script>
document.body.addEventListener('htmx:beforeSwap', function(evt) {

    // Allow 404 status responses to swap content (display)
    if(evt.detail.xhr.status === 404){
        evt.detail.shouldSwap = true;
    }
});
</script>

</body></html>
