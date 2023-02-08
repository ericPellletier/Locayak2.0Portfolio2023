function validerDate() {
  var dateObject = $("#dateDebutDisponibiliter").datepicker('getDate');


  //$('#date').datepicker('option', 'minDate', new Date(startDate));
}
$(document).ready(function() {
  //Setup des DatePicker
  $(function () {
    $("#dateFinDisponibiliter").datepicker({
      minDate: d,});
  });
  const d = new Date();

//Lors de la selection de la date
$("#dateDebutDisponibiliter").datepicker({
  maxDate: '+2m',
  minDate: d,
  onSelect: function(dateText, inst) {
    var dateObject = $("#dateDebutDisponibiliter").datepicker('getDate');
    let datePourDebutFin = new Date(dateObject);
    datePourDebutFin.setDate(datePourDebutFin.getDate() + 2); 
    $('#dateFinDisponibiliter').datepicker('option', 'minDate', new Date(datePourDebutFin));
  }
});
});



