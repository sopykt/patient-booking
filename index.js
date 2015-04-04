$(document).ready(function() {
    $("#submitbutton").click(function() {
        if ($("#usernameinput").val() != "" && $("#passwordinput").val() != "") {
            var loginobject = new Object();
            var p;
            var ue;

            loginobject.username = $("#usernameinput").val();
            loginobject.password = $("#passwordinput").val();

            ue = $("input:radio[name=ue]:checked").val();

            if (ue == 'patient') { p = "login.php"; }
            else if (ue == 'employee') { p = 'elogin.php'; }

            $.ajax({
                type: "POST",
                async: false,
                url: p,
                data: JSON.stringify(loginobject),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: window.location.reload(true),
            });
            window.location.reload(true);
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
