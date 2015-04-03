$(document).ready(function() {
    $("#submitbutton").click(function() {
        if ($("#usernameinput").val() != "" && $("#passwordinput").val() != "") {
            var loginobject = new Object();
            loginobject.username = $("#usernameinput").val();
            loginobject.password = $("#passwordinput").val();

            $.ajax({
                type: "POST",
                url: "login.php",
                data: JSON.stringify(loginobject),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: window.location.reload(true),
            });
        }
        else {
            console.log("empty username or password.");
        }
    });
    $("#resetbutton").click(function() {
        $("#usernameinput").val("");
        $("#passwordinput").val("");
    });

    $("input").keypress(function (e) {
        if (e.which == 13) {
            jQuery('#submitbutton').focus().click();
        }
    });
});
