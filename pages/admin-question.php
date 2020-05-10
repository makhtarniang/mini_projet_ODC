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
    <h2 class="prametr">PRAMETRE VOTRE QUESTION</h2>
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
        <div id="divQuestion">
            <label>Questions</label>
            <textarea name="question"></textarea>
        </div>
        <div class="divInput">
            <label>Nbre de point</label>
            <input type="num" name="scoreQuestion" />
        </div>
        <div id="divSelect">
            <label>Type de Rep </label>
         <!-- <p class="img">  <img src="images/ic-ajout-réponse.png"></p>-->
            <select id="type" name="type" onchange="mySelection()">
            <option>Donnez le type de repons
                <option>Choix multiple
                <option>Choix simple
                <option>Choix texte  
            </select>
            <img src="images/ic-ajout-réponse.png">
        </div>
        <div id="divNbreRep">
            <label> Reponse1</label>
            <input id="nbreReponses" type="num" name="nbreReponses"/>
         <label id="radioo"><input type="radio"> <input type="checkbox"></label>
        </div>
        <div id="reponses">
        </div> 
        <div id="divSubmit">
            <input type="submit" name="connexionAdmin" value="Enregistre" class="validerQuestion"/>
        </div>
    </form>
    <script src="jquery-3.1.1.min.j"></script>
    <script src="script.js"></script>
  </div>
</div>
  </body>
  <footer ></footer>
</html>