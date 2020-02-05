<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ</title>
    <?php   
    session_start();
    require_once "../config.php";
    //Ne smes da budes tu ako nisi prijavljen
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    function dodaj($arg1,$arg2) {
        require_once "../config.php";
        $sql="INSERT INTO songs(ime,autor) VALUES ('$arg1','$arg2')";
        if($stmt=$pdo->query($sql)){
            return true;
        }else echo "Greska na serveru";
    } 
    function obrisi($id){
        require_once "../config.php";
        $sql="DELETE FROM songs WHERE id='$id'";
        if($stmt=$pdo->query($sql)) return true;
        else echo "Greska na serveru";
        
    }
?>
</head>
<style>
    :root {
     --light-black: #2e2c2caf;
     --bggradient: linear-gradient(to bottom, #0f1ccf, #fafafa);
     --bggradientReverse:linear-gradient(to bottom, #fafafa, #0f1ccf);
     --light-gray: rgba(255, 255, 255, 0.877);
    }
    .body{
        background: #2e2c2caf;
        background: var(--bggradient);
    }
    </style> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
</head>
<body>
    <div class="container-fluid">
    <div class="row ">
        <div class="col col-md-10 col-sm-6 mt-3 pb-4">
        <h4 >Добродошли , Aдмине </h1>
        </div>
    <div class="col col-md-2 col-sm-6 mt-3 pb-4">
    <form action="../odjava.php" method="post" >
        <button class='btn btn-danger'type='submit' >Одјави ме</button>
    </form>
    <br>
</div>

    <?php 
                if(true){  
                    $sql='SELECT ime,autor,glasovi,id from songs ORDER BY glasovi DESC' ;
                    echo "<table class='table  text-center'>";
                    echo "<thead>
                    <div class='row'>
                    <tr>
                      <th scope='col'>#</th>
                      <th scope='col'>Име</th>
                      <th scope='col'>Број гласова</th>
                      <th scope='col'>Аутор</th>
                      <th scope='col'>Админ</th>
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
                            echo "<td colspan=2>","<button id='",$row['id'],"' type='button' onclick='valid(this.id)' class='btn btn-outline-danger'>Обриши</button>","<button style='margin-left:5px' type='button' class='btn btn-outline-warning' onclick=replace()>Измени</button>","</td>";
                            echo "</tr>";
                            echo "</div>";
                            echo "</div>";
                          }
                        echo "<tr><th scope='row'>",$rows+=1,"</th>";
                        echo "<td><input id='name' class='form-control' type='text' placeholder='Име' required></td>";
                        echo "<td><input id='broj_glasova' class='form-control' type='number' placeholder='Број гласова' value='1'></td>";
                        echo "<td><input id='autor' class='form-control' type='text' placeholder='Аутор' required></td>";
                        echo "<td><button id='add' type='button' class='btn btn-primary' onclick=valid1()>Додај</button></td>";
                        echo "</tr>";
                        echo "</tbody></table>";
                    } else echo "<h1>Грешка на серверу";
                }
                   
   ?>
   <script src="../../backup/jquery-3.4.1.js"></script>
   <script type="text/javascript">
    function valid(id){
        let odgovor=confirm("Брисање песме,да ли сте сигурни?");
        if(odgovor){
            $.ajax({
                type:"POST",
                url:"./api.php",
                dataType:"json",
                data:{functionName:"obrisi",arguments:id},

                success:function(obj,textstatus){
                    if( !('error' in obj) )
                        {
                            location.reload();
                            alert("Успешно обрисано!");
                        }
                    else console.log(obj.error);
                
                }

            });
        }
    }
    function valid1(){
        let ime=document.getElementById("name").value;
        let br_glasova=document.getElementById("broj_glasova").value;
        let autor=document.getElementById("autor").value;
        let odgovor;
        if(ime && autor) 
            odgovor=confirm("Да ли желите да додате ".concat(ime," песму",'?'));
        else               
            return;
        if(odgovor){
            $.ajax({
                type:"POST",
                url:"./api.php",
                dataType:"json",
                data:{functionName:"dodaj",arguments:[ime,autor,br_glasova]},

                success:function(obj,textstatus){
                    if( !('error' in obj) )
                        {
                            location.reload();
                            alert("Успешно додато!");
                        }
                    else console.log(obj.error);
                
                }

            });
        }else alert("Нешто није у реду!Покушај са новим параметрима!");

    }

   </script>
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
</body>
</html>