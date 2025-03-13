<?php 
require("db.classe.php");
$lieu=$_POST['lieu'];
$date=$_POST['date'];
$morts=$_POST['morts'];
$blesse=$_POST['blesse'];
$collision=$_POST['collision'];
$lien=$_POST['lien'];
$check="no";



$stmt = $conn->prepare("INSERT INTO onaserdb (date,blesse,morts,collision,lien,Lieu,checck ) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("siissss",$date,$blesse,$morts,$collision,$lien,$lieu,$check);
$stmt->execute();

header("Location:list.php")
 
?>