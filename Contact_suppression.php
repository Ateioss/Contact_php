<?php
$servername = "localhost";
$username = "mathis";
$password = "mathis";
// je me connecte à ma base de données avec le compte précisé ci-dessus
$conn = new PDO("mysql:host=$servername;dbname=stage", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['contact'])){
    $stmt = $conn->prepare("DELETE FROM t_contacts where contact_id=:contact_id");
    $stmt->bindParam(':contact_id', $_GET['contact']);
    $stmt->execute();
} 

header('Location: '.'./Evaluation_2_page_de_contacts.php');
?>