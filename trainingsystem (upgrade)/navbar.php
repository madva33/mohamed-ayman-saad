<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="indix.php"> Al Madva3</a>

    <?php if (isset($_SESSION["role"])): ?>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    <?php endif; ?>

   <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

           <?php if (isset($_SESSION["role"])): ?>
            <span class="navbar-text text-white me-3">
              Hello (<?= htmlspecialchars($_SESSION["role"]) ?>)
            </span>
          <?php endif; ?>
          </li>
          <?php if (isset($_SESSION["role"])): ?>
          <?php if ($_SESSION["role"] === "admin"): ?>
            <li class="nav-item"><a class="nav-link" href="add_courses.php">Add Course</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="students/students.php">students</a></li>
          <li class="nav-item"><a class="nav-link" href="courses/courses.php">courses</a></li>
          <li class="nav-item"><a class="nav-link" href="enrollments/enrollments.php">enrollments</a></li>
          <li class="nav-item">
          <?php elseif (isset($_SESSION) && $_SESSION["role"] === "user"): ?>
          <li class="nav-item"><a class="nav-link" href="user_dashboard.php">user_dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="courses/courses.php">courses</a></li>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light btn-sm" href="logout.php">Log Out</a>
          </li>
      
      </ul>
    </div>
  </div>
</nav>
