

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" style="color:#0099e6;">Soccer SMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" style="left:auto;right: 0;" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="home.php" style="color:#0099e6;"><?php echo $username; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="add_stadium.php">Add New Stadium</a>
          <a class="dropdown-item" href="Bookings.php">Bookings</a>
          <a class="dropdown-item" href="my_stadiums.php">My Stadiums</a>
          <a class="dropdown-item" href="chat.php">Chat</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>  
    </ul>
    
  </div>
</nav>