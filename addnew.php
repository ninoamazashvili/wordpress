<?php  
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=books', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo $_SERVER['REQUEST_METHOD']. '<br>';


$Name='';
$Author='';
$Description='';


if (isset($_POST['ADD'])){
  
    $Name=$_POST['Name'];
    $Author=$_POST['Author'];
    $Description=$_POST['Description'];

$statement=$pdo->prepare("INSERT INTO booklist (Name,Author,Description) 
  
VALUES (:Name,:Author,:Description)");

$statement->bindValue(':Name', $Name);
$statement->bindValue(':Author', $Author);
$statement->bindValue(':Description', $Description);
$statement->execute();
header('location:index.html');
}

?>