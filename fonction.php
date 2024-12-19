<?php  

//Fonction de connexion à la BD 
function connect_bd($nomBd)
{
     $nomBd='systeme_solaire';
     $nomServeur='localhost'; // nom du serveur
     $login='root';           //login de l'lutilisateur
     $passWd='';              // mot de passe 
     try
    {
        // Connexion à la BD et définition du jeu de caractères UTF-8
        $cnx = new PDO("mysql:host=$nomServeur;dbname=$nomBd", $login, $passWd);

        // PDO génére une erreur fatale si un problème survient.
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Jeu de caractères 
        $cnx -> exec("SET CHARACTER SET utf8");

        // echo "connecté !";
        return $cnx;
    }
    catch(PDOException $e)
    {
        print"Erreur !:" .$e->getMessage() ."<br/>";
        die();
        return 0;
    }

}
 // Fonction de deconnexion de la BD
 function deconnect_bd($nomBd)
 {
    $nomBd = null;
 } 

  //Fonction stat avec paramètre
  function NbAdherent($unTarif)
  {
     $cnx=connect_bd('nomBd');
 // preparation de la requete
     $req=$cnx->prepare("Select Count(*) as 'NbAdherent' From adherent,tarif Where adherent.idTarif = tarif.idTarif And TypeTarif = :unTarif");
 
     //Definition paramètre
     $req-> bindParam(':unTarif',$unTarif,PDO::PARAM_STR);
     //Execution de la requête 
     $req -> execute();
     //Récupération des données sous la forme d'un tableau associatif
     $ligne = $req-> fetch ( PDO :: FETCH_ASSOC);
     return $ligne ['NbAdherent'];
  }
 ?> 