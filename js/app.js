$(document).ready(function() {
    $("#submit").click(function() {
        var doctorid = $("#doctor option:selected").val();
        var patientid = $("#patient option:selected").val();
        var duration = $("#duration option:selected").val();
        var type = $("#type").val();
        var s_date = $("#dateinput").val();
        var s_time = $("#timeinput").val();

        var datepattern = /^\d{4}-\d{2}-\d{2}$/;
        var timepattern = /^\d{2}:\d{2}:\d{2}$/;

        if (doctorid == "" || patientid == "" || duration == "") {
            $("#result").empty();
            $("#result").append("<p>Either Doctor, Patient or Duration is not selected</p>");
            return ;
        }

        if (datepattern.test(s_date) == false || timepattern.test(s_time) == false) {
            $("#inputerr").append("Date or time format invalid.");
            return ;
        }
        else {
            $.get("appointment.php", {"doctor" : doctorid, "patient" : patientid, "duration" : duration, 
                "date" : s_date, "time" : s_time, "type" : type});
            $("#result").empty();
            $("#result").append("<p>Recorded</p>");
        }
    });
});
