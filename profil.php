<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '12345678');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div align="center">
         <h2>Bonjour bienvenu sur le profil de
         <br><br>
          "<?php echo $userinfo['pseudo']; ?>"</h2>
         <br />
        <h3> Votre Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br /></h3>
         <h3> Votre Mail = <?php echo $userinfo['mail']; ?>
         <br /></h3>
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <button><a href="deconnexion.php">Se déconnecter</a></button>
         <button><a href="/admin-cogip/admin/index.php">Acceuil</a></button>
         <button><a href="index.php">Admin</a></button>
         <!-- <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a> -->
         <?php
         }
         ?>
      </div>
   </body>

   <style>
   H2{
       color:blue;
       padding:2%;
   }
   button{
       padding:1%;
       background-color:#9696f99c;
       border: 2px solid blue;
       border-radius: 5px;
   }
  
    body{
    background-color:#a0b7d05c;
       
   }
   a{
       color:black;
       
   }
   </style>

</html>
<?php   
}
?>