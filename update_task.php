<?php 
  session_start();
  $connection = mysqli_connect("localhost", "root", "", "toDoApp");

  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if (isset($_POST['task_id'])) 
    {
        $task_id = $_POST['task_id'];
          $sql = "SELECT id, priority, createdAt , title
                  FROM tasks
                  where id = $task_id";
          $result = mysqli_query($connection, $sql);
          $row = mysqli_fetch_assoc($result);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update Task - Eraasoft</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/update_task.css">
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
        <i class="fas fa-edit me-3"></i>Update Task
      </h1>
      <p class="mb-0 mt-2 opacity-75">Modify your existing task details and keep everything up to date</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container main-content">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">
            <i class="fas fa-home me-1"></i>Dashboard
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="index.php">Tasks</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Update Task</li>
      </ol>
    </nav>

    <div class="form-container">
      <!-- Task Info Badge -->
      <div class="task-info-badge">
        <h6><i class="fas fa-info-circle me-2"></i>Task Information</h6>
        <div class="row">
          <div class="col-md-6">
            <small><strong>Task ID:</strong> <?php echo $row['id']?></small>
          </div>
          <div class="col-md-6">
            <small><strong>Created:</strong> <?php echo $row['createdAt']?></small>
          </div>
        </div>
      </div>

      <div class="text-center mb-4">
        <i class="fas fa-edit task-icon"></i>
        <h2 class="mb-0">Update Task</h2>
        <p class="text-muted">Modify the details below to update your task</p>
      </div>

      <form action="handlers/edit_task.php" method="post">
        <div class="mb-4">
          <label for="taskInput" class="form-label">
            <i class="fas fa-tasks me-2"></i>Task Description
          </label>
          <input
            type="text"
            class="form-control"
            id="taskInput"
            name="title"
            placeholder="Enter a clear and descriptive task..."
            maxlength="255"
          />
          <input type="hidden" name="task_id" value= <?php echo $task_id?>>
          <div class="form-text">
            <i class="fas fa-info-circle me-1"></i>
            Describe what needs to be done clearly and concisely
          </div>
        </div>

        <div class="mb-4">
          <label for="taskPriority" class="form-label">
            <i class="fas fa-flag me-2"></i>Priority Level
          </label>
          <select class="form-control" name="priority" id="taskPriority">
            <option value="">Select priority level</option>
            <option value="high" selected>High Priority</option>
            <option value="medium">Medium Priority</option>
            <option value="low">Low Priority</option>
          </select>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="index.php" class="btn btn-secondary me-md-2">
            <i class="fas fa-times me-2"></i>Cancel
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Update Task
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
      <div class="copyright">
        <p class="mb-0">
          &copy; 2024 Eraasoft. All rights reserved. |
          Designed with <i class="fas fa-heart text-danger"></i> by Eraasoft Team
        </p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
