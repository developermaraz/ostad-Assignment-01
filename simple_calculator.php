<?php 
/**
    *   Task 7: Simple Calculator
*/
session_start();
if(isset($_POST['submit'])){
    $output = $_POST['output'];
    if($output === '0'){
        header("Location: simple_calculator.php");
        exit;
    }
    $Operation = null;
    $FindOperator = strpos($output, '+');
if(strpos($output, '+')){
    $Operation = '+';
}
if(strpos($output, '/')){
    $Operation = '/';
}
if(strpos($output, '-')){
    $Operation = '-';
}
if(strpos($output, '*')){
    $Operation = '*';
}

$parts = explode($Operation, $output);
$beforePlus = $parts[0];
$afterPlus = $parts[1];

if($Operation === '+'){
    $result = $beforePlus+$afterPlus;
}
if($Operation === '/'){
    $result = $beforePlus/$afterPlus;
}
if($Operation === '-'){
    $result = $beforePlus-$afterPlus;
}
if($Operation === '*'){
    $result = $beforePlus*$afterPlus;
}
$_SESSION['ress'] = $result;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css" type="text/stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="justify-content-center">
            <form action="" method="POST">
            <div class="card" style="width: 250px; margin-top: 30px; box-shadow: 0px 0px 10px 5px black;">
                <div class="card-header bg-warning">
                    <h3 style="text-align: center;"><b>Calculator</b></h3>
                    <input type="text" class="form-control" id="output" name="output" value="<?php if(isset($_SESSION['ress'])){ echo $_SESSION['ress']; unset($_SESSION['ress']); }else{ echo '0'; } ?>" placeholder="Out Put">
                </div>
                <div class="card-body">
                        <div>
                            <input type="button" class="btn btn-lg btn-dark" onclick="clearDisplay()" name="C" value="C">
                            <input type="button" class="btn btn-lg btn-warning" onclick="backspace()" name="DEL" value="⌦">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('/')" name="BAG" value="/">
                        </div>
                        <div style="margin-top: 20px;">
                            <input type="button" class="btn btn-lg btn-dark" onclick="appendToOutput('7')" onclick="input" name="7" value="7">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('8')" name="8" value="8">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('9')" name="9" value="9">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('*')" name="multiply" value="x">
                        </div>
                        <div style="margin-top: 20px;">
                            <input type="button" class="btn btn-lg btn-dark" onclick="appendToOutput('4')" name="4" value="4">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('5')" name="5" value="5">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('6')" name="6" value="6">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('-')" name="minus" value="-">
                        </div>
                        <div style="margin-top: 20px;">
                            <input type="button" class="btn btn-lg btn-dark" onclick="appendToOutput('1')" name="1" value="1">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('2')" name="2" value="2">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('3')" name="3" value="3">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('+')"  name="plus" value="+">
                        </div>
                        <div style="margin-top: 20px;">
                            <input type="button" class="btn btn-lg btn-dark" onclick="appendToOutput('00')" name="00" value="00">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('0')" name="0" value="0">
                            <input type="button" class="btn btn-lg btn-warning" onclick="appendToOutput('.')" name="." value=".">
                            <button type="submit" class="btn btn-lg btn-warning" name="submit" >=
                        </div>
                    </div>
                    <div>
                        <h4 style="font-size: 16px; text-align: center" >Develop By <b><a style="color: black; text-decoration: none;" target="_blank" href="https://developermaraz.com">Developer Maraz</a></b></h4>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        let currentInput = '0';

        function appendToOutput(value) {
            if (currentInput === '0') {
                currentInput = value;
            } else {
                currentInput += value;
            }
            document.getElementById('output').value = currentInput;
        }

        function calculateResult() {
            const result = eval(currentInput);
            document.getElementById('output').value = result;
            currentInput = result.toString();
        }
        function backspace() {
            if (currentInput.length > 0) {
                currentInput = currentInput.slice(0, -1);
                document.getElementById('output').value = currentInput;
            }
        }
        function clearDisplay() {
    currentInput = '0'; // Reset the current input to '0'
    document.getElementById('output').value = currentInput; // Update the display
}
    </script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>