<?php

class OutgoingModel
{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function addOutgoing($amount,$date,$category,$confirm){
        $sql = "insert into outgoings(amount,date,category,confirm) values('$amount','$date','$category','$confirm')";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function getOutgoing(){
        $sql = "select * from outgoings";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function deleteOutgoing($id){
        $sql = "delete from outgoings where id = '$id'";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function updateOutgoingConfirm($id,$value){
        $sql = "update outgoings set confirm = '$value' where id = '$id' ";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function outgoingSummary(){
        $sql = "select amount from outgoings where confirm = 1";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

}