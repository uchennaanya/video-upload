 <?php
    session_start();
    if(isset($_SESSION['use'])) {                         
        header("Location:home.php"); 
     }
    if(isset($_POST['login'])) {   
        $user = $_POST['user'];
        $pass = $_POST['pass'];
    if($user == "Ank" && $pass == "1234") {                                  
        $_SESSION['use']=$user;
        echo '<script type="text/javascript"> window.open("home.php","_self");</script>';
    } else {
        echo "invalid UserName or Password";        
    }
    }
 ?>
<html>
    <head>
        <title>
            Login Page
        </title>
    </head>
    <body>
    <form action="" method="post">
        <table width="200" border="0">
            <tr>
                <td>  UserName</td>
                <td> <input type="text" name="user" > </td>
              </tr>
              <tr>
                <td> PassWord  </td>
                <td><input type="password" name="pass"></td>
              </tr>
              <tr>
                <td> <input type="submit" name="login" value="LOGIN"></td>
                <td></td>
              </tr>
            </table>
        </form>
    </body>
</html>