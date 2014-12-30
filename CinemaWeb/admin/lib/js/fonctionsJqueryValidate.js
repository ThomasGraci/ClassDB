/* fonctions de validation des formulaires */

$('form#form_reservation').validate({    
    debug:true,
    rules : {
        nom_maitre : {
            required : true
        },
        email_maitre : {
            required : true,
            email : true
        },
     
        success : function(){

            $(this).submit();
            $(this).reset();
        }//,
        /*
        submitHandler: function(form) {
        // do other things for a valid form
           return true;
        }        
            */
    }
    
});
