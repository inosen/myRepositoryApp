<?php
include('Configuration/db.php');

include('Models/IncomeModel.php');
$income = new IncomeModel($db);

include('Models/OutgoingModel.php');
$outgoing = new OutgoingModel($db);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
        } );
    </script>
    <title>MyRepository</title>

</head>
<body>

<div class="container">
    <div class="row">
        <?php include('Controllers/repositoryController.php'); ?>
        <div class="col-md-12 border p-5 text-center">My Repository <br> <p class="pt-4" style="font-size: 46px;"><b><?php echo $finalSum; ?></b></p></div>
    </div>
    <div class="row">
        <div class="col-md-6 border">
            <p class="text-center">Incomes</p>
            <form action="Controllers/addIncomeController.php" method="post">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control mb-3">
                <label for="date">Date</label>
                <input type="text" name="date" class="form-control mb-3 datepicker">
                <label for="item">Category</label>
                <input type="text" name="category" class="form-control mb-3">
                <button type="submit" name="addIncomeButton" class="btn btn-primary mb-5">Add</button>
            </form>
            <table class="table border max-height: 100%;">
                <thead>
                <tr>
                    <th scope="col">Confirm</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($income->getIncome() as $income){ ?>
                <tr>
                    <td class="text-center"><input type="checkbox" <?php if($income['confirm'] == 1){echo "checked";} ?> onclick="confirmIncome(<?php echo $income['id']; ?>, this.checked)" class="form-check-input" style="width: 30px;height: 30px;"></td>
                    <td class="pt-3"><?php echo $income['amount']; ?> €</td>
                    <td class="pt-3"><?php echo $income['date']; ?></td>
                    <td class="pt-3"><?php echo $income['category']; ?></td>
                    <td><button type="button" name="removeButton" onclick="deleteIncomeRequest(<?php echo $income['id']; ?>)" class="btn btn-danger mb-5" >Remove</button></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 border">
            <p class="text-center">Outgoings</p>
            <form action="Controllers/addOutgoingController.php" method="post">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control mb-3">
                <label for="date">Date</label>
                <input type="text" name="date" class="form-control mb-3 datepicker">
                <label for="item">Category</label>
                <input type="text" name="category" class="form-control mb-3">
                <button type="submit" name="addOutgoingButton" class="btn btn-primary mb-5">Add</button>
            </form>
            <table class="table border">
                <thead>
                <tr>
                    <th scope="col">Confirm</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($outgoing->getOutgoing() as $outgoing){ ?>
                    <tr>
                        <td class="text-center"><input type="checkbox" <?php if($outgoing['confirm'] == 1){echo "checked";} ?> onclick="confirmOutgoing(<?php echo $outgoing['id']; ?>, this.checked)" class="form-check-input" style="width: 30px;height: 30px;"></td>
                        <td class="pt-3"><?php echo $outgoing['amount']; ?> €</td>
                        <td class="pt-3"><?php echo $outgoing['date']; ?></td>
                        <td class="pt-3"><?php echo $outgoing['category']; ?></td>
                        <td><button type="button" name="removeButton" onclick="deleteOutgoingRequest(<?php echo $outgoing['id']; ?>)" class="btn btn-danger mb-5">Remove</button></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<!--    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="Ajax/incomeRemoveButton.js"></script>
    <script src="Ajax/outgoingRemoveButton.js"></script>
    <script src="Ajax/incomeConfirm.js"></script>
    <script src="Ajax/outgoingConfirm.js"></script>

</body>
</html>
