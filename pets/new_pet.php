<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Groomy This is the pets page.</title>

    <?php
    include_once("../navbar/navbar.php");
    ?>
    <link rel="stylesheet" type="text/css" href="./style/reset.css">
    <link rel="stylesheet" type="text/css" href="./style/fonts.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">

    
</head>

<body>

    <h1>Add new pet</h1>

    <form method="post" action="add_pet.php">
        <div class="mb-3">
            <label for="pet_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="pet_name" name="pet_name" required>
        </div>

        <div class="mb-3">
            <label for="pet_race" class="form-label">Race</label>
            <input type="text" class="form-control" id="pet_race" name="pet_race" required>
        </div>

        <div class="mb-3">
            <label for="pet_weight" class="form-label">Weight</label>
            <input type="numeric" class="form-control" id="pet_weight" name="pet_weight" required>
        </div>

        <select class="form-select" aria-label="Size" name="pet_size" required>
            <option selected>Size</option>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="big">Big</option>
        </select>
        <br>
        <div class="mb-3">
            <label for="pet_hair" class="form-label">Type of hair</label>
            <input type="text" class="form-control" id="pet_hair" name="pet_hair" required>
        </div>

        <div class="mb-3">
            <label for="pet_behaviours" class="form-label">Strange behaviours?</label>
            <input type="text" class="form-control" id="pet_behaviours" name="pet_behaviours">
        </div>

        <div class="mb-3">
            <label for="pet_fears" class="form-label">Is it scared about something?</label>
            <input type="text" class="form-control" id="pet_fears" name ="pet_fears">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="partecipatingToContests" name="partecipatingToContests" value="contests" />
            <label class="form-check-label" for="partecipatingToContests">
                Is it partecipating to contests?
            </label>
        </div>

        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="usedToBeGroomed" name="usedToBeGroomed" value="groomed" />
            <label class="form-check-label" for="usedToBeGroomed">
                Is it used to be groomed?
            </label>
        </div>
        
        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="comfortableWithOtherPets" name="comfortableWithOtherPets" value="comfortable" />
            <label class="form-check-label" for="comfortableWithOtherPets">
                Is it comfortable with other pets?
            </label>
        </div>

        <br>

        <div class="input-group">
            <input type="file" class="form-control" id="pet_image" aria-label="Upload" name="pet_image">
            <button class="btn btn-outline-secondary" type="button" id="pet_image">Button</button>
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</body>

</html>