<?php 
/*
    *   Task 3: Grade Calculator
*/
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
<div class="container" style="padding-top: 90px;">
    <div class="container" style="padding: 20px; border: 2px solid #0008ff; border-radius: 20px; box-shadow: 0px 0px 15px 2px #0008ff;">
    <h1 style="text-align: center;"><b>Grade Calculator</b></h1>
    <hr>
    <?php
            if(isset($_POST['submit'])){
                $testScore1  = $_POST['testScore1'];
                $testScore2  = $_POST['testScore2'];
                $testScore3  = $_POST['testScore3'];
                $_SESSION['testScore1'] = $testScore1;
                $_SESSION['testScore2'] = $testScore2;
                $_SESSION['testScore3'] = $testScore3;
                // Calculate the average
                $average = ($testScore1 + $testScore2 + $testScore3) / 3;
                if ($average >= 70) {
                    $letterGrade = 'A';
                } elseif ($average >= 60) {
                    $letterGrade = 'B';
                } elseif ($average >= 50) {
                    $letterGrade = 'C';
                } elseif ($average >= 40) {
                    $letterGrade = 'D';
                }elseif($average < 33){
                    $letterGrade = 'F';
                }
                $result = 'success';
            }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="score1">Test Score 1:</label>
                <input type="number" name="testScore1" value="<?php if(isset($_SESSION['testScore1']) && !empty($_SESSION['testScore1'])){ echo $_SESSION['testScore1']; unset($_SESSION['testScore1']); } ?>"  class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <label for="score1">Test Score 2:</label>
                <input type="number" name="testScore2" value="<?php if(isset($_SESSION['testScore2']) && !empty($_SESSION['testScore2'])){ echo $_SESSION['testScore2']; unset($_SESSION['testScore2']); } ?>"  class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <label for="score1">Test Score 3:</label>
                <input type="number" name="testScore3" value="<?php if(isset($_SESSION['testScore3']) && !empty($_SESSION['testScore3'])){ echo $_SESSION['testScore3']; unset($_SESSION['testScore3']); } ?>"  class="form-control">
            </div>
            <button class="btn btn-sm w-100 btn-warning" name="submit" style="margin-top: 20px;">Submit</button>
        </form>
        <?php
        if(isset($result)){
            echo  '<div style="border: 1px solid lightgreen; margin-top: 15px; border-radius: 5px; box-shadow: 0px 0px 3px 1px lightgreen; padding: 10px;">';
            echo "<b>Total Average Number:</b> $average";
            echo '<br>';
            echo "<b>Letter Grade:</b> $letterGrade";
            echo '</div>';
        }
        ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>