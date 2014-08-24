<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

$nm = $_POST['name'];
$mobile = $_POST['mobile'];
$em = $_POST['email'];
$db = new Mongo();

$collection = $db->palwhack;
$data = $collection->users;
$info =  $data->insert(array("name" => $nm, "username" => $em, "mobile" => $mobile));
$getinfo =  $data->find();
foreach ($getinfo as $arr) {

echo '<td>'.$arr['name'].'</td>'.'<td>'.$arr['username'].'</td>'.'<td>'.$arr['mobile'].'</td>';
}

?>
