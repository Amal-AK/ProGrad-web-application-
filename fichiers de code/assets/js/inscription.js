
(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {

       if($(input).attr('type') == 'text' && $(input).attr('name') == 'nom') {
            if($(input).val().trim().match(/^[a-zA-Z_\-\ ]{3,15}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return true;
            }
        }
        if($(input).attr('type') == 'text'&& $(input).attr('name') == 'prenom') {
            if($(input).val().trim().match(/^[a-zA-Z_\-\ ]{3,15}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
         if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^[a-z]{1}_[a-zA-Z_\-]+@esi\.dz$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
        if($(input).attr('type') == 'password' || $(input).attr('name') == 'pass') {
            if($(input).val().trim().match(/^[a-zA-Z0-9]{8,25}$/) == null) {
              return false;

            }
            
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
       if($(input).attr('type') == 'tel' || $(input).attr('name') == 'Numéro') {
            if($(input).val().trim().match(/^0[5-7]{1}[0-9]{8}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
       if($(input).attr('type') == 'text' && $(input).attr('name') == 'bureau') {
            if($(input).val().trim().match(/^[a-zA-Z0-9]{1,4}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }

    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }



})(jQuery);
