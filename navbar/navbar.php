<nav class="navbar fixed-bottom navbar-expand bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" onclick="window.location.href='../home/home.php'">
          <i class="material-icons">home</i>
          <a id="navHome" class="nav-link active" aria-current="page">Home</a>
        </li>
        <li class="nav-item" onclick="window.location.href='../booking/booking.php'">
          <i class="material-icons">bookmarks</i>
          <a id="navBooking" class="nav-link">Booking</a>
        </li>
        <li class="nav-item" onclick="window.location.href='../pets/pets.php'">
          <i class="material-icons">pets</i>
          <a id="navPets" class="nav-link">Pets</a>
        </li>
        <li class="nav-item" onclick="window.location.href='../profile/profile.php'">
          <i class="material-icons">person</i>
          <a id="navProfile" class="nav-link">Profile</a>
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