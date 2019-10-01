<?php


include('../Configuration/db.php');

include('../Models/IncomeModel.php');

$income = new IncomeModel($db);
$id = $_POST['id'];
$value = $_POST['value'];

$update = $income->updateIncomeConfirm($id,$value);

if ($update) {
    echo "Income Updated Successfully!";
} else {
    echo "Something went wrong...";
}