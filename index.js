$(document).ready(function() {
    $("#submitbutton").click(function() {
        if ($("#usernameinput").val() != "" && $("#passwordinput").val() != "") {
            var loginobject = new Object();
            loginobject.username = $("#usernameinput").val();
            loginobject.password = $("#passwordinput").val();

            $.ajax({
                type: "POST",
                url: "login.php",
                data: JSON.stringfy(loginobject),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function() { location.reload(); },
                failure: function(err){
                    $("#index-msg").val("<p>Incorrect username/password combination.</p>");
                }
            });
        }
    });
});
