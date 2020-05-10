<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Projet de PHP</title>
    <meta content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/styleAdminQuestion.css">
  </head>
  <body>
      <div class="bor">
      <div>
    <p class="message"> Le plesir de jouer </p>  
    <div>
    <div class="quiz"><h2 class="h22">CREEZ ET PRAMETRE VOS QUIZ</h2>
<h3 class="deconexion"><a href="../connexcion.php"> Déconnexion </a></h3>        
</div> 
    <h2 class="prametr">LISTE DES JOUEUR PAR SCORT</h2>
    <div class="border1">
        <img src="images/img5.jpg">
    </div>
    <table>
        <tr><td>Lister Question</td><td class="img1"><a href="#"><img src="images/ic-liste-active.png"></a></td></tr>
        <td></td>
        <td></td>
        <tr><td>Creer Admin</td><td class="img1"><a href="#"><img src="images/ic-ajout-active.png"></a></td></tr>
        <td></td>
        <td></td>
        <tr><td>Listre jouers</td><td class="img1"><a href="#"><img src="images/ic-liste-active.png"></a></td></tr>
        <td></td>
        <td></td>
        <tr><td>Creer Question</td><td class="img1"><a href="#"><img src="images/ic-ajout-active.png"></td></tr>
        <tr><td>Creer Question</td><td class="img1"><a href="#"><img src="images/ic-liste-active.png"></a></td></tr>
    </table>
    <?php
    $List_users=file_get_contents('bassse_donnee.json');
    $List_users=json_decode($List_users,true);
    if (isset($_POST['connexionAdmin'])) {
      if ("profil"==$List_users['joueur']) {
          echo"vous question vous ";
      }
      else {
          echo"c impossible de posse une Question en tanque Admin ";
      }
    }
    ?>
     <form id="formQuestion">
    <div>
<div class="listusers" id="listusers">
<div class="affichage_joueurs">
    <?php
    $List_users=file_get_contents('bassse_donnee.json');
    $List_users=json_decode($List_users,true);
    ?>
     <table>
         <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Score</th>
         </thead>
         <tbody>  
        <?php   
   if(isset($_GET['page']))
     {
       $page= $_GET['page'];
    }
  else{
 $page= 1;
 }       $comp=1;
        $nbrparPage=5;
        $total=count($List_users);
        $nombredepages= ceil($total/$nbrparPage);
       // $_SESSION['users'] =$List_users;
       $min=($page-1)*$nbrparPage;
        $max=$min+$nbrparPage-1;
          rsort($List_users);
        for ($i=$min; $i<=$max; $i++): 
        if ("joueur"==$List_users[$i]['role'] && ""!=$List_users[$i]['nom']) {
           $comp++;
           ?>
            <tr> 
            <td><?php  echo $List_users[$i]['nom']?> </td>
            <td><?php  echo $List_users[$i]['prenom']?></td>
            <td><?php  echo $List_users[$i]['score']?> pts</td>
        </tr>
         <?php } 
         else{
             break;
         }
         endfor; 
         ?>
         </tbody>
     </table>
     <div>
     <?php
    
     if($page>1)
     {
         ?>
          <button type="submit" name="precedent" class="precedent" id="precedent"><a href="admin-question.php?lien=accueil&lien1=listes-jouer&page=<?= $page-1?>">PRECEDENT</a></button>
        <?php  }   
        else{
            echo "";
        } 
        if($comp<$nbrparPage)
        echo "";
        else{
            ?>
             <button type="submit" name="suivant" class="suivant" id="suivant"><a href="admin-question?lien=admin-question&lien1=listes-jouer&page=<?= $page+1?>"><p class="suiv">SUIVANT</p></a></button>

            <?php  
            } 
            ?>
        </div>
</div>
    <script src="jquery-3.1.1.min.j"></script>
    <script src="script.js"></script>
  </div>
</div>
  </body>
  <footer ></footer>
</html>