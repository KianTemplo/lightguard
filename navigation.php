  <!-- ===== NAVIGATION BAR ===== -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">LightGuard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#rooms">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#alerts">Alerts</a>
            </li>
            <li class="nav-item ms-lg-3">
              <?php
              // Show Logout if the user is logged in, otherwise show Login
              if (isset($_SESSION["username"])) {
                  echo "<a class='btn btn-outline-danger btn-sm' href='logout.php'>Logout</a>";
              } else {
                  echo "<a class='btn btn-outline-primary btn-sm' href='login.php'>Login</a>";
              }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
