<?php
include('../Configuration/db.php');

include('../Models/IncomeModel.php');

$income = new IncomeModel($db);
$id = $_POST['id'];
$delete = $income->deleteIncome($id);

if($delete){
    echo "Income Deleted Successfully!" + $_POST['id'];
}else{
    echo "Something went wrong...";
}