<?php

$incomes = new IncomeModel($db);
$incomeSum = 0;
foreach($incomes->incomeSummary() as $incomes){
    $incomeSum = $incomeSum + $incomes['amount'];
}
//echo $incomeSum;

$outgoings = new OutgoingModel($db);
$outgoingSum = 0;
foreach($outgoings->outgoingSummary() as $outgoings){
    $outgoingSum = $outgoingSum + $outgoings['amount'];
}
//echo $outgoingSum;

$finalSum = $incomeSum - $outgoingSum;