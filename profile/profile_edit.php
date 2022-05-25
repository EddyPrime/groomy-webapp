<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>

    <link rel="stylesheet" type="text/css" href="./style/reset.css">
    <link rel="stylesheet" type="text/css" href="./style/fonts.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">

    <?php
    include "../navbar/navbar.php";
    ?>

</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Profile</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="First name" value=""></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="Last name"></div>
                        <div class="col-md-6"><label class="labels">Phone number</label><input type="tel" class="form-control" placeholder="Phone number" value=""></div>
                        <div class="col-md-6"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email" value=""></div>
                        <div class="col-md-6"><label class="labels">Password</label><input type="password" class="form-control" placeholder="Password" value=""></div>
                        <div class="col-md-6"><label class="labels">Confirm Password</label><input type="password" class="form-control" placeholder="Confirm password" value=""></div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-warning profile-button" type="button" onclick="window.location.href='./profile.php';">Cancel</button>
                        <button class="btn btn-primary profile-button" type="button">Save Changes</button>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-danger" type="button">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>