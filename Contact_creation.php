<?php
    $servername ="localhost";
    $username = "mathis";
    $password = "mathis";
    // je me connecte à ma base de données avec le compte précisé ci-dessus
    $conn = new PDO("mysql:host=$servername;dbname=stage", $username, $password);
    
    
    $stmt = $conn->prepare("INSERT INTO t_contacts (Nom,Prenom,Mobile,Email) VALUES (:nom,:prenom,:mobile,:email)");
    $stmt->bindParam(':nom', $_POST['nom'] );
    $stmt->bindParam(':prenom', $_POST['prenom']);
    $stmt->bindParam(':mobile', $_POST['mobile']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    
    header('Location: '.'./Evaluation_2_page_de_contacts.php');
?>