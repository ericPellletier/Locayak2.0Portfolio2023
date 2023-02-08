function validerDate() {
  var dateObject = $("#dateDebutDisponibiliter").datepicker('getDate');
  $("#prix").innerHTML = 4;

  //$('#date').datepicker('option', 'minDate', new Date(startDate));
}
function configurerDate(dateNonFormater) {
  let date = new Date(dateNonFormater);
  console.log(date);
  
}
$(document).ready(function() {
  const d = new Date();
  $("#dateFinDisponibiliter").datepicker({
      minDate: d,
      onSelect: function(dateText, inst) {
      var date1 = new Date($("#dateDebutDisponibiliter").datepicker('getDate'));
      var date2 = new Date($("#dateFinDisponibiliter").datepicker('getDate'));
      date1Confirmation = document.getElementById("dateDebutDisponibiliter").value;
      date2Confirmation = document.getElementById("dateFinDisponibiliter").value;
      var difference = date1.getTime() - date2.getTime(); 
      var days = Math.abs(Math.ceil(difference / (1000 * 3600 * 24)));
      document.getElementById("textConfirmation").innerHTML = "Prix total: " + days*cout + "$";
      // document.getElementById("amount").value =days*cout;
      coutTotal =days*cout; 
    }
    });
//Lors de la selection de la date
$("#dateDebutDisponibiliter").datepicker({
  
  maxDate: '+2m',
  minDate: dateDebut,
  
  onSelect: function(dateText, inst) {
    var dateObject = $("#dateDebutDisponibiliter").datepicker('getDate');
    let datePourDebutFin = new Date(dateObject);
    let dateFinLocation = new Date(dateObject);
    datePourDebutFin.setDate(datePourDebutFin.getDate() + 2); 
    dateFinLocation.setDate(datePourDebutFin.getDate() + 12); 
    $('#dateFinDisponibiliter').datepicker('option', 'minDate', new Date(datePourDebutFin));
    $('#dateFinDisponibiliter').datepicker('option', 'maxDate', new Date(dateFinLocation));
  }
});
});



