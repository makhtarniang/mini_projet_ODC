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
    <form id="formQuestion" method="POST">
    <div>
    <div class="creat_question">
</div>
<div class="list_questions" id="list_questions">
<div class="questions">
<div class="Q1">
<style>
    .zoneliste{
        height: 100%;
    }
    .questionJeu{
        margin-left: 10%;
        height: 10%;
    }
    .nbrquestion
    {
        width: 40px;
    }
    .affichage{
        width: 95%;
        height: 90%;
        margin: 10px;
        border: 1px solid burlywood;
        border-radius: 3%;
    }
</style>
<div class="zoneliste">
    <div class="questionJeu" >
        <form action="" method="POST">
            <label for="" class="" > Nbre question/jeu</label>
            <input type="text" name="elementsByPage" class="nbrquestion">
            <button type="submit" name="valider" value="valider">OK</button>
        </form>
    </div>
    <div class="affichage">
    <?php 
       if(empty($_POST['elementsByPage']) || !is_numeric($_POST['elementsByPage']) || $_POST['elementsByPage']>0)  
        if(isset($_POST['valider']))
        {
            if(empty($_POST['elementsByPage']) || !is_numeric($_POST['elementsByPage']) || $_POST['elementsByPage']<1)
            {
                echo "s'aisir le nombre de question";
            }
            else
            { 
                $elementByPage=$_POST['elementsByPage'];
                $messages = file_get_contents('listes_questions.json');
                $messages = json_decode($messages, true);
                $l=count($messages);
                $_SESSION['meilleur']=$messages;  
             if(isset($_SESSION['meilleur']))
             {
                 $total=sizeof($_SESSION['meilleur']);
                 $col=1;
                 $lign=$elementByPage;
                 $elePag=($col*$lign);
                 $nbrPage=ceil($total/$elePag);
                 if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
                 {
                     $page_num=$_GET['page'];
                 }
                 else
                 {
                      $page_num=1;
                 }
                     echo'<table><tr>';
                        for($j=($page_num-1)*$lign;$j<$page_num*$lign;$j++)
                        {
                            if($j==$total)
                            {
                            break;
                            }
                          echo $_SESSION['meilleur'][$j]['Q'].'<br>';             
                            if($_SESSION['meilleur'][$j]['choix']=="texte")
                            {
                                foreach ($_SESSION['meilleur'][$j]['Reponse'] as $key => $value) 
                                {                    
                                    ?><input type="text" disabled value="<?php echo  $value ;?>"></br> <?php    
                                }
                            }
                            elseif($_SESSION['meilleur'][$j]['choix']=="simple")
                            {
                                foreach($_SESSION['meilleur'][$j]['choix'] as $key=>$value) 
                                {       
                                    $t=$value;
                                    foreach ($_SESSION['meilleur'][$j]['Reponse'] as $key => $value)
                                    {
                                        if($key==$t)
                                        {
                                            ?><input type="radio" checked="checked" style="background-color: blue;"  disabled ><?php
                                            echo $_SESSION['meilleur'][$j]['Reponse'][$key].'</br>';
                                        }
                                        else
                                        {
                                            ?> 
                                        <input type="radio" disabled>
                                        <input type="text" disabled value="<?php echo $_SESSION['meilleur'][$j]['Reponse'][$key] ;?>"><br> 
                                        <?php
                                        }
                                    }
                                }
                            }
                            else
                            {
                                foreach($_SESSION['meilleur'][$j]['Vrai'] as $key=>$value) 
                                {       
                                    $t=$key;
                                    foreach ($_SESSION['meilleur'][$j]['Reponse'] as $key => $value)
                                    {
                                        if($key==$t)
                                        {
                                            ?><input type="checkbox" checked="checked" style="background-color: blue;"  disabled ><?php
                                            echo $_SESSION['meilleur'][$j]['Reponse'][$key].'</br>';
                                        }
                                        else
                                        {
                                         ?>    
                                        <input type="checkbox" disabled  >
                                        <input type="text" disabled value="<?php echo $_SESSION['meilleur'][$j]['Reponse'][$key] ;?>"><br> 
                                        <?php
                                        }
                                    }   
                                }
                            }
                        } 
                        echo'</tr></table>';        
                 }    
            }
        }  
      ?>
    </div>
</div>
    <label for="">1. Les Langages web</label>
    <br>
    <input type="checkbox" name="c1" id="c1" class="checkbox"><span  class="spans">HTML</span>
    <br>
    <input type="checkbox" name="c2" id="c2" class="checkbox"><span class="spans">R</span>
    <br>
    <input type="checkbox" name="c3" id="c3" class="checkbox"><span class="spans">JAVA</span>
    </div>
    <div class="Q2">
    <label for="">2. D'ou vient Corrona ?</label>
     <br>
    <input type="checkbox" name="c4" id="c4" class="checkbox"><span  class="spans">Italie</span>
    <br>
    <input type="checkbox" name="c5" id="c5" class="checkbox"><span class="spans">Chine</span>  
</div>
<div class="Q3">
    <label for="">3. Quel terme définit langage qui s’adapte sur Androïd et sur Ios?</label>
    <input type="text" class="inp1">
    </div>
    <div class="Q4">
    <label for="">4. Quelle est la première école de codage gratuite au Sénégal?</label>
   <br>
    <input type="checkbox" name="c4" id="c4" class="checkbox"><span  class="spans">Simplon</span>
    <br>
    <input type="checkbox" name="c5" id="c5" class="checkbox"><span class="spans">Orange Digital Center</span>
</div>
<div class="Q5">
    <label for="">5. Les précurseurs de la révolution digitale</label>
<br>
    <input type="checkbox" name="c4" id="c4" class="checkbox"><span  class="spans">GAFAM</span>
<br>
    <input type="checkbox" name="c5" id="c5" class="checkbox"><span class="spans">CIA-FBI</span>
</div><br><br>
            <?php
            $nbrPage=1;
            for ($i=1; $i <=$nbrPage ; $i++) 
                     {
                        echo "<a href='listes_questions.php?lien=1&page=".$i."' >Page $i  </a>";
                     }
                ?>
              <div id="divSubmit">
            <input type="submit" name="connexionAdmin" value="suivant" class="validerQuestion"/>
            <?php
             if(empty($_POST['elementsByPage']) || !is_numeric($_POST['elementsByPage']) || $_POST['elementsByPage']>0)  
             if(isset($_POST['connexionAdmin']))
            
             {
                 
                 if(empty($_POST['elementsByPage']) || !is_numeric($_POST['elementsByPage']) || $_POST['elementsByPage']<1)
                 {
                     echo "$nbrPage";
                 }
                 else
                 { 
                   
                  if(isset($_SESSION['Q']))
                  {
                      $total=sizeof($_SESSION['Q']);
                      $col=1;
                      $lign=$elementByPage;
                      $elePag=($col*$lign);
                      $nbrPage=ceil($total/$elePag);
                      if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
                      {
                          $page_num=$_GET['page'];
                      }
                      else
                      {
                           $page_num=1;
                      }
                          echo'<table><tr>';
                             for($j=($page_num-1)*$lign;$j<$page_num*$lign;$j++)
                             {
                                 if($j==$total)
                                 {
                                 break;
                                 }
                               echo $_SESSION['meilleur'][$j]['Q'].'<br>';             
                                 if($_SESSION['meilleur'][$j]['choix']=="texte")
                                 {
                                     foreach ($_SESSION['meilleur'][$j]['Reponse'] as $key => $value) 
                                     {                    
                                         ?><input type="text" disabled value="<?php echo  $value ;?>"></br> <?php    
                                     }
                                 }
                                 elseif($_SESSION['meilleur'][$j]['choix']=="simple")
                                 {
                                     foreach($_SESSION['meilleur'][$j]['choix'] as $key=>$value) 
                                     {       
                                         $t=$value;
                                         foreach ($_SESSION['meilleur'][$j]['Reponse'] as $key => $value)
                                         {
                                             if($key==$t)
                                             {
                                                 ?><input type="RADIO" checked="checked" style="background-color: blue;"  disabled ><?php
                                                 echo $_SESSION['meilleur'][$j]['Reponse'][$key].'</br>';
                                             }
                                             else
                                             {
                                                 ?> 
                                             <input type="radio" disabled>
                                             <input type="text" disabled value="<?php echo $_SESSION['meilleur'][$j]['Reponse'][$key] ;?>"><br> 
                                             <?php
                                             }
                                         }
                                     }
                                 }
                                
                                 }
                             } 
                             echo'</tr></table>';        
                      }    
                 }
           ?>
          </div>
        </div>
       </form>
    <script src="jquery-3.1.1.min.j"></script>
    <script src="script.js"></script>
  </div>
</div>
  </body>
  <footer ></footer>
</html>