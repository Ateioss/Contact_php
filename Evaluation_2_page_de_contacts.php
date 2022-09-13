<?php
    $servername ="localhost";
    $username = "mathis";
    $password = "mathis";
    // je me connecte à ma base de données avec le compte précisé ci-dessus
    $conn = new PDO("mysql:host=$servername;dbname=stage", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//sert à la lecture uniquement 

    //je prépare ma requete que je vais envoyer à ma base de données
    $stmt = $conn->prepare("SELECT Nom,Prenom,Mobile,Email,Contact_ID FROM t_contacts");
    //j'exécute ma requete ou encore je l'envoie à la base de donnée à laquelle je suis connecté
    $stmt->execute();
    //je lis la réponse à ma requete que la base de donnée m'a renvoyee
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//je définit le format de la réponse 
    $contacts = $stmt->fetchAll();

    $contact_first = $contacts[0];

    if(isset($_GET['contact'])){
            $stmt = $conn->prepare("SELECT Nom,Prenom,Mobile,Email,Contact_ID FROM t_contacts where contact_id=:contact_id");
            $stmt->bindParam(':contact_id', $_GET['contact']);
            $stmt->execute();
            $contact_first = $stmt->fetch();
    }
    
    $conn = null;
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Evaluation_2_page_de_contacts.css">
</head>
<body>
    
    <div class="header">
        <img src="R.png" alt="" class="image-logo">
        <p class="texte-noir"> Application de contacts </p>
    </div> 
    
    <div class="main">
        <div class="bloc-liste-contacts">
            <div class="logo-contacts">
                <img src="message-logo.png" class="logo-pour-le-contact" alt="">
                <h1 class="texte-noir">Contacts</h1>
            </div>
            <div>
                <?php foreach($contacts as $contact):?>
                <a href="Evaluation_2_page_de_contacts.php?contact=<?=$contact["Contact_ID"]?>" class="texte-contacts"><?=$contact["Nom"]?>-<?=$contact["Prenom"]?></a>
                <?php endforeach;?>
                <a href="javascript:void(0);" class="contact-box" onclick="afficher_form_creation()">Ajouter un contact</a>
                
            </div>
        </div>
        <div class="bloc-info-contact">
            <div class="bloc-info-contact-header">
                <img class="photo-contact" src="photo_contact.png" alt="">
                <p class="texte-blanc"><?=$contact_first["Email"]?></p>
            </div>
            <div class="bloc-info-contact-main">
                <div class="bloc-info-contact-form">
                    <div class="contact-info"> 
                        <p class="texte-noir">Nom</p>
                        <p  id="info-nom" class="texte-noir affichage-info" ><?=$contact_first["Nom"]?></p>
                    </div>
                    <div class="contact-info"> 
                        <p class="texte-noir">Prenom</p>
                        <p id="info-prenom" class="texte-noir affichage-info"><?=$contact_first["Prenom"]?></p>
                    </div>
                    <div class="contact-info"> 
                        <p class="texte-noir">Téléphone</p>
                        <p id="info-mobile" class="texte-noir affichage-info"><?=$contact_first["Mobile"]?></p>
                    </div>
                    <div class="contact-info"> 
                        <p class="texte-noir">Email</p>
                        <p id="info-email" class="texte-noir affichage-info"><?=$contact_first["Email"]?></p>
                    </div>
                </div>
                <div class="zone-commande">
                    <a href="javascript:void(0);" class="bouton-modifier" onclick="afficher_form_modification()">Modifier</a>
                    <a href="Contact_suppression.php?contact=<?=$contact_first["Contact_ID"]?>" class="bouton-modifier">Supprimer</a>
                </div>
                <p  id="info-contact_id" class="cacher" ><?=$contact_first["Contact_ID"]?></p>
            </div>
            <div class="bloc-form-creation cacher">
                <form action="Contact_creation.php" class="form-creation" method="post">
                    <div class="contact-info">
                        <label>Nom</label>
                        <input type="text" placeholder="Renseigner le nom du contact" name="nom">
                    </div>
                    <div class="contact-info">
                        <label>Prénom</label>
                        <input type="text" placeholder="Renseigner le prenom du contact" name="prenom">
                    </div>
                    <div class="contact-info">
                        <label>Mobile</label>
                        <input type="text" placeholder="Renseigner le mobile du contact" name="mobile">
                    </div>
                    <div class="contact-info">
                        <label>Email</label>
                        <input type="email" placeholder="Renseigner l'email du contact" name="email">
                    </div>
                    <input type="submit" value="Enregistrer">
                </form>
            </div>
            <div class="bloc-form-modification cacher">
                <form action="Contact_modification.php" class="form-modification" method="post">
                    <div class="contact-info">
                        <label>Nom</label>
                        <input id="form-modif-nom" type="text" placeholder="Renseigner le nom du contact" name="nom">
                    </div>
                    <div class="contact-info">
                        <label>Prénom</label>
                        <input id="form-modif-prenom" type="text" placeholder="Renseigner le prenom du contact" name="prenom">
                    </div>
                    <div class="contact-info">
                        <label>Mobile</label>
                        <input id="form-modif-mobile" type="text" placeholder="Renseigner le mobile du contact" name="mobile">
                    </div>
                    <div class="contact-info">
                        <label>Email</label>
                        <input id="form-modif-email" type="email" placeholder="Renseigner l'email du contact" name="email">
                    </div>
                    <input id="form-modif-contact_id" type="hidden" name="contact_id">
                    <input type="submit" value="Enregistrer">
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <a class="mode-dark-button" onclick="mode_dark()">Mode dark</a>
    </div>
    <script src="Evaluation_2.js"></script>
</body>
</html>