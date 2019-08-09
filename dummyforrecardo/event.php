<?php
$connect = mysqli_connect("localhost","franc906_bklicus","Pb)ET^#Mf[*]","franc906_bklic");


$data = array();
$id= $_POST['myData'];

$sql="SELECT * FROM test where id = '$id'";

$result=mysqli_query($connect,$sql);

$statement = mysqli_fetch_object($result);
echo json_encode($statement );

?>