<?php

/* Parse each field received from the form */
$name = $_POST['pet_name'];
$race = $_POST['pet_race'];
$weight = $_POST['pet_weight'];
$size = $_POST['pet_size'];
$hair = $_POST['pet_hair'];
$behaviours = $_POST['pet_behaviours'];
$fears = $_POST['pet_fears'];
$contests = $_POST['partecipatingToContests'];
$groomed = $_POST['usedToBeGroomed'];
$comfortable = $_POST['comfortableWithOtherPets'];
$image = $_POST['pet_image'];

/* Add a value to fields is they're not filled */
if ( $behaviours == '' ){
    $behaviours = 'none';
}

if ( $fears == '' ){
    $fears = 'none';
}

/* Print each field */
echo 'Name : ' . $name;
echo 'Race : ' . $race;
echo 'Weight: ' . $weight;
echo 'Size: ' . $size;
echo 'Hair: ' . $hair;
echo 'Behaviours: ' . $behaviours;
echo 'Fears: ' . $fears;
echo 'Contests: ' . isset($contests);
echo 'Groomed: ' . isset($groomed);
echo 'Comfortable: ' . isset($comfortable);
echo 'Image: ' . $image;

/*
Create the line to add in the pets.txt file.
first element in each line of pets.txt is the id of the pet owner
$line = $_SESSION['id'];
*/
$line = $name . '|' . $race . '|' . $weight . '|' . $size . '|' .
$hair . '|' . $behaviours . '|' . $fears . '|' .
isset($contests) . '|' . isset($groomed) . '|' .
isset($comfortable) . '|' . $image . "\r\n";

/* Open the pets.txt file */
$fp = fopen('../db/pets.txt', 'a+');

/* Write the line in the file */
if(fwrite($fp, $line))  {
    echo 'saved';

}
fclose ($fp);   

echo 'PET REGISTERED CORRECTLY';

?>

<!-- Visualize button to redirect user to his/her pets page -->
<button type="button" class="btn btn-success" onclick="location.href='./pets.php'">Go Back</button>