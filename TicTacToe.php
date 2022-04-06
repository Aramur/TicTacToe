<!DOCTYPE html>
<html lang="de">

<head>
    <title>TicTacToe</title>

    <style>
        body{
            background-color: black;
            text-align: center;
            color: darkred;
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
    <?php
        session_start();

        if (isset($_POST['reset'])){
            sessionLöschen();
        }

        $gewonnen = 0;
        if(isset($_SESSION['gewonnen'])){
            $gewonnen = $_SESSION['gewonnen'];
        }
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

        if(isset($_SESSION['feldbesetzung'])){
            $feldbesetzung = $_SESSION['feldbesetzung'];
        }

        if($gewonnen == 0);{
            $WerIstDran = 0;
            if(isset($_SESSION['werIstDran'])){
                $WerIstDran = $_SESSION['werIstDran'];
            }

            if(!empty($_POST)){
                if (isset($_POST['button'])){
                    $number =  $_POST['button'];

                    welchessymbol($number, $feldbesetzung, $WerIstDran);
                    $_SESSION['werIstDran'] = $WerIstDran;
                    $_SESSION['feldbesetzung'] = $feldbesetzung;

                    werHatGewonnen('Glarotechsymbol', $gewonnen, $feldbesetzung);
                    werHatGewonnen('Peppershopsymbol', $gewonnen, $feldbesetzung);
                }
            }

            $_SESSION['gewonnen'] = $gewonnen;
        }

        if($gewonnen == 1){
            echo 'Glarotech hat gewonnen!';
        }
        elseif($gewonnen == 2){
            echo 'Peppershopsymbol hat gewonnen!';
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

        function sessionLöschen(){
            $_SESSION['werIstDran'] = NULL;
            $_SESSION['feldbesetzung'] = NULL;
            $_SESSION['gewonnen'] = NULL;
        }

        function symboleanzeigen($feld, $feldbesetzung){
            if($feldbesetzung[$feld] == 'leer'){
                echo $feld;
            }
            elseif($feldbesetzung[$feld] == 'Peppershopsymbol'){
            echo '<img src="images/peppershop_logo_hires.png">';
            }
            elseif($feldbesetzung[$feld] == 'Glarotechsymbol'){
                echo '<img src="images/glarotech_weiss_blau.png">';
            }
        }

        function werHatGewonnen($name, &$gewonnen, $feldbesetzung){
            welcheLösung($name, 1, 2, 3, $gewonnen, $feldbesetzung);
            welcheLösung($name, 4, 5, 6, $gewonnen, $feldbesetzung);
            welcheLösung($name, 7, 8, 9, $gewonnen, $feldbesetzung);
            welcheLösung($name, 1, 4, 7, $gewonnen, $feldbesetzung);
            welcheLösung($name, 2, 5, 8, $gewonnen, $feldbesetzung);
            welcheLösung($name, 3, 6, 9, $gewonnen, $feldbesetzung);
            welcheLösung($name, 1, 5, 9, $gewonnen, $feldbesetzung);
            welcheLösung($name, 3, 5, 7, $gewonnen, $feldbesetzung);
        }

        function welcheLösung($name, $number1, $number2, $number3, &$gewonnen, $feldbesetzung){
            if($name == 'Glarotechsymbol' && $feldbesetzung[$number1] == 'Glarotechsymbol' && $feldbesetzung[$number2] == 'Glarotechsymbol' && $feldbesetzung[$number3] == 'Glarotechsymbol'){
                $gewonnen = 1;
            }
            elseif($name == 'Peppershopsymbol' && $feldbesetzung[$number1] == 'Peppershopsymbol' && $feldbesetzung[$number2] == 'Peppershopsymbol' && $feldbesetzung[$number3] == 'Peppershopsymbol'){
                $gewonnen = 2;
            }
        }
    ?>


    <h1><span style="color:darkred">Glarotech Tic-Tac-Toe</span></h1>
    <table>
        <tr>
            <td><?php symboleanzeigen(1, $feldbesetzung)?></td>
            <td><?php symboleanzeigen(2, $feldbesetzung)?></td>
            <td><?php symboleanzeigen(3, $feldbesetzung)?></td>
        </tr>
        <tr>
            <td><?php symboleanzeigen(4, $feldbesetzung)?></td>
            <td><?php symboleanzeigen(5, $feldbesetzung)?></td>
            <td><?php symboleanzeigen(6, $feldbesetzung)?></td>
        </tr>
        <tr>
            <td><?php symboleanzeigen(7, $feldbesetzung)?></td>
            <td><?php symboleanzeigen(8, $feldbesetzung)?></td>
            <td><?php symboleanzeigen(9, $feldbesetzung)?></td>
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
        <button type="sumbit" name= "reset">Neustart</button>
    </form>
</body>
