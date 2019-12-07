//ENVOI DU FORMULAIRE
$(document).ready(function() {
    $('#submitContact').click(function (e) {
        e.preventDefault();


        var objet = $('#objet').val();
        var message = $('#message').val();
        var email = $('#email').val();
        var envoi = $('#submitContact').val();
        

        $.post(
            'contact.php',
            {
                votremail:email,
                objet:objet,
                message:message,
                envoi:envoi
            },
            function (data) {
                console.log(data);
                if(data.includes("bien")){
                    $('#errorContact').html(data).css("color","lightgreen");
                }
                else{
                    $('#errorContact').html(data).css("color","lightcoral");
                }

                $('#objet').val("");
                $('#message').val("");
                $('#email').val("");
            }
        )


    });
});
