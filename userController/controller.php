<?php
//Connection
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$confirm=$_REQUEST['confirm'];
$room=$_REQUEST['room'];
$ext=$_REQUEST['ext'];
$img_name=$_FILES['img']['name'];
$img_tempname=$_FILES['img']['tmp_name'];
$img_folder='../public/uploaded_image/'.$img_name;


$errors=[];
if(isset($_REQUEST['add'])){

    function validation($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);

        return $data;
    }

    if( !empty($name) && !empty($email) && !empty($pass) && !empty($confirm) && !empty($room) && !empty($ext) && !empty($_FILES['img'])){
        
        //Name validation
        $name=validation($name);
        $name=ucfirst($name);
        if(strlen($name)<3){
            $errors["name"]="Not valid Name";
        }

        //Email validation
        $email=validation($email);
        $email=filter_var($email,FILTER_VALIDATE_EMAIL);
        if(!$email){
            $errors["email"]="Not valid Email";
        }
        
        //Pass validation
        $pass=$pass;
        if(strlen($pass)<8){
            $errors["pass"]="Not valid Password";
        }
        $confirm=$confirm;
        if($confirm != $pass){
            $errors["confirm"]="Password Not Identical";
        }
        
        //Errors Array Check
        if(count($errors)>0){
            header("location:../views/adduser.php?errors=".json_encode($errors));

        }else{

            try{

                //add new user
                $conn=new PDO("mysql:host=localhost;dbname=cafeteria","root","");
                $data= $conn->prepare("insert into users(name,email,password,room_id,ext,image)
                values (?,?,?,?,?,?)
                ");
                $data->execute([
                    $name,
                    $email,
                    $pass,
                    $room,
                    $ext,
                    $img_name  
                ]);

                if($data){
                    move_uploaded_file($img_tempname , $img_folder);

                }
                header("location:../views/index.php");
            
            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }
        

    }



}

elseif(isset($_REQUEST['update'])){
    $id=$_REQUEST['id'];
            try{    
                //update user info
                $conn=new PDO("mysql:host=localhost;dbname=cafeteria","root","");
                $data= $conn->query("UPDATE users SET name='$name', email='$email', password='$pass' , room_id='$room' , ext='$ext' , image = '$img_name' WHERE id='$id'");
                move_uploaded_file($img_tempname,$img_folder);
                header("location:../views/user.php?show");

            }catch(PDOException $e){
                echo $e->getMessage();
            }

}
        

elseif(isset($_REQUEST['delete'])){
    $id=$_REQUEST['id'];
            try{

                //delete user 
                $conn=new PDO("mysql:host=localhost;dbname=cafeteria","root","");
                $data= $conn->query("delete from users WHERE id='$id'");
                header("location:../views/user.php?show");
                
            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }
        

else{
    $errors["required"]="Please Enter All Data ";
    header("location:../views/adduser.php?errors=".json_encode($errors));
}





?>