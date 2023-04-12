    <!-- global js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <script>
        $('.digit-group').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parent());

                if (e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));

                    if (prev.length) {
                        $(prev).select();
                    }
                } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));

                    if (next.length) {
                        $(next).select();
                    } else {
                        if (parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });
    </script>
    <script>
        $(".btn-otp").click(function() {
            $(".otp-area").slideUp();
            $(".redirect").slideDown();
        });

        $(".btn-otp2").click(function() {
            $(".otp-area2").slideUp();
            $(".redirecting2").slideDown();
        });

        $(".btn-auth").click(function() {
            $(".business-details").slideDown();
        });

        $(".btn-auth-2").click(function() {
            $(".business-details-2").slideDown();
        });

        $(".btn-non-impo").click(function() {
            $(".non-food-importer").slideDown();
            $(".food-importer").slideUp();
            $(".authorized-user").slideUp();
            $(".btn-non-impo").addClass("btn-register-active");
            $(".btn-autho-user").removeClass("btn-register-active");
            $(".btn-importer").removeClass("btn-register-active");
        });

        $(".btn-autho-user").click(function() {
            $(".authorized-user").slideDown();
            $(".food-importer").slideUp();
            $(".non-food-importer").slideUp();
            $(".btn-autho-user").addClass("btn-register-active");
            $(".btn-importer").removeClass("btn-register-active");
            $(".btn-non-impo").removeClass("btn-register-active");
        });

        $(".btn-importer").click(function() {
            $(".food-importer").slideDown();
            $(".authorized-user").slideUp();
            $(".non-food-importer").slideUp();
            $(".btn-autho-user").removeClass("btn-register-active");
            $(".btn-importer").addClass("btn-register-active");
            $(".btn-non-impo").removeClass("btn-register-active");
        });
    </script>
    </body>

    </html>