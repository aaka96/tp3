<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "surrealista";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
  echo $e->getMessage();                         
}

    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];
    $email = $_POST['mail'];
    $message = $_POST['mensaje'];
    $gsent = $conn->prepare('INSERT INTO contactos (nombre, apellido, email, mensaje) VALUES (:name,:lastname,:email,:message)');
    $gsent->bindParam(':name', $name);
    $gsent->bindParam(':lastname', $lastname);
    $gsent->bindParam(':email', $email);
    $gsent->bindParam(':message', $message);
    $gsent->execute();
?>

<h1>Muchas gracias</h1>