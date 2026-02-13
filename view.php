<?php
include __DIR__ . '/component/pdo.php';

$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h4 mb-0">Users</h1>
      <div class="d-flex gap-2">
        <a href="add.php" class="btn btn-success">Add User</a>
        <form method="post" action="delete.php" onsubmit="return confirm('Delete all users? This cannot be undone.');">
          <input type="hidden" name="delete_all" value="1">
          <button type="submit" class="btn btn-danger">Delete All</button>
        </form>
      </div>
    </div>

    <?php if (isset($_GET["updated"]) && $_GET["updated"] == "1"): ?>
      <div class="alert alert-success">User updated successfully.</div>
    <?php endif; ?>
    <?php if (isset($_GET["deleted"]) && $_GET["deleted"] == "1"): ?>
      <div class="alert alert-success">User deleted successfully.</div>
    <?php endif; ?>
    <?php if (isset($_GET["deleted"]) && $_GET["deleted"] == "0"): ?>
      <div class="alert alert-danger">Failed to delete user.</div>
    <?php endif; ?>
    <?php if (isset($_GET["deleted_all"]) && $_GET["deleted_all"] == "1"): ?>
      <div class="alert alert-warning">All users deleted.</div>
    <?php endif; ?>

    <div class="card shadow-lg">
      <div class="card-body">
        <?php if (count($users) > 0): ?>
          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user): ?>
                  <tr>
                    <td><?php echo htmlspecialchars((string) $user["id"], ENT_QUOTES, "UTF-8"); ?></td>
                    <td><?php echo htmlspecialchars($user["firstname"], ENT_QUOTES, "UTF-8"); ?></td>
                    <td><?php echo htmlspecialchars($user["lastname"], ENT_QUOTES, "UTF-8"); ?></td>
                    <td class="text-end">
                      <div class="d-inline-flex gap-2">
                        <a
                          href="update.php?id=<?php echo urlencode((string) $user["id"]); ?>"
                          class="btn btn-sm btn-outline-success"
                        >
                          Edit
                        </a>
                        <form
                          method="post"
                          action="delete.php"
                          onsubmit="return confirm('Delete this user?');"
                        >
                          <input type="hidden" name="id" value="<?php echo htmlspecialchars((string) $user["id"], ENT_QUOTES, "UTF-8"); ?>">
                          <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <p class="text-muted mb-0">No users found. Add your first user.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
