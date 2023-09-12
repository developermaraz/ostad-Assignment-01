<?php 
/*
    *   Task 6: Comparison Tool
*/
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparison Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
<div class="container" style="padding-top: 90px;">
    <div class="container" style="padding: 20px; border: 2px solid #0008ff; border-radius: 20px; box-shadow: 0px 0px 15px 2px #0008ff;">
    <h1 style="text-align: center;"><b>Comparison Tool</b></h1>
    <hr>
    <?php
            if(isset($_POST['submit'])){
                $num1  = $_POST['num1'];
                $num2  = $_POST['num2'];
                $_SESSION['num1'] = $num1;
                $_SESSION['num2'] = $num2;
                $value = ($num1 > $num2) ? $num1 : $num2;
                $result = 'success';
            }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="score1">Number 1:</label>
                <input type="number" name="num1" value="<?php if(isset($_SESSION['num1']) && !empty($_SESSION['num1'])){ echo $_SESSION['num1']; unset($_SESSION['num1']); } ?>"  class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="score1">Number 2:</label>
                <input type="number" name="num2" value="<?php if(isset($_SESSION['num2']) && !empty($_SESSION['num2'])){ echo $_SESSION['num2']; unset($_SESSION['num2']); } ?>"  class="form-control">
            </div>
            <button class="btn btn-sm w-100 btn-warning" name="submit" style="margin-top: 20px;">Submit</button>
        </form>
        <?php
        if(isset($result)){
            echo  '<div style="border: 1px solid lightgreen; margin-top: 15px; border-radius: 5px; box-shadow: 0px 0px 3px 1px lightgreen; padding: 10px;">';
            echo $value;
            echo '</div>';
        }
        ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>