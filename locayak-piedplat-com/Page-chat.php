<?php
  include_once "header.php";
  require_once "dao/MembreDAO.php";
 $membre = MembreDAO::recupererMembre(1);
?>

<div id="wrapper">
            <div id="menu">
            <p class="welcome"><?= _('Bienvenue, ')?><b><?php echo $membre['nom']; ?></b>  <?php echo $membre['prenom'];?></p>
            </div>
 
            <div id="chatbox"></div>
 
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="<?= _('Envoyer')?>" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        //If user submits the form
        $("#submitmsg").click(function () {
            var clientmsg = $("#usermsg").val();
            $.post("post.php", { text: clientmsg });
            $("#usermsg").val("");
            return false;
        });

        function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 2500);
</script>

<?php
include_once "footer.php";
?>     

</body>
</html>