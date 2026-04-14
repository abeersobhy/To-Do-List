<?php 
  session_start();
  $connection = mysqli_connect("localhost", "root", "", "toDoApp");
  $sql = "SELECT * FROM tasks";
  $result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Todo List - Eraasoft</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/index.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="assets/logo.png" alt="Eraasoft" width="40" height="32">
        Eraasoft
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="fas fa-home me-2"></i>Dashboard
            </a>
          </li>
        </ul>

        <div class="d-flex">
          <a href="create_task.php" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Create Task
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <div class="page-header">
    <div class="container">
      <h1 class="mb-0">
        <i class="fas fa-list-check me-3"></i>Todo List Management
      </h1>
      <p class="mb-0 mt-2 opacity-75">Manage your tasks efficiently and stay organized</p>
    </div>
  </div>

  <?php if(isset($_SESSION['success'])):?>
    <div class="alert alert-success text-center">
       <?php 
        echo $_SESSION['success'];
        unset($_SESSION['success']);
       ?>
    </div>
  <?php endif;?>
  <?php if(isset($_SESSION['delete'])):?>
    <div class="alert alert-success text-center">
       <?php 
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
       ?>
    </div>
  <?php endif;?>

  <!-- Main Content -->
 <div class="container main-content">
    <div class="table-container">
      <div class="table-responsive"> </div>
          <table class="table table-striped mb-0">
          <thead class="table-dark">
            <tr>
              <th><i class="fas fa-hashtag me-2"></i>ID</th>
              <th><i class="fas fa-tasks me-2"></i>Task</th>
              <th><i class="fas fa-flag me-2"></i>Priority</th>
              <th><i class="fas fa-calendar me-2"></i>Created At</th>
              <th><i class="fas fa-cogs me-2"></i>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($result)):?>
            <tr>
              <td> <?php echo $row['id'] ?> </td>
              <td>
                <div class="d-flex align-items-center">
                  <?php echo $row['title'] ?>
                </div>
              </td>
              <td>
                <span class="badge bg-danger">
                  <i class="fas fa-exclamation me-1"></i><?php echo $row['priority']?>
                </span>
              </td>
              <td>
                <small class="text-muted">
                  <i class="fas fa-clock me-1"></i>
                    <?php echo $row['createdAt']?>
                </small>
              </td>
              <td>
                <form action="update_task.php" method="POST" class="d-inline">
                  <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-sm btn-warning action-btn">
                      <i class="fas fa-edit me-1"></i>Edit
                    </button>
                </form>
                <form class="d-inline" action="handlers/delete_task.php" method="post">
                    <input type="hidden" name="task_id" value= <?php echo $row['id']?>>
                    <button type="submit" class="btn btn-sm btn-danger action-btn">
                      <i class="fas fa-trash me-1"></i>Delete
                    </button>
                </form>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
      <div class="copyright">
        <p class="mb-0">
          &copy; 2026 Abeer Sobhy. All rights reserved. |
          Designed with <i class="fas fa-heart text-danger"></i> by Abeer Sobhy
        </p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
