<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schemes | Admin</title>

    <style>
        body{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin:30px 0;
            padding:0 30px;
            box-sizing: border-box;
        }
        #logo{
            width:50px;
            height:50px;
        }
        main{
            display:flex;
            justify-content:space-around;
            flex-wrap:wrap;
            align-items:center;
        }
        .module{
            width:350px;
            height:fit-content;
            padding:20px;
            box-sizing:border-box;
            background:orange;
            text-align:center;
        }
        input{
            margin:10px 0;
            height:20px;
        }
        #aadhar{
            padding:10px;
        }
    </style>
</head>
<body>
    <header>
        
        <img id="logo" src="logo.jfif" alt="Logo">
        <button id="lg" class="btn">LogIn</button>
    </header>
    <main>
        
        <div class="module">
            <h1>Get Eligible Schemes</h1>
            <form action="eligible.php" method="post" >
                <input type="text" name="Adno" placeholder="User Aadhar Code" id="aadhar">
                <br>
                <input type="submit" value="submit">
            </form>
        </div>
        <!-- <div class="module">
            <h1>Generate New Ration Card</h1>
        </div> -->
    </main>
</body>
</html>