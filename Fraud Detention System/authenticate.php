<?php
    $server="localhost";
    $password="";
    $username="root";
    $db="hackathon";

    try{
        $conn=new PDO("mysql:host=$server;dbname=$db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $adno=$_POST['Adno'];
        $sql=$conn->prepare("select * from aadhar;");
        $sql->execute();
        while(($row=$sql->fetch(PDO::FETCH_ASSOC))!=false){
            if($row['Aadhar_ID']==$adno && $row['Is_Admin']==1){
                echo "<script type='text/javascript'>
                    window.location='admin.php';
                </script>";
            }
            echo $row['Aadhar_ID'];
            echo "<br>";
            echo $row['Is_Admin'];
            echo "<br>";
        }
        echo "<script type='text/javascript'>
                alert('Admin Not Registered')
              </script>";
        echo "<script type='text/javascript'>
                    window.location='index.html';
                </script>";
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>