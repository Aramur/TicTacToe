<!DOCTYPE html>
<html lang="de">

<head>
    <title>TicTacToe</title>

    <style>
        body{
            background-color: white;
            text-align: center;
        }
        table{
            margin: auto;
            border-collapse: collapse;
            color: darkred;
        }
        td{
            border: 1px solid darkred;
            width: 100px;
            height: 100px;
            text-align: center;
        }
        img{
         height: 75px;
         width: 75px;
        }
    </style>
</head>

<body>
    <h1><span style="color:darkred">Glarotech Tic-Tac-Toe</span></h1>
    <table>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>4</td>
            <td>5</td>
            <td>6</td>
        </tr>
        <tr>
            <td>7</td>
            <td>8</td>
            <td>9</td>
        </tr>
    </table>

    <br>
    <form  action="#" method="post">
        <button type="sumbit" name= "button" value= "1">1</button>
        <button type="sumbit" name= "button" value= "2">2</button>
        <button type="sumbit" name= "button" value= "3">3</button>
        <button type="sumbit" name= "button" value= "4">4</button>
        <button type="sumbit" name= "button" value= "5">5</button>
        <button type="sumbit" name= "button" value= "6">6</button>
        <button type="sumbit" name= "button" value= "7">7</button>
        <button type="sumbit" name= "button" value= "8">8</button>
        <button type="sumbit" name= "button" value= "9">9</button>
    </form>

    <?php
        $WerIstDran = 0;
        $number;
        $feldbesetzung = [
            1 => 'leer',
            2 => 'leer',
            3 => 'leer',
            4 => 'leer',
            5 => 'leer',
            6 => 'leer',
            7 => 'leer',
            8 => 'leer',
            9 => 'leer'
        ];

        $lösungen = [
            123,
            456,
            789,
            147,
            258,
            369,
            159,
            357,
        ];

        if(!empty($_POST)){
            if (isset($_POST['button'])){
                $number =  $_POST['button'];
            }
            welchessymbol($number, $feldbesetzung, $WerIstDran);

            var_dump($feldbesetzung);
        }





        function welchessymbol($number, &$feldbesetzung, &$WerIstDran){
            if($feldbesetzung[$number] == 'leer'){
                if($WerIstDran == 0){
                    $feldbesetzung[$number] = 'Peppershopsymbol';
                    $WerIstDran = 1;
                }
                else{
                    $feldbesetzung[$number] = 'Glarotechsymbol';
                    $WerIstDran = 0;
                }
            }
        }
    ?>

</body>
