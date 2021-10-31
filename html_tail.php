    <script>
        document.body.addEventListener('htmx:responseError', function(event) {
            alert("HTTP Error "+event.detail.xhr.status+". See console.");
            console.log(event.detail);
        });
    </script>
</body></html>
