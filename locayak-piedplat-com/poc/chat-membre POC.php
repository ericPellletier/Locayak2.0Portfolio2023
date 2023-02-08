<?php
require_once "../configuration.php";
require_once "../administration/header-admin.php";
?>

<link rel="stylesheet" href="../css/membre.css?<?php echo time(); ?>">
<div class="informationsBox">
</div>
<div class="chat" id="chat">
</div>

<div class="messageBox">
<form action="#" method="POST" id="formulaireEnvoie">
      <input type="text" class="messageInput" id="messageInput" >
      <input type="submit" id="envoie" value="<?= _('Envoyer')?>">
</form>
</div>


</br>
<?php
       include_once "../administration/footer-admin.php";
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script type="text/javascript" src="tchatPoc.js"></script>

</body>
</html>