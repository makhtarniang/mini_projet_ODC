<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compt Admin</title>
    <link rel="stylesheet" href="css/inscriptin.css">
    <style>
      /*  .cadre{
            background-color: white;
            width: 50%;
            height: 70%;
            position: absolute;
            margin-left: 25%;
            
        }
        .gauche{
            height: 100%;
            width: 70%;
           
        }
        .droite{
           float: right;
           height:28%;
            width: 28%;
            background-color: orange;
          margin-top: -60%;
          border-radius:50% 
            
        }
        .prenom{
           
            margin-left: 5%;
            background-color:#FFFFFF;
            width: 40%;
            height: 20%;
            border-radius: solid  50% blue;
            
        }
        .label{
            margin-left: 5%;

        }
        
        */
    </style>
</head>
<body>
   <div class="header">
       <h2 class="slogan"> Le plaisir de jouer </h2>
   </div>
   <div class="container">
       <div class="cadre">
           <div class="gauche">
           <form action="" class="adherer" enctype="multipart/form-data" id="formul" method="POST">
              <div class="body-form">
                  <div class="cotenire">
                  <div class="inscri"> S'inscrire pour jouer</div>
                  <div class="bar"></div>
                        <label for="">Prenom</label><br>
                        <input type="text" placeholder="Aaaa" name="prenom" class="prenom" id="pren" >
                        <span id="missprenom"></span><br>
                        <label for="">Nom</label><br>
                        <input type="text" placeholder="BBBB" name="nom" class="prenom" id="nom">
                        <span id="missnom"></span><br>
                        <label for="">login</label><br>
                        <input type="text" placeholder="Login" name="login" class="prenom" id="login" >
                        <span id="misslogin"></span><br>
                        <label for="">Passeword</label><br>
                        <input type="password" placeholder="...." name="pass" class="prenom" id="pass">
                        <span id="misspass"></span><br>
                        <label for="">Confirmer Passeword</label><br>
                        <input type="password" placeholder="...." name="passbi" class="prenom" id="passbi">
                        <span id="misspassbi"></span><br>
                        <label for="">photo</label><br>
                        <input type="file" name="image" id="tof" class="bouton" onchange="document.getElementById('photo').src=window.URL.createObjectURL(this.files[0])">
                        <span id="misstof"></span><br>
                       <input type="submit" value="creer_compte" name="creer_compte" class="bouton" id="compte">
                   </div>
                  <div>
                 <img class="droite" id="photo">
                   avatar  
                       </div>
                </div>
                </form>
           </div>
       </div>
   </div>
  </body>
</html>
<script>  
       var formul=document.getElementById('formul');
       formul.addEventListener('submit',function(e){
           var prenom=document.getElementById('pren');
           var nom=document.getElementById('nom');
           var login=document.getElementById('login');
           var pass=document.getElementById('pass');
           var passbi=document.getElementById('passbi');
           var image=document.getElementById('tof');
           if(prenom.value.trim()=="")
           {  
               var misspre=document.getElementById('missprenom');
               misspre.innerHTML="le prenom est obligation";
               e.preventDefault(); 
               misspre.style.color="red";  
           }
           if(nom.value.trim()=="")
           {  
               var missnom=document.getElementById('missnom');
               missnom.innerHTML="le nom est obligation";
               e.preventDefault(); 
               missnom.style.color="red";  
           }
           if(login.value.trim()=="")
           {  
               var misslogin=document.getElementById('misslogin');
               misslogin.innerHTML="un login est obligation";
               e.preventDefault(); 
               misslogin.style.color="red";  
           }
           if(pass.value.trim()=="")
           {  
               var misspass=document.getElementById('misspass');
               misspass.innerHTML="un  mot de pass est obligation";
               e.preventDefault(); 
               misspass.style.color="red";  
           }
           if(passbi.value.trim()=="")
           {  
               var misspassbi=document.getElementById('misspassbi');
               misspassbi.innerHTML="la confirmation du mot de passe est requis";
               e.preventDefault(); 
               misspassbi.style.color="red";  
           }
           if(tof.value.trim()=="")
           {  
               var misstof=document.getElementById('misstof');
               misstof.innerHTML="votre photo est requis";
               e.preventDefault(); 
               misstof.style.color="red";  
           }
        
       }
    )
   
   </script>
   <?php 
  include('fonction.php');
  if ( isset($_POST['creer_compte']) &&  Maj($_POST['prenom'])  &&  Maj($_POST['nom']) &&
     verif_alphaNum($_POST['pass']) &&  verif_alphaNum($_POST['passbi']) && verif_alphaNum($_POST['pass'])==verif_alphaNum($_POST['passbi']) 
     && verif_alphaNum($_POST['login'])  ) 
           { 
            $chemin="../asset/img/".$_FILES['image']['name'];
            move_uploaded_file( $files['image']['tmp_name'] , $chemin  );
            if(!empty($_files['image']['name']) && isset($_files['image']))
            {
                $formatsauto=array(".jpeg",".JPEG", ".PNG", ".png");
               $nomimage= $_FILES['image']['name'];
                $typeavatar=$_FILES['image']['type'];
                $extension=strrchr($nomimage,".");
                $chemin="../asset/img/".$_FILES['image']['name'];
                move_uploaded_file( $files['image']['tmp_name'] , $chemin  );
                if(in_array($extension,$formatsauto))
                {
                    echo "est";
                   
                }
                else 
                {
                    echo "seul les fichiers jpeg ou png sont autorisés";
                }   
            } 
            $newgamer=array();
            $tab=file_get_contents('bassse_donnee.php');
            $tab=json_decode($tab, true);
           # var_dump($tab);
        foreach ($tab as $key=>$value)  
        {
                if($_POST['login']==$value['login'])
                {
                    echo " ce Login existe deja";
                }
                else{ $newgamer['prenom']=Maj($_POST['prenom']);
                    $newgamer['nom']=Maj($_POST['nom']);
                    $newgamer['login']=$_POST['login'] ;
                    $newgamer['password']=$_POST['pass'];
                    $newgamer['role']="joueur";
                    $newgamer['image']=$_FILES['image']['name'];
                    $tab[]=$newgamer;
                    $tab=json_encode($tab);
                    file_put_contents('bassse_donnee.json',$tab);
                    header('location:admin-question.php');
                }
            }
           }
           else {
               echo "Makhtar 1 genere";
           }
?>