<?php
session_start();
include_once "config.php";
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
if ( !$connection ) {
    echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
} else {
    $action = $_REQUEST['action'] ?? '';

    if ( 'addSupervisor' == $action ) {
        $supervisor_id=$_REQUEST['supervisor_id'];
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $address = $_REQUEST['address'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $subcity = $_REQUEST['subcity'] ?? '';
        $password = $_REQUEST['password'] ?? '';

        if ($supervisor_id && $fname && $lname && $lname && $phone && $password && $address ) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO supervisors(supervisor_id,fname,lname,email,phone,address,subcity,password,role) VALUES ('$supervisor_id','{$fname}','$lname','$email','$phone','$address','$subcity','$hashPassword','supervisor')";
            mysqli_query( $connection, $query );
            
            echo "<script type=\"text/javascript\">
            alert(\"Registered Succesfully\"); 
            window.location = \"cms.php\";
  </script>";
        }

    } elseif ( 'editSupervisor' == $action ) {
        if(isset($_REQUEST['resset']))
        {
        $id = $_REQUEST['supervisor_id'] ?? '';
        $hashPassword = password_hash( 'a12345678', PASSWORD_BCRYPT );
        $query = "UPDATE supervisors SET password='$hashPassword' WHERE supervisor_id='{$id}'";
        //echo $query;
            mysqli_query( $connection, $query );
            echo "<script type=\"text/javascript\">
            alert(\"Password resseted Succesfully\"); 
            window.location = \"cms.php\";
  </script>";

        }
        else{
        $id = $_REQUEST['supervisor_id'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        
        if ( $fname && $lname && $email && $phone ) {
            $query = "UPDATE supervisors SET fname='{$fname}', lname='{$lname}', email='$email', phone='$phone' WHERE supervisor_id='{$id}'";
            mysqli_query( $connection, $query );
            echo "<script type=\"text/javascript\">
            alert(\"updated Succesfully\"); 
            window.location = \"cms.php\";
  </script>";
        }}
    } elseif ( 'addEnumerator' == $action ) {
        $sessionId=$_SESSION["id"];
        $enumerator_id=$_REQUEST['enumerator_id'];
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $address = $_REQUEST['address'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $password = $_REQUEST['password'] ?? '';


        if ($enumerator_id && $fname && $lname && $lname && $phone && $password && $address ) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO enumerators(enumerator_id,fname,lname,email,phone,address,password,role,supervisor_id) VALUES ('$enumerator_id','{$fname}','$lname','$email','$phone','$address','$hashPassword','enumerator','$sessionId')";
            mysqli_query( $connection, $query );
            //echo $query;
            
            echo "<script type=\"text/javascript\">
            alert(\"Registered Succesfully\"); 
            window.location = \"cms.php\";
  </script>";
        
        }
    } elseif ( 'editEnumerator' == $action ) {
        if(isset($_REQUEST['resset']))
        {
        $id = $_REQUEST['enumerator_id'] ?? '';
        $hashPassword = password_hash( 'a12345678', PASSWORD_BCRYPT );
        $query = "UPDATE enumerators SET password='$hashPassword' WHERE enumerator_id='{$id}'";
        //echo $query;
            mysqli_query( $connection, $query );
            echo "<script type=\"text/javascript\">
            alert(\"Password resseted Succesfully\"); 
            window.location = \"cms.php?id=manage_enumerator\";
  </script>";

        }
        else{
        $id = $_REQUEST['enumerator_id'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        echo "hello";
        if ( $fname && $lname ) {
            $query = "UPDATE enumerators SET fname='{$fname}', lname='{$lname}', email='$email', phone='$phone' WHERE enumerator_id='{$id}'";
            mysqli_query( $connection, $query );
            echo "<script type=\"text/javascript\">
            alert(\"Updated Succesfully\"); 
            window.location = \"cms.php?id=manage_enumerator\";
  </script>";
        }
       } // update person
    }elseif ( 'editPerson' == $action ) {
        $id = $_REQUEST['person_id'] ?? '';
       
        $name = $_REQUEST['name'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $gname = $_REQUEST['gname'] ?? '';
        $gender = $_REQUEST['gender'] ?? '';
        $house_no = $_REQUEST['house_no'] ?? '';
        $married = $_REQUEST['married'] ?? '';
        $disability = $_REQUEST['disability'] ?? '';
        $birthplace = $_REQUEST['birth_place'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $education = $_REQUEST['education'] ?? '';
        $job = $_REQUEST['job'] ?? '';
        $religion = $_REQUEST['religion'] ?? '';
       
        
        if ( $name ) {
            $query = "UPDATE person SET name='$name',fname='$fname',gfname='$gname',sex='$gender',age='$age',married='$married',disability='$disability',birth_place='$birthplace',
            house_id='$house_no',religion='$religion',email='$email',phone='$phone',education='$education',job='$job' WHERE person_id=$id";
            mysqli_query( $connection, $query );
            echo "<script type=\"text/javascript\">
            alert(\"Updated Succesfully\"); 
            window.location = \"cms.php\";
  </script>";
        }                                                             
    } elseif ( 'editGuest' == $action ) {
        $id = $_REQUEST['guest_id'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        
        if ( $fname && $lname && $email && $phone ) {
            $query = "UPDATE guests SET fname='{$fname}', lname='{$lname}', email='$email', phone='$phone' WHERE guest_id='{$id}'";
            
            mysqli_query( $connection, $query );
            
            echo "<script type=\"text/javascript\">
            alert(\"Updated Succesfully\"); 
            window.location = \"cms.php\";
  </script>";
        }
        // add Person
        }elseif ( 'addPerson' == $action ) {

        $name = $_REQUEST['name'] ?? '';
        $id = $_REQUEST['id'] ?? '';
        $fname = $_REQUEST['fname'] ?? '';
        $gname = $_REQUEST['gname'] ?? '';
        $gender = $_REQUEST['gender'] ?? '';
        $house_no = $_REQUEST['house_no'] ?? '';
        $married = $_REQUEST['married'] ?? '';
        $disability = $_REQUEST['disability'] ?? '';
        
        $birthplace = $_REQUEST['birth_place'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $education = $_REQUEST['education'] ?? '';
        $job = $_REQUEST['job'] ?? '';
        $religion = $_REQUEST['religion'] ?? '';
       
        $age=$_REQUEST['age'];
        
        $enum_id=$_SESSION['id'];
        include 'upload.php';
            if(uploadFile($_FILES))
           {
                
                $query = "INSERT INTO person(person_id,name,fname,gfname,sex,age,married,disability,birth_place,house_id,religion,email,phone,education,job,enum_id) VALUES 
                        ('$id','$name','$fname','$gname','$gender','$age','$married','$disability','$birthplace','$house_no','$religion','$email','$phone','$education','$job','$enum_id')";
            mysqli_query( $connection, $query );
            echo "<script type=\"text/javascript\">
            alert(\"Registered Succesfully\"); 
            window.location = \"cms.php?id=fill_form\";
  </script>";
            }
            else {
                echo"uploading has error";
            }
        
           
            
        
    } elseif ( 'addHouse' == $action ) {
        $house_id=$_REQUEST['house_id'];
        $district=$_REQUEST['district'];
        $state = $_REQUEST['state'] ?? '';
        
        include 'upload.php';
            if(uploadFile($_FILES))
            {
                
                $query = "INSERT INTO house(house_id,district,state) VALUES 
                        ('$house_id','$district','$state')";
                        //echo $query;
            mysqli_query( $connection, $query );
            echo "<script type=\"text/javascript\">
            alert(\"Updated Succesfully\"); 
            window.location = \"cms.php?id=fill_house_form\";
  </script>";
            }
            else {
                echo"uploading has error";
            }
        
           
            
        
    } 
    else if ( 'addGuest' == $action ) {
        
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $hobby = $_REQUEST['hobby'] ?? '';
       
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $password = $_REQUEST['password'] ?? '';
        if ($fname && $lname && $lname && $phone && $password  ) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            include 'upload.php';
            if(uploadFile($_FILES))
{
            $query = "INSERT INTO guests(fname,lname,email,phone,password,role,hobby) VALUES ('{$fname}','$lname','$email','$phone','$hashPassword','guest','$hobby')";
            mysqli_query( $connection, $query );
            
            echo "<script type=\"text/javascript\">
        alert(\"Signed up succesfully please wait while your account is activated\");
        window.location=\"login.php\"</script>"; 
}
else {
    echo "can't upload file";
}     
    }
        

    }
    else if ( 'forget' == $action ) {
        
        
       
        $email = $_REQUEST['email'] ?? '';
        $hobby = $_REQUEST['hobby'] ?? '';
        $password = $_REQUEST['newPassword'] ?? '';
        
        
        if ($email && $hobby && $password ) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            $sql="select * from guests where email='$email'";
            
            $result = mysqli_query( $connection, $sql ) or die (mysqli_error($connection));

        if ( $data = mysqli_fetch_assoc($result) ) {
            
            $_hobby=$data['hobby'];
            $_email = $data['email'] ?? '';
            $_role = $data['role'] ?? '';
            $_id = $data[$_role.'_id'] ?? '';
            
            if ( $hobby==$_hobby ) {
                $updateQuery = "UPDATE {$_role}s SET password='{$hashPassword}' Where email='{$email}'";
                    mysqli_query( $connection, $updateQuery );
                echo "<script type=\"text/javascript\">
                alert(\"Password reseted succesfully\"); 
                window.location = \"cms.php\";
      </script>";
                die();
            }
            else{
                header( "location:forget.php?error" );
            
            }
        } else {
            header( "location:forget.php?error" );
        }
    
    }
    }
    elseif('feedback'==$action){
        $message = $_REQUEST['message'] ?? '';
        $sessionId = $_SESSION['id'] ?? '';
        $sessionEmail = $_SESSION['email'] ?? '';
        
        $now=date('d-m-y h:i:s');
        $query = "INSERT INTO notification(sender,message,date) VALUES ('{$sessionEmail}','{$message}','{$now}')";
        
            mysqli_query( $connection, $query ) or die(mysqli_error($connection));
            echo "<script type=\"text/javascript\">
            alert(\"Thank you for your feedback\"); 
            window.location = \"cms.php\";
  </script>";
        
    }
    elseif ( 'updateProfile' == $action ) {
        $fname = $_REQUEST['fname'] ?? '';
        
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $oldPassword = $_REQUEST['oldPassword'] ?? '';
        $newPassword = $_REQUEST['newPassword'] ?? '';
        $sessionId = $_SESSION['id'] ?? '';
        $sessionRole = $_SESSION['role'] ?? '';
        $avatar = $_FILES['avatar']['name'] ?? "";
        

        if ( $fname && $lname && $email && $phone && $oldPassword && $newPassword ) {
            $query = "SELECT password,avatar FROM {$sessionRole}s Where {$sessionRole}_id='$sessionId'";
            $result = mysqli_query( $connection, $query );

            if ( $data = mysqli_fetch_assoc( $result ) ) {
                $_password = $data['password'];
                $_avatar = $data['avatar'];
                $avatarName = '';
                if ( $_FILES['avatar']['name'] !== "" ) {
                    $allowType = array(
                        'image/png',
                        'image/jpg',
                        'image/jpeg'
                    );
                    if ( in_array( $_FILES['avatar']['type'], $allowType ) !== false ) {
                        $avatarName = $_FILES['avatar']['name'];
                        $avatarTmpName = $_FILES['avatar']['tmp_name'];
                        move_uploaded_file( $avatarTmpName, "assets/img/$avatar" );
                    } else {
                        header( "location:cms.php?id=userProfileEdit&avatarError" );
                        return;
                    }
                } else {
                    $avatarName = $_avatar;
                }
                if ( password_verify( $oldPassword, $_password ) ) {
                    $hashPassword = password_hash( $newPassword, PASSWORD_BCRYPT );
                    $updateQuery = "UPDATE {$sessionRole}s SET fname='{$fname}', lname='{$lname}', email='{$email}', phone='{$phone}', password='{$hashPassword}', avatar='{$avatarName}' Where {$sessionRole}_id='{$sessionId}'";
                    mysqli_query( $connection, $updateQuery );

                    echo "<script type=\"text/javascript\">
            alert(\"Updated Successfully\"); 
            window.location = \"cms.php\";
  </script>";
                }
                else{
                    header("location:cms.php?id=userProfileEdit&error=password");
                }

            }

        } else {
            echo mysqli_error( $connection );
        }

    }

}
