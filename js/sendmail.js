function sendmail(){
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var message = $('#message').val();
    $.ajax({
        type: "POST",
        url: "sendmail.php",
        data: {name:name, email:email, phone:phone,  message:message},
        success: function(response) {
            console.log(response.status) // код с HTTP статусом ответа
        $("#msg").html( "Спасибо за обращение! </br> Мы свяжемся с вами в близжайшее время.");
        $ ("#msg").css('background-color', '#93d3a2');
        },
        error: function(response) {
        $("#msg").html( "Произошла ошибка при отправке запроса! </br> Попробуйте отправить его позже или </br> свяжитесь с нами по телефону." );
        $ ("#msg").css('background-color', '#ed9aa2');
        }
     
        });
}