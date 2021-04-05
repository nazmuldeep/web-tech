<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<script type="text/javascript" src="Validation.js">
</script>
</head>
<body>

<?php 

      $validname="";
      $validemail="";
      $validusername="";
      $validpassword="";
      $validcheckbox="";
      $validradio="";
      $validdate="";

if($_SERVER["REQUEST_METHOD"]=="POST")



{
      $name=$_REQUEST["firstname"];
      $email=$_REQUEST["email"];

    if(empty($name) || !preg_match("/^([A-Za-z]{5,})/ix",$name))

    {
        $validname="enter your name";
    }
    else
    {
        $validname="Your Name is: ".$name;
    }


    if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))

    {
        $validemail="enter your email";
    }
    else
    {
        $validemail="Your Email Address is: ".$email;
    }

    $username=$_REQUEST["username"];


    if(empty($username) || !preg_match("/^([A-Za-z0-9\.*\-*\_*]{5,})/ix",$username))

    {
        $validusername="Please enter valid username!!!";
        if(strlen($username)<4)
        {
            $validusername="Name atleast four character";
        }

    }
    else

    {
        $validusername="Your User Name is: ".$username;
    }

    $password=$_REQUEST["password"];
    $confirmpass=$_REQUEST["confirmPassword"];


    if(strlen($password)<8 || !preg_match("/^((.*)([@|#|$|%]+)(.*))/ix",$password))

    {
        $validatepassword="Password must contain one special character it's make your pasword stronger";
        if(strlen($password)<8)
        {
            $validpassword="Password must have at least 8 characters";
        }
    }


    elseif($password == $confirmpass)

    {
        $validpassword="Your Password is: ".$password;
    }

    else

    {
        $validpassword="Please confirm your password ";
    }
   

    if(!isset($_REQUEST["gender"]))

    {
        $validradio="please enter gender";
    }

    else

    {
        $validradio="Gender is ".$_REQUEST["gender"];
    }


    if(empty($_REQUEST["dd"]))

    {
        $validdate="enter specfic date";
    }

    else

    {
        $validdate="Date is ".$_REQUEST["dd"];
    }
}
?>

<h1> Registration view</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return emptyValidation()" method="POST">


<table>
<tr> <td>First Name</td>
<td>:<input type="text" id="firstname" name="firstname"></td><td><?php echo $validname; ?></td>
</tr>

<tr> <td>Email</td>
<td>:<input type="text" id="email" name="email"></td><td><?php echo $validemail; ?></td>
</tr>

<tr> <td>User Name</td>
<td>:<input type="text" name="username"></td><td><?php echo $validusername; ?></td>
</tr>

<tr> <td>Password</td>
<td>:<input type="password" name="password"></td><td><?php echo $validpassword; ?></td>
</tr>

<tr> <td>Confirm Password</td>
<td>:<input type="password" name="confirmPassword"></td>
</tr>

<tr><td>Gender</td>
</tr>

<tr><td><input type="radio" name="gender" value="Male">Male <input type="radio" name="gender" value="Female">Female <input type="radio" name="gender" value="Other">Other</td><td><?php echo $validateradio; ?></td>
</tr>

<tr><td>Date of Birth</td>
</tr>

<tr><td><input type="date" name="dd">(dd/mm/yyyy)</td><td><?php echo $validdate; ?></td>
</tr>
<tr></tr>
<tr>
<td><input type="submit" value="SUBMIT"> <input type="RESET" value="RESET"></td>
</tr>
</table>
</form>
</body>
</html>