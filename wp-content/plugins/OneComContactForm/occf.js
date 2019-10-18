(function ( $ ) {

    $("form#occf").submit(function (e) {
        var valid   = true,
            name    = $('#occf_name'),
            from    = $('#occf_from'),
            message = $('#occf_message'),
            inputs  = [ name, from, message ];

        var addError = function ( el ) {
            if ( el.next().length === 0 ) {
                el.parent().append('<span style="color: red; ">*</span>')
            }
        };
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        // Clear Errors
        $.each( inputs, function ( i, el ) { el.next().remove(); });

        // Check for empty fields
        $.each( inputs, function ( i, el ) { if ( el.val() === "" ) { valid = false; addError( el ); } });

        // check email field
        if ( ! emailReg.test( from.val() ) ) {
            valid = false;
            addError( from );
        }

        // If it did not pass validation, stop
        if ( ! valid ) { e.preventDefault(); }
    });

})(jQuery);