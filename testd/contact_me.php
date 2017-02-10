<?php

if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['school'])    ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    echo "No arguments Provided!";
    return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$school = strip_tags(htmlspecialchars($_POST['school']));

$servername = "localhost";
$username = "david";
$password = "password";
$dbname = "phptest";

$conn = new mysqli($servername, $username, $password, $dbname);

function checkEntries($conn,$name,$email_address,$school) {
    $sqlselect = "SELECT id,name,email,school FROM fulltest";
    $result = $conn->query($sqlselect);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($row["email"] == $email_address || $row["name"] == $name){
            $j = $row["id"];
            $k = $row["school"] . ", " . $school;
            $sqlupdate = "UPDATE fulltest SET school ='$k' WHERE id='$j'";
            $conn->query($sqlupdate);
            return;
        }
      }
    }
    $sqlinsert = "INSERT INTO fulltest (name, email, school)
    VALUES ('$name','$email_address','$school')";

    $conn->query($sqlinsert);
    return;
}
checkEntries($conn,$name,$email_address,$school);

$conn->close();

?>