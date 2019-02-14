$(document).ready(()=>{


    $('#signup-form-toggler').click(()=>{
        //$('#signup-form').addClass('show');
        $('#login-form').removeClass('show');
    });

    $('#login-form-toggler').click(()=>{
        $('#signup-form').removeClass('show');
        //$('#login-form').addClass('show');
    });

})