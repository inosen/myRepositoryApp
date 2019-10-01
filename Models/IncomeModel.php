<?php


class IncomeModel
{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function addIncome($amount,$date,$category,$confirm){
        $sql = "insert into incomes(amount,date,category,confirm) values('$amount','$date','$category','$confirm')";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function getIncome(){
        $sql = "select * from incomes";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function deleteIncome($id){
        $sql = "delete from incomes where id = '$id'";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function updateIncomeConfirm($id,$value){
        $sql = "update incomes set confirm = '$value' where id = '$id' ";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

    public function incomeSummary(){
        $sql = "select amount from incomes where confirm = 1";
        $result = mysqli_query($this->db,$sql);
        return $result;
    }

}