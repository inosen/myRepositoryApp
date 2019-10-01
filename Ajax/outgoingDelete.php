<?php


include('../Configuration/db.php');

include('../Models/OutgoingModel.php');

$outgoing = new OutgoingModel($db);
$id = $_POST['id'];
$delete = $outgoing->deleteOutgoing($id);

if ($delete) {
    echo "Outgoing Deleted Successfully!" + $_POST['id'];
} else {
    echo "Something went wrong...";
}