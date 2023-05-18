<script type="text/javascript">
    $("#language").change(function() {
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ env('APP_URL') }}/change-language",
            cache: false,
            success: function(response) {
                location.reload();
            },
            data: {
                'language': $("#language").val()
            },
            error: function(errorResponse) {
                
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.marquee-scroll').hover(function() {
            $(this).attr('scrollamount', '0');
        }, function() {
            $(this).attr('scrollamount', '10');
        });
    });
    </script>
</body>

</html>
