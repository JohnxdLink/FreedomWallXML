<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/home-index-css.css">
   <title>Home Page</title>
</head>

<body class="whole-content">

   <header class="header-content">

      <section class="header-content__logo">
         <img class="jc-logo--layout" src="../../public/images/JC Logo.png" alt="">
      </section>

      <section class="header-content_panes">
         <div>
            <button>left-pane</button>
         </div>
         <div>
            <button onclick="hide_left_right_pane()">middle-pane</button>
         </div>
         <div>
            <button>right-pane</button>
         </div>
         <div>
            <button>reset-pane</button>
         </div>
      </section>

      <section class="header-content__login-acccount">
         <div class="user-greeting">
            <?php
            session_start();
            // Check if the user is logged in
            if (isset($_SESSION['username'])) {
               echo '<p class="user-greeting--layout">Hello, <span class="username">' . $_SESSION['username'] . '</span>!</p>';
            } else {
               header('Location: ../index.php');
               exit();
            }
            ?>
         </div>
         <div class="logout-link">
            <a class="logout-anchor" href="../../index.php">Logout</a>
         </div>
      </section>
   </header>

   <!-- Main Content -->
   <main class="main-content">
      <!-- Create freedomwall.xml -->
      <section id="create-entry-id" class="main-content__create-entry">

         <div class="main-content__header-content">
            <div class="header-ask-image">
               <img class="header-ask-image--layout" src="" alt="">
            </div>
            <div>
               <p>What's in your mind?</p>
            </div>
         </div>

         <div class="main-content__form">
            <form class="main-content__sub-form" action="../../controllers/freedom-create.php" method="post">
               <div>
                  <input type="hidden" name="action" value="create">
               </div>
               <div>
                  <textarea class="main-content__txt-area" name="create_content" class="entry-content" required></textarea><br>
               </div>
               <div>
                  <button class="main-content__btn-submit" type="submit" class="entry-button">Create Entry</button>
               </div>
            </form>
         </div>
      </section>

      <!-- Read freedomwall.xml -->
      <section id="read-entry-id" class="main-content__read-entry">
         <?php include_once '../../controllers/freedom-read.php'; ?>
      </section>

      <!-- Update freedomwall.xml -->
      <section id="update-delete-entry" class="update-delete-entry">
         <!-- Update freedomwall.xml -->
         <section class="update-entry">
            <h2>Update Freedom Wall Entry</h2>
            <form action="../../controllers/freedom-update.php" method="post">
               <input type="hidden" name="action" value="update">
               <label for="update_id">Entry ID:</label>
               <input type="text" id="update_id" name="update_id" class="entry-id" required>
               <br>
               <label for="update_content">New Content:</label>
               <textarea name="update_content" class="entry-content" required></textarea>
               <br>
               <button type="submit" class="entry-button">Update Entry</button>
            </form>
         </section>

         <!-- Delete freedomwall.xml -->
         <section class="delete-entry">
            <h2>Delete Freedom Wall Entry</h2>
            <form action="../../controllers/freedom-delete.php" method="post">
               <input type="hidden" name="action" value="delete">
               <label for="delete_id">Entry ID:</label>
               <input type="text" id="delete_id" name="delete_id" class="entry-id" required>
               <br>
               <button type="submit" class="entry-button">Delete Entry</button>
            </form>
         </section>
      </section>
   </main>

   <script src="../js/script.js"></script>
</body>

</html>