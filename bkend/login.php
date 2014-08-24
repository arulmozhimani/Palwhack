<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

$em = $_POST['email'];
$pass = $_POST['password'];
$db = new Mongo();

$collection = $db->palwhack;
$data = $collection->users;
$info =  $data->find({ $and:[{name:$em},{password:$pass}] });
echo "chekced";

?>
