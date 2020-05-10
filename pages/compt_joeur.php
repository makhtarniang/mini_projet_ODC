<?php 
function connexion($login,$pass)
{
    $utilisateur=getDate();
    foreach ($utilisateur as $key => $value) {
        if ($utilisateur["login"]===$login && $utilisateur["passworde"]===$pwd) {
           if ($utilisateur["profil"]==="admin") {
              return"admin-question";
           }else{
            return"compt_joeur";
           }
        }else{
            return"error";
        }
    }
}
/*function getDate($file="jouer.json"){
 $data=file_get_contents("./data/".$file.".php");
 $data=json_decode($data,true);
 return $data;
}*/
$trouve=0;
$t=0;
$t1=0;
$bdd=array();
$bdd['nom'] = array("admin","dany");
$bdd['prenom'] = array("admin","dany");
$bdd['login'] = array("admin","dany");
$bdd['pass'] = array("admin","dany");
$bdd['mdp'] = array("admin","dany");
    if (!empty($_POST)){
        $pseudo = $_POST['pseudo'];
        $mdp	= $_POST['mdp'];
        foreach($bdd['login'] as $key=> $val){
            if($val==$pseudo){
                $trouve+=1;
                $t=$key;
            break;
            }
        }
        foreach($bdd['pass'] as $key=>$val1){
            if($val1==$mdp){
                $trouve+=1;
                $t1=$key;
            break;
            }
        }
        if($trouve==2 && $t==$t1){
            header('location:admin-question.php');
        }else{
            header('location:index.php?error=1');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/compt_jouer.css">
    <title>Le plesir de jouer</title>
</head>
<body style="margin: 140px">
    <div class="container">
    <h1 class="plesirs"> Le plesir de jouer </h1>
        <div class="box">
        <p>S'INSCRIE</p>
        <h5>pour teste votre nivau de culture générale </h5>
       <!-- <p class="img">  <img src="img/img5.jpg"></p>-->
       <div class="image1"></div>
       <div class="image2"> </div>
       <p class="paragraph">avatar admin</p>
        <form enctype="multipart/form-data" method="POST">
    <div class="form-input">
                Prénom
                <div>
              <input class="inputMaterial" name="pseudo" type="text" placeholder="Aaaa" required>
                </div>
                Nom
                <div>
                  <input class="inputMaterial" name="pseudo" type="text" placeholder="BBBB" required>
                </div>
                login
                <div> 
                 <input class="inputMaterial" name="pseudo" type="text" placeholder="aabaab" required>
                </div>
                Password
                <div>
                    <input type="password" name="mdp" placeholder="password" required>
                </div>
                <div class="c">confirmer password</div>
                <div>
              <input type="password" name="mdp" placeholder="confirmation" required>
                </div>
                 <h3>Avatar</h3>
                <div>
                    <button type="submit">Créer compte</button>
                </div>    
                
            </form>
            <p id="fichier"> <input type="file" name="N"></p>
        </div>

       
    </div>
 </div>
</body>
</html>
</body>
</html>