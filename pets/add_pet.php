<?php

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
first element in each line of pets.txt is the id of the pet owner
$line = $_SESSION['id'];
*/

$line = $name . '|' . $race . '|' . $weight . '|' . $size . '|' .
$hair . '|' . $behaviours . '|' . $fears . '|' .
isset($contests) . '|' . isset($groomed) . '|' .
isset($comfortable) . '|' . $image;
$fp = fopen('../db/pets.txt', 'a+');

if(fwrite($fp, $line))  {
    echo 'saved';

}
fclose ($fp);   
?>