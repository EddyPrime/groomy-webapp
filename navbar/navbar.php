<nav class="navbar fixed-bottom navbar-expand bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <i class="material-icons">home</i>
          <a id="navHome" class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <i class="material-icons">bookmarks</i>
          <a id="navBooking" class="nav-link" href="../booking/booking.php">Booking</a>
        </li>
        <li class="nav-item">
          <i class="material-icons">pets</i>
          <a id="navPets" class="nav-link" href="../pets/pets.php">Pets</a>
        </li>
        <li class="nav-item">
          <i class="material-icons">person</i>
          <a id="navProfile" class="nav-link" href="../profile/profile.php">Profile</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  const home = document.getElementById("navHome");
  const booking = document.getElementById("navBooking");
  const pets = document.getElementById("navPets");
  const profile = document.getElementById("navProfile");
</script>