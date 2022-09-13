<?php
$servername = "localhost";
$username = "mathis";
$password = "mathis";
// je me connecte à ma base de données avec le compte précisé ci-dessus
$conn = new PDO("mysql:host=$servername;dbname=stage", $username, $password);

$stmt = $conn->prepare("UPDATE t_contacts  SET nom=:nom, prenom=:prenom,mobile=:mobile,email=:email WHERE contact_id=:contact_id");
$stmt->bindParam(':nom', $_POST['nom'] );
$stmt->bindParam(':prenom', $_POST['prenom']);
$stmt->bindParam(':mobile', $_POST['mobile']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':contact_id', $_POST['contact_id']);
$stmt->execute();

header('Location: '.'./Evaluation_2_page_de_contacts.php');
?>