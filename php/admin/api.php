<?php
     header('Content-Type: application/json');
     require_once "../config.php";
     $result=array();

     $id=$_POST['arguments'];

     if($_POST['functionName']=='obrisi'){
        $sql="DELETE FROM songs WHERE id='$id'";
        if($stmt=$pdo->query($sql))  $result['result']=true; 
        else $result['error']="Error";
        }
    if($_POST['functionName']=='dodaj'){
            $sql="INSERT INTO `songs` (`id`, `ime`, `autor`, `glasovi`) VALUES (NULL, '$id[0]', '$id[1]', '$id[2]');";
            if($stmt=$pdo->query($sql))  $result['result']=true; 
            else $result['error']="Error";
            }
        echo json_encode($result);
?>