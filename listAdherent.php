<?php
require_once('fonction.php');

// Établissement de la connexion
$cnx = connect_bd('adherent');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inscription'])) {
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $adressemail = $_POST['adressemail'];
    $identifiant_ = $_POST['identifiant_'];
    $mdp = $_POST['mdp'];

    if ($cnx) {
        $result = $cnx->prepare("INSERT INTO adherent (Nom, Prenom, adressemail, identifiant_,mdp) VALUES (:Nom, :Prenom, :adressemail, :identifiant_, :mdp)");
        $result->bindParam(':Nom', $Nom, PDO::PARAM_STR);
        $result->bindParam(':Prenom', $Prenom, PDO::PARAM_STR);
        $result->bindParam(':adressemail', $adressemail, PDO::PARAM_STR);
        $result->bindParam(':identifiant_', $identifiant_, PDO::PARAM_STR);
        $result->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $result->execute();

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Erreur de connexion à la base de données.";
    }
}

if ($cnx) {
    if (isset($_REQUEST['delete'])) {
        $idAdherent = isset($_REQUEST['cle']) ? $_REQUEST['cle'] : null;

        if ($idAdherent !== null) {
            // Supprimer les entrées associées dans la table 'participe'
            $deleteParticipe = $cnx->prepare("DELETE FROM participe WHERE idAdherent = :idAdherent");
            $deleteParticipe->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
            $deleteParticipe->execute();

            // Ensuite, supprimer l'adhérent de la table 'adherent'
            $deleteAdherent = $cnx->prepare("DELETE FROM adherent WHERE idAdherent = :idAdherent");
            $deleteAdherent->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
            $deleteAdherent->execute();
            header("Location: admin_page.php");
        } else {
            echo "Erreur: idAdherent non spécifié.";
        }
    }

    // L'utilisateur a cliqué sur "Modifier"
    elseif (isset($_REQUEST['update'])) {
        // Préparation de la requête UPDATE
        $result = $cnx->prepare("UPDATE adherent SET Nom=:Nom, Prenom=:Prenom, adressemail=:adressemail, identifiant_=:identifiant_,mdp = :mdp WHERE idAdherent=:cle");
        // On récupère les valeurs postées dans une variable
        $idAdherent = isset($_REQUEST['cle']) ? $_REQUEST['cle'] : null;
        if ($idAdherent !== null) {
            $Nom = $_REQUEST['Nom'];
            $Prenom = $_REQUEST['Prenom'];
            $adressemail = $_REQUEST['adressemail'];
            $identifiant_ = $_REQUEST['identifiant_'];
            $mdp = $_REQUEST['mdp'];

            // On lie chaque marqueur à sa variable
            $result->bindParam(':cle', $idAdherent, PDO::PARAM_INT);
            $result->bindParam(':Nom', $Nom, PDO::PARAM_STR);
            $result->bindParam(':Prenom', $Prenom, PDO::PARAM_STR);
            $result->bindParam(':adressemail', $adressemail, PDO::PARAM_STR);
            $result->bindParam(':identifiant_', $identifiant_, PDO::PARAM_STR);
            $result->bindParam(':mdp', $mdp, PDO::PARAM_STR);

            $result->execute(); // Exécution de la requête UPDATE

            header("Location: admin_page.php");
        } else {
            echo "Erreur: idAdherent non spécifié.";
        }
    }

    // Affichage du formulaire d'inscription
    echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
    echo '<h2>Listage des utilisateur</h2>';
    echo '<label for="Nom">Nom :</label>';
    echo '<input type="text" name="Nom" required><br>';
    echo '<label for="Prenom">Prénom :</label>';
    echo '<input type="text" name="Prenom" required><br>';
    echo '<label for="adressemail">Email :</label>';
    echo '<input type="email" name="adressemail" required><br>';
    echo '<label for="identifiant_">Pseudo :</label>';
    echo '<input type="text" name="identifiant_" required><br>';
    echo '<label for="mdp">Mot de passe :</label>';
    echo '<input type="text" name="mdp" required><br>';
    echo '<input type="submit" name="inscription" value="Inscription">';
    echo '</form>';

    // Modification de la requête pour inclure la clause WHERE
    $query = 'SELECT * FROM adherent WHERE 1';

    $result = $cnx->prepare($query);

    // Exécution de la requête
    $result->execute();

    //Stat adherent
    if ($cnx) {

        $requete_count = $cnx->query("SELECT COUNT(*) as 'NbAdherent' FROM adherent");

        $dataCount = $requete_count->fetch(PDO::FETCH_ASSOC);

        $nbFilms = $dataCount["NbAdherent"];

        echo "Nombre d'adherent : " . $nbFilms;
        echo '<br/>';
    } else {
        echo "Echec de la connexion";
    }
    // Stat VIP
    if ($cnx) {

        // nb adh Admin
        $unTarif = 'Admin';
        echo "Nombre adherent du genre $unTarif  : " . NbAdherent($unTarif);


        $unTarif = 'Membre Regulier';
        echo " <br>Nombre adherent du genre $unTarif  : " . NbAdherent($unTarif);

        $unTarif = 'Amateur';
        echo " <br>Nombre adherent du genre $unTarif  : " . NbAdherent($unTarif);

        $unTarif = 'V.I.P';
        echo " <br>Nombre adherent du genre $unTarif  : " . NbAdherent($unTarif);
    }

    //

    // Affichage des résultats
    if ($result->rowCount() > 0) {
        echo "<table border='1'>";
        echo "<thead>";

        echo "<th scope='col'>idAdherent</th>";
        echo "<th scope='col'>Nom</th>";
        echo "<th scope='col'>Prenom</th>";
        echo "<th scope='col'>email</th>";
        echo "<th scope='col'>identifiant_</th>";
        echo "<th scope='col'>mdp</th>";
        echo "<th scope='col'>Modifier</th>";
        echo "<th scope='col'>Supprimer</th>";
        echo "</tr>";
        echo "<thead>";


        while ($donnees = $result->fetch()) {
            echo "<tbody >";
            // echo "<form action=" . $_SERVER['PHP_SELF'] . " method='post'>";
            echo "<form action='listAdherent.php' method='post'>";
            echo "<input type='hidden' name='cle' value='" . $donnees['idAdherent'] . "'>";
            echo "<tr>";
            echo "<td>" . $donnees['idAdherent'] . "</td>";
            echo "<td><input type='text' name='Nom'size='20' value='" . $donnees['Nom'] . "'></td>";
            echo "<td><input type='text' name='Prenom'size='20' value='" . $donnees['Prenom'] . "'></td>";
            echo "<td><input type='text' name='adressemail'size='20' value='" . $donnees['adressemail'] . "'></td>";
            echo "<td><input type='text' name='identifiant_'size='20' value='" . $donnees['identifiant_'] . "'></td>";
            echo "<td><input type='text' name='mdp'size='20' value='" . $donnees['mdp'] . "'></td>";
            echo "<td><input class='btn btn-primary' type='submit' name='update' value='Modifier'></td>";
            echo "<td><input class='btn btn-danger' type='submit' name='delete' value='Supprimer'></td>";
            echo "</tr>";
            echo "</form>";
            echo "<tbody>";
        }
        echo "</table>";
    } else {
        echo "Aucun enregistrement, désolé";
    }
    deconnect_bd('adherent');
}
