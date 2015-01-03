/* jquery pour admin */
$(document).ready(function () {

    $("#login_form").css('display', 'none');
    //var statut = $('#deconnexion').val();

    $("#login_form").fadeIn(3000);
    $("#login").focus();
    $("#annuler").click(function () {
        $("#login_form").fadeOut("2000");
        window.location.href = "../disco-cinema/index.php";
    });

    $('input#submit_login').on('click', function (event) {
        login = $("#login").val();
        password = $("#password").val();
        if ($.trim(login) != '' && $.trim(password != '')) {

            var data_form = $('form#form_auth').serialize();
            alert(data_form);
            $.ajax({
                type: 'POST',
                data: data_form, // si sérialisé
                //data: "login=" + login + "&password=" + password, // si pas sérialisé
                //dataType: "json",
                url: './lib/php/ajax/AjaxLogin.php',
                success: function (data_du_php) {
                    if (data_du_php.retour == 1) {
                        $('#login_form').remove();
                        //$('header#header').removeClass('reduire_opacity');
                        window.location.href = "./index.php";
                    }
                    else {
                        //alert('erreur');
                        $('#message').html("--Données incorrectes");
                    }
                },
                fail: function () {
                    //alert('Raté');
                }
            });
        }
        else {
            $('#message').html("Remplissez les champs");
        }
        return false;
    });
});

