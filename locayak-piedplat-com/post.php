<?
 require_once "dao/MembreDAO.php";
 $membre = MembreDAO::recupererMembre(1);

session_start();
if(isset($membre['prenom'])){
    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$membre['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
     
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>