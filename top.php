<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <?php   
    session_start();
    require_once "./php/config.php";
    //Ne smes da budes tu ako nisi prijavljen
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>
    <style>
    :root {
     --light-black: #2e2c2caf;
     --bggradient: linear-gradient(to bottom, #0f1ccf, #fafafa);
     --bggradientReverse:linear-gradient(to bottom, #fafafa, #0f1ccf);
     --light-gray: rgba(255, 255, 255, 0.877);
    }
    .container-fluid{
    
    }
    .username{
        color:#32322;
    }


    </style> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
</head>
<body>
    <div class="container-fluid">
    <div class="row ">
        <div class="col col-md-10 col-sm-6 mt-3 pb-4">
        <h4 >Добродошли , <span class='username'><?php echo $_SESSION['username'];?></span></h1>
        </div>
    <div class="col col-md-2 col-sm-6 mt-3 pb-4">
    <form action="./php/odjava.php" method="post" >
        <button class='btn btn-danger'type='submit' >Одјави ме</button>
    </form>
        
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col col-md-12 col-sm-6 text-center">
            <form action="top.php?list=1" method="get">
            <button class='btn btn-success pt-10 type='submit' >Листа хитова</button>
            </form>
            <br>

        </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php 
                if(true){  
                    $sql='SELECT ime,autor,glasovi from songs ORDER BY glasovi DESC' ;
                    echo "<table class='table table-dark'>";
                    echo "<thead>
                    <div class='row'>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Име</th>
                      <th scope='col'>Број гласова</th>
                      <th scope='col'>Аутор</th>
                    </tr>
                    </thead>
                    </div>
                     <tbody>";
                    $rows=0;
                    if($stmt=$pdo->query($sql)){
                
                        $all=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach($all as $row){
                            echo "<div class='row'>";
                            echo "<div class='col col-md-12 col-sm-6'>";
                            echo "<tr><th scope='row'>",$rows+=1,"</th>";
                            echo "<td>",$row['ime'],"</td>";
                            echo "<td>",$row['glasovi'],"</td>";
                            echo "<td>",$row['autor'],"</td>";
                            echo "</tr>";
                            echo "</div>";
                            echo "</div>";
                          }
                        echo "</tbody></table>";
                    } else echo "<h1>Грешка на серверу";
                }
                   
   ?>
    </div>
    </div>

  
       



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>