<?php
   session_start()
   
    $db = mysqli_connect("localhost","root","","registration");

    if(isset ($_POST['user_register'])) {

    session_start();

    $username =mysql_real_escape_string($_POST['username']);
    $email =mysql_real_escape_string($_POST['email']);
    $password1 =mysql_real_escape_string($_POST['password1']);
    $password2 =mysql_real_escape_string($_POST['password2']);
    $Doctor=mysql_real_escape_string($_POST['Doctor']);
    $Patient=mysql_real_escape_string($_POST['Patient']);

    if($password1==password2){
    $password =md5($password);
    $sql = "INSERT INTO username(username,email,password1,password2,usertype,Doctor,Patient) VALUES(
    '$username','$email','$password1','$password2','$usertype','$Doctor','$Patient')"
    mysqli_query($db,$sql);
    $_SESSION['message']="you are now logged in";
    $_SESSION['username']= $username;
    header("location : home.php");
}
else{
	
	$_SESSION['message']="your passwords are not matched";
}

}

?>
<!DOCTYPE html>
<html>
<head> 

    <title>Registration</title>
    </head>

    <body>
        <div class ="header">
            <h1>Welcome to registration page </h1>
        </div>

        <form>
            
            <table>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" class="textInput"></td>
                </tr>
                 <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" class="textInput"></td>
                </tr>
                 <tr>
                    <td>Password: </td>
                    <td><input type="password1" name="password1" class="textInput"></td>
                </tr>
                 <tr>
                    <td>Repeat Password: </td>
                    <td><input type="password2" name="password2" class="textInput"></td>
                </tr>
                
                 <tr>
                    <td>Usertype: <select name="usertype" class="form-control" id="usertype">
                      <option value="">Choose User Type</option>
                      <option value="Doctor">Doctor</option>
                      <option value="Patient">Patient</option>
                    </select></td>
                   
                </tr>
                 <tr>
                    <td></td>
                    <td><input type="Submit" name="register_btn" value ="Register"></td>
                </tr>
                
            </table>
        </body>




        </form>
        </html>