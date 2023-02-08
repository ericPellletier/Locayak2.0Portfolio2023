<?php
require_once "configuration.php";
require_once CHEMIN_DAO."KayakDAO.php";
require_once CHEMIN_DAO."MembreDAO.php";
  include_once "header.php";
  $id = filter_var($_POST['idKayak'], FILTER_VALIDATE_INT);
  $kayak = KayakDAO::selectionnerKayak($id);
  

  $dateActuel= date("Y-m-d");
  $maxChoix = date('Y-m-d', strtotime('+2 month'));
  $maxChoixDebut = date('Y-m-d', strtotime('+1 month'));
  $finMin = date('Y-m-d', strtotime('+2 day'));
?>
<script type="text/javascript">
  var dateDebut = "<?php echo $kayak["dateDebutDisponibiliter"]; ?>";
  var cout = "<?=$kayak["cout"]; ?>";
  var coutTotal = 1;
  var date1Confirmation = "";
  var date2Confirmation = "";
</script>
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="scripts/confirmeDate.js?<?php echo time(); ?>"></script>
<section>
  <div class="Centre">
    <div class="AnnonceConfirmation">
      <p class="titreConfirmation"><?= _('Confirmer votre réservation')?></p>

      </br>
      </br>
      </br>
      <p class="textConfirmation"><?= ('Prix du kayak par jour de location: ')?><?= $kayak['cout'] ?><?= _(' $ ')?></p>
      <fieldset>
        <p><?= _('Début des disponibilités: ')?><input type="text" onselect="configurerDate(1);" onblur="validerDate();"name="dateDebutDisponibiliter" id="dateDebutDisponibiliter" autocomplete="off"></p>
        <p><?= _('Fin des disponibilité: ')?><input type="text" onblur="validerDate();" name="dateFinDisponibiliter" id="dateFinDisponibiliter" autocomplete="off"></p>
      </fieldset>
      <p class="textConfirmation" id="textConfirmation"><?= _('Prix total: ')?></p>
</br></br></br></br></br></br></br></br>
      <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="charset" value="utf-8">
        <input type="hidden" name="business" value="2034642@cgmatane.qc.ca">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="item_name" value="Location Kayak">
        <input type="hidden" name="item_number" value="1">
        <input type="hidden" id="amount" name="amount" value="0.01">
        <input type="hidden" name="currency_code" value="CAD">
        <input type="hidden" name="return" value="google.ca" />
        <input type="submit" value="Payer" />
      </form> -->
      <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
      <button onclick="testUrl()"><?= _('Faux Bouton de paiement')?></button>
<!-- Set up a container element for the button -->
<div id="paypal-button-container"></div>

<script>
  function testUrl(){
    var url = "administration/traitementLocation.php";

var xhr = new XMLHttpRequest();
xhr.open("POST", url);

var data = `{
  "idClient":` +<?=$kayak["idMembre"]; ?>+`,
  "idLocateur": ` +<?=$_SESSION['idMembre']; ?>+`,
  "dateTransac":` +new Date()+`,
  "dateDebutLocation": ` +date1Confirmation+`,
  "dateFinLocation": ` +date2Confirmation+`
}`;

xhr.send(data);
window.location.replace(url);
    var url = "administration/traitementLocation.php";
            url += "?idClient="+<?=$kayak["idMembre"]; ?>;
            url += "&idLocateur="+<?=$_SESSION['idMembre']; ?>;
            url += "&idKayak="+<?=$kayak["id"];?>;
            url += "&dateTransac="+ new Date();
            url += "&dateDebutLocation="+ date1Confirmation;
            url += "&dateFinLocation="+ date2Confirmation;
            window.location.replace(url);
  }
  paypal.Buttons({

// Sets up the transaction when a payment button is clicked
createOrder: function(data, actions) {
  return actions.order.create({
    purchase_units: [{
      amount: {
        value: coutTotal // Can reference variables or functions. Example: `value: document.getElementById('...').value`
      }
    }]
  });
},

// Finalize the transaction after payer approval
onApprove: function(data, actions) {
  return actions.order.capture().then(function(orderData) {
    // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        var transaction = orderData.purchase_units[0].payments.captures[0];
        var url = "administration/traitementLocation.php";
        url += "?idClient="+<?=$kayak["idMembre"]; ?>;
        url += "&idLocateur="+<?=$_SESSION['idMembre']; ?>;
        url += "&idKayak="+<?=$kayak["id"];?>;
        url += "&dateTransac="+ new Date();
        url += "&dateDebutLocation="+ date1Confirmation;
        url += "&dateFinLocation="+ date2Confirmation;
        window.location.replace(url);
        //alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
    // When ready to go live, remove the alert and show a success message within this page. For example:
    // var element = document.getElementById('paypal-button-container');
    // element.innerHTML = '';
    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
    // Or go to another URL:  actions.redirect('thank_you.html');
  });
}
}).render('#paypal-button-container');

</script>
    </div>
  </div>
</section>

<?php
      //  include_once "footer.php";
       ?>

</body>

</html>