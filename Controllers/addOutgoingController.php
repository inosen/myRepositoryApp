<?php
include('../Configuration/db.php');
include('../Models/OutgoingModel.php');

if(isset($_POST['addOutgoingButton'])){
    if(empty($_POST['amount']) && empty($_POST['date']) && empty($_POST['category'])){
        echo "<div class='text-center alert alert-danger'>All fields are required!</div>";
    }else{
        $outgoing = new OutgoingModel($db);
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $record = $outgoing->addOutgoing($amount,$date,$category,0);
        if($record){
            header("Location: http://localhost/MyRepository/index.php");
        }else{
            echo "<div class='text-center alert alert-success'>Something went wrong...</div>";
        }
    }
}