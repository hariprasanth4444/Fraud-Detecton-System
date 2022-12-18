<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eligible Schemes</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        a{
            text-decoration:none;
            font-size:20px;
        }
        td{
            text-align:center;
            padding:0 5px;
        }
    </style>
</head>
<body>
    <header>
        <img id="logo" src="logo.jfif" alt="Logo">
        <button id="lg" class="btn">LogIn</button>
    </header>
    <main>
        <h2>Candidate Details</h2>
        <table border=1>
            <tr>
                <th>Image</th>
                <th>Aadhar Number</th>
                <th>Name</th>
                <th>Income</th>
                <th>Properties</th>
            </tr>
        

<?php 
    $Adno=$_POST['Adno'];
    $server="localhost";
    $password="";
    $username="root";
    $db="hackathon";

    try{
        $conn=new PDO("mysql:host=$server;dbname=$db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $adno=$_POST['Adno'];
        $sql=$conn->prepare("select * from aadhar where Aadhar_ID=$adno;");
        $sql->execute();
        while(($row=$sql->fetch(PDO::FETCH_ASSOC))!=false){
            if($row['Family']==1)
                $fh=$row['Aadhar_ID'];
            else{
                $fh=$row['Family'];
            }
        }
        $sql=$conn->prepare("select Aadhar_ID from aadhar where Aadhar_ID=$fh or Family=$fh");
        $sql->execute();
            $p=0;
            $i=0;
            $k='0';
        while(($row=$sql->fetch(PDO::FETCH_ASSOC))!=false){
            echo "<tr><td><img src='avatar.png'></td>";
            $id=$row['Aadhar_ID'];
            echo "<td>$id</td>";
            // echo $id;
            $s=$conn->prepare("select Name from aadhar where Aadhar_ID=$id;");
            $s->execute();
            if(($ro=$s->fetch(PDO::FETCH_ASSOC))!=false){
                echo "<td>$ro[Name]</td>";
            }
            $sq=$conn->prepare("select income from income where Aadhar_ID=$id;");
            $sq->execute();
            if(($ro=$sq->fetch(PDO::FETCH_ASSOC))!=false){
                $i+=$ro['income'];
                echo "<td>$ro[income]</td>";
            }
            else{
                echo "<td>0</td>";
            }
            $id=$row['Aadhar_ID'];
            $sq=$conn->prepare("select properties from properties where Aadhar_ID=$id;");
            $sq->execute();
            if(($ro=$sq->fetch(PDO::FETCH_ASSOC))!=false){
                echo "<td>$ro[properties]</td></tr>";
                $p+=$ro['properties'];
            }
            else{
                echo "<td>0</td>";
            }
            $sq=$conn->prepare("select * from ration where Aadhar_ID=$id;");
            $sq->execute();
            if(($ro=$sq->fetch(PDO::FETCH_ASSOC))!=false){
                $k=$id;
            }
        }

        

        echo "</table><br>";
        echo "<p>Properties : $p</p>";
        echo "<p>Income : $i</p>";
        echo "<h1>Eligible Schemes</h1>";

        $r='';
        if ($k!='0'){
            $sq=$conn->prepare("select Type from ration where Aadhar_ID=$k;");
            $sq->execute();
            if(($ro=$sq->fetch(PDO::FETCH_ASSOC))!=false){
                if($ro['Type']=="White"){
                    echo "<a href='#'>Jaganana Vidya Deevena</a>";
                    $r=$ro['Type'];
                }
            }
        }

        if ($i<10000){
            echo "<a href='#'>Ration Card</a>";
        }
        if($i<=144000 && $r=="White")
            echo "<a href='#'>Housing Scheme</a>";

        echo "<br><br><br>";

    }
    catch(Exception $e){
        echo $e->getMessae();
    }
?>

        
        </main>
    </body>
</html>