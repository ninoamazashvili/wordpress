<?php  
$pdo = new PDO('mysql:host=localhost; port=3306; dbname=books', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$numperpage=10;
$countsql=$pdo->prepare('SELECT COUNT(Id) FROM booklist');
$countsql->execute();
$row=$countsql->fetch();
$numrecords=$row[0];
$numlinks=ceil($numrecords/$numperpage);
$page=$_GET["start"];
if (!$page) $page=0;
$start=$page*$numperpage;



?>