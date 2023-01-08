$(document).ready(function () {
  $("#officecode").change(function () {
    var code = $(this).val();
    $.get(
      "http://localhost:8080/reports/allstaff",
      { offcode: code },
      function (data) {
        //alert(data);
        $("#show").html(data);
      }
    );
  });
});

$(document).ready(function () {
  $("#reportbtn").click(function () {
    var start = $("#startdate").val();
    var end = $("#enddate").val();
    //alert(start + end);
    $.get(
      "http://localhost:8080/reports/orderquery",
      { start: start, end: end },
      function (data) {
        //alert(data);
        $("#show").html(data);
      }
    );
  });
});
