<?php
session_start(); 

include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

Hii, <h3><?php echo $_SESSION["username"];?></h3>
<br>Your Profile Page.
<br><br>
<?php
$radio1=$radio2=$radio3="";
$firstname=$email="";
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
      $address=$row["address"];
      
      $dob=$row["dob"];
      $pattern="/[\/]/";
      $myarrey=preg_split($pattern, $dob);
      $setdate = $myarrey[2]."-".$myarrey[1]."-".$myarrey[0];
      
      if($row["profession"]=="Engineer")
      {$option1="selected";}
      else if($row["profession"]=="Teacher")
      {$option2="selected";}
      else{$option3="selected";}

      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}

      



   
  } 
}
  else {
    echo "0 results";
  }



?>
<form action='' method='post'>
firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" >
<br>
<br>
email : <input type='text' name='email' value="<?php echo $email; ?>" >
<br>
<br>
 Gender:
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php  $radio3; ?> > Other
     <br>
     <br>
      address : <input type='text' name='address' value="<?php echo $address; ?>" >
    <br>
    <br>

    
    
    <label for="profession">Profession</label>
<select id="professsion" name="profession">
  <option value="Engineer" <?php echo $option1; ?>>Enginner</option>
  <option value="Teacher" <?php echo $option2; ?>>Teacher</option>
  <option value="student" <?php echo $option3; ?>>student</option>
</select>



<br><br>
date Of birth : <input type='date' name='date' value="<?php echo $setdate; ?>" >
<br><br>
interests:<br>
<input type="checkbox" id="i1" name="i1" value="music">
<label for="i1" > Music</label><br>
<input type="checkbox" id="i2" name="i2" value="sports">
<label for="i2"> Sports</label><br>
<input type="checkbox" id="i3" name="i3" value="dance">
<label for="i3"> Dance</label><br>
<br>
     <input name='update' type='submit' value='Update'>  

     <?php echo $error; ?>
<br>
<br>
<a href="../view/pageone.php">Back </a>

<a href="../control/logout.php"> logout</a>

</body>
</html>