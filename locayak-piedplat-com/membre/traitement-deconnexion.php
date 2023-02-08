<?php
require_once "configuration.php";
 session_destroy();

 include_once "../header";
?>


</body>
<?php
echo('<script> location.replace("formulaire-authentification.php"); </script>');
//header('Location: formulaire-authentification.php');
include_once "../footer";