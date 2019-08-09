<?php
$connect = new PDO('mysql:host=localhost;dbname=franc906_bklic', 'franc906_bklicus', 'Pb)ET^#Mf[*]');

$data = array();

$query = "SELECT * FROM test ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["dr_name"],
  'start'   => date('Y-m-d',strtotime($row['start_date'])),
  'end'   => date('Y-m-d',strtotime($row['end_date']))
 );
}

echo json_encode($data);

?>