<?php
include('../Configuration/db.php');
include('../Models/IncomeModel.php');

if(isset($_POST['addIncomeButton'])){
    if(empty($_POST['amount']) && empty($_POST['date']) && empty($_POST['category'])){
        echo "<div class='text-center alert alert-danger'>All fields are required!</div>";
    }else{
        $income = new IncomeModel($db);
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $record = $income->addIncome($amount,$date,$category,0);
        if($record){
            header("Location: http://localhost/MyRepository/index.php");
        }else{
            echo "<div class='text-center alert alert-success'>Something went wrong...</div>";
        }
    }
}