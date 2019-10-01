<?php


include('../Configuration/db.php');

include('../Models/OutgoingModel.php');

$outgoing = new OutgoingModel($db);
$id = $_POST['id'];
$value = $_POST['value'];

$update = $outgoing->updateOutgoingConfirm($id,$value);

if ($update) {
    echo "Income Updated Successfully!";
} else {
    echo "Something went wrong...";
}