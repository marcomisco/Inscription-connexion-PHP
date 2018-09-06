<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=apps_cogip', 'root', '12345678');

//confirmer (faire une colonne confirme dans phpmyadmin)
if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirme = (int) $_GET['confirme'];
    
    $req = $bdd->prepare('UPDATE FACTURES SET confirme = 1 WHERE idFACTURES = ?');
    $req->execute(array($confirme));
 }

 //suprimer
 if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];
    $req = $bdd->prepare('DELETE FROM FACTURES WHERE idFACTURES = ?');
    $req->execute(array($supprime));
 }






//confirmer (faire une colonne confirme dans phpmyadmin)
if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirme = (int) $_GET['confirme'];
    
    $req = $bdd->prepare('UPDATE SOCIETES SET confirme = 1 WHERE idSOCIETES = ?');
    $req->execute(array($confirme));
 }

 //suprimer
 if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];
    $req = $bdd->prepare('DELETE FROM SOCIETES WHERE idSOCIETES = ?');
    $req->execute(array($supprime));
 }

//afficher les 5 premiers
$membres2 = $bdd ->query ('SELECT*FROM SOCIETES ORDER BY idSOCIETES DESC LIMIT 0,5');



















//afficher les 5 premiers
$membres = $bdd ->query ('SELECT*FROM FACTURES ORDER BY idFACTURES DESC LIMIT 0,5');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrateur</title>
</head>
<body>
<H1>ACCEUIL</H1>
<H3>Vous etes bien connecté</H3>



<H2>Mes 5 dernieres petites factures</H2>
    <!-- afficher la bases de données -->

    <ul>
            <?php while($m = $membres -> fetch()){ ?>
<li><?= $m['idFACTURES'] ?> 
    <!-- confirmer un membre -->
: <?=$m['numero_facture'] ?><?php if($m['confirme'] == 0){?> - <a href="index.php?confirme=
 <?= $m['idFACTURES'] ?>">confirmer</a><?php } ?> 
<!-- supprimer un membre -->
- <a href="index.php?supprime=<?= $m['idFACTURES']?>">supprimer</a></li>   
        <?php } ?>
    </ul>
    
    <ul>
            <?php while($m = $membres -> fetch()){ ?>
<li><?= $m['idFACTURES'] ?> 
    <!-- confirmer un membre -->
: <?=$m['numero_facture'] ?><?php if($m['confirme'] == 0){?> - <a href="index.php?confirme=
 <?= $m['motif_prestation_facture'] ?>">confirmer</a><?php } ?> 
<!-- supprimer un membre -->
- <a href="index.php?supprime=<?= $m['motif_prestation_facture']?>">supprimer</a></li>    
        <?php } ?>

<a href="">voir toutes les factures</a>


<!-- les societés -->
<H2>Mes 5 dernières sociétés</H2>
           <?php while($m = $membres2 -> fetch()){ ?>
<li><?= $m['idSOCIETES'] ?> 

: <?=$m['nom_societe'] ?>






    <!-- confirmer un membre -->
    <?php if($m['confirme'] == 0){?> - <a href="index.php?confirme=
 <?= $m['idSOCIETES'] ?>">confirmer</a><?php } ?>
 

<!-- supprimer un membre -->
- <a href="index8.php?supprime=<?= $m['idSOCIETES']?>">supprimer</a></li>


      
        <?php } ?>


   <a href="">voir toutes les sociétés</a>   










    </ul>

    <h2>Vos fournisseurs</h2>
    <a href="">Mes fournisseurs</a>
    <h2>Clients</h2>
    <a href="">Clients</a>

</body>
<style>
body{
    padding:1%;
    margin-left:40%;

}
H3{
    color:green;
}
</style>
</html>