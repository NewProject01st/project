<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
{{session()->put('language','marathi')}}
<form method="post" action="">  
<label for="cars">Choose Language</label>
<select name="language" id="language">
  <option value="">Slect language</option>
  <option value="en" <?php if($language == 'en') { echo 'selected'; } ?> >English</option>
  <option value="mar"<?php if($language == 'mar') { echo 'selected'; } ?>>Marathi</option>
</select>

</form>
<?php print_r($data_output); ?>
<script type="text/javascript">

$("#language").change(function(){
    $.ajax({
       type: "POST",
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ env('APP_URL') }}/change-language",
        cache: false,
        success: function(response) {
            location. reload();
        },
        data:{'language':$("#language").val()},
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