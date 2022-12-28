function validate() {

    var isValid = true;
    var email = $("#newsletter_email").val();

    if (email == "") {
        $("#newsletter_email").css('border', '#fb0505 1px solid');
        isValid = false;
    }
    if (!email.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#info_newsletter_email").html("(Adresse email non valide)");
        $("#newsletter_email").css('border', '#fb0505 1px solid');
        isValid = false;
    }
    return isValid;
}

$( "button#sub_btn" ).on( "click", function(e) {

    e.preventDefault();
    if(validate()){
        
        var email = $('input#newsletter_email').val();
        let data = {
            "newsletter_email" : email,	
        };
        $.ajax({
            url: 'home/newsletter',
            type: 'POST',
            //dataType: 'json',
            data: data,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            //beforeSend: function(xhr){xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")},
            success: function(data) {
                data = JSON.parse(data);
                
                alert(data.type_message + ": " + data.message + ".");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // alert(xhr.status);
                // alert(thrownError);
                console.log("xhr.status",xhr.status);
                console.log("thrownError",thrownError);
                alert('some errors php');
            }
        }).done(function ddone(response){
            console.log(response);
        });
    }
   
    
});