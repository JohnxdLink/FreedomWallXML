<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/home-index-css.css">
   <title>Home Page</title>
</head>

<body>
   <header>
      <section>
         <h1>Freedom-Wall</h1>
      </section>
      <section>
         <div>
            <?php
            session_start();
            // Check if the user is logged in
            if (isset($_SESSION['username'])) {
               echo 'Hello, ' . $_SESSION['username'] . '!<br>';
            } else {
               header('Location: ../index.php');
               exit();
            }
            ?>
         </div>
         <div>
            <a href="../../index.php">Logout</a>
         </div>
      </section>
   </header>
   <main>
      <section>
         <h2>Create Freedom Wall Entry</h2>
         <form action="../../controllers/freedom-create.php" method="post">
            <input type="hidden" name="action" value="create">
            <textarea name="create_content" rows="4" cols="50" required></textarea><br>
            <button type="submit">Create Entry</button>
         </form>
      </section>

      <!-- Read freedomwall.xml -->
      <section>
         <?php include_once '../../controllers/freedom-read.php'; ?>
      </section>

      <!-- Update freedomwall.xml -->
      <section>
         <h2>Update Freedom Wall Entry</h2>
         <form action="../../controllers/freedom-update.php" method="post">
            <input type="hidden" name="action" value="update">
            <label for="update_id">Entry ID:</label>
            <input type="text" id="update_id" name="update_id" required>
            <br>
            <label for="update_content">New Content:</label>
            <textarea name="update_content" rows="4" cols="50" required></textarea>
            <br>
            <button type="submit">Update Entry</button>
         </form>
      </section>

      <!-- Delete freedomwall.xml -->
      <section>
         <h2>Delete Freedom Wall Entry</h2>
         <form action="../../controllers/freedom-delete.php" method="post">
            <input type="hidden" name="action" value="delete">
            <label for="delete_id">Entry ID:</label>
            <input type="text" id="delete_id" name="delete_id" required>
            <br>
            <button type="submit">Delete Entry</button>
         </form>
      </section>
   </main>
   <script src="../js/script.js"></script>
</body>

</html>