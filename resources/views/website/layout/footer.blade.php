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
                swal({
                    titile: "Error!",
                    text: "Something Went Wrong",
                    icon: "error",
                    button: "Ok",
                });
            }
        });
    });
</script>
</body>

</html>
