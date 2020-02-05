<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>додавање налога</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css"> <?php
    // config fajl
    require_once "./php/config.php";
    
    $sql = "SELECT id FROM users WHERE username = :username";
    
    $username_err ="";

    if(isset($_POST['username'])){
             
            if($stmt = $pdo->prepare($sql)){
                
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                
                $param_username = trim($_POST["username"]);
                
                if($stmt->execute()){
                    if($stmt->rowCount() == 1){
                        $username_err = "Е-mail који сте унели већ се користи.";
                    } else{
                        $username = trim($_POST["username"]);
                        unset($stmt);

                        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)"; 
                
                        $password = trim($_POST["password"]);
                
                        if($stmt = $pdo->prepare($sql)){
                            
                            
                            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                            
                            
                            $param_username = $username;
                            $param_password = password_hash($password, PASSWORD_DEFAULT); 
                
                            if($stmt->execute()){
                
                                header("location: login.php");
                            } else{
                                echo "Greska na strani servera";
                            }
                        }
                        unset($pdo);
                    }
            } else{
                    echo "Greska u sistemu.";
                }
            }
        
        
       
    }


    ?>
</head>

<body>
    <div class="container-fluid bg">
        <div class="row justify-content-center">

            <div class="col-12 col-sm-8 col-md-4">
                <form class="form-container" method="POST" action="./add.php" >
                    <div class="form-group">
                      <label for="exampleInputEmail1">Адреса е-поште</label>
                      <input name="username" type="email" class="form-control" id="exampleInputEmail1" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Шифра</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                      <small id="emailHelp" class="form-text text-muted"><span class="help-block"><?php echo $username_err; ?></span></small>
                    </div>
                    <div class="form-group form-check">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Потврди</button><br>
                    <div class="container-fluid">
                    <a href="./index.html" class="btn btn-primary btn-lg active link1 btn-block" role="button" aria-pressed="true">Почетна</a>
                    <a href="./login.php" class="btn btn-primary btn-lg active link2 btn-block " role="button" aria-pressed="true">Пријави се</a>
                    </div>  
                </form>

            </div>
        </div>
    
    </div>






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>