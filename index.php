<?php

/* Create a form that adds a new adult to the db - name, dob, pet name and gender */

var_dump($_POST);

$db = new PDO('mysql:host=127.0.0.1;dbname=MySQLTestDb', 'root');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("INSERT INTO `adults` (`name`, `DOB`, `pet_name`, `gender`) VALUES (:name, :DOB, :pet_name, :gender);");

$query->bindParam(':name', $_POST['name']);
$query->bindParam(':DOB', $_POST['dob']);
$query->bindParam(':pet_name', $_POST['petName']);
$query->bindParam(':gender', $_POST['gender']);

$query->execute();

//$name = $_POST['name'];
//$dob = $_POST['dob'];
//$petName = $_POST['petName'];
//$gender = $_POST['gender'];

?>

<form method="post" action="index.php">
    <div>
        <label>Name:
            <input type="text" name="name">
        </label>
    </div>
        <label>DOB:
            <input type="date" name="dob">
        </label>
    <div>
        <label>Pet Name:
            <input type="text" name="petName">
        </label>
    </div>
    <div>
        <label for="male">Male</label>
        <input id="male" type="radio" name="gender" value="m">
        <label for="female">Female</label>
        <input id="female" type="radio" name="gender" value="f">
    </div>
    <div>
        <input type="submit">
    </div>
</form>
