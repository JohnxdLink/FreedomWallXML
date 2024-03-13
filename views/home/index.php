<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="language" content="English">
   <meta name="title" content="Freedom XML">
   <meta name="description" content="This webpage is all about Freedom Wall XML Content">
   <meta name="robots" content="index, follow">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="Castro John Christian">
   <title>Freedom Wall | Home</title>
   <link rel="stylesheet" href="../css/home-index-css.css">
</head>

<body class="whole-content">
   <header class="header-content">

      <section class="header-content__logo">
         <img class="jc-logo--layout" src="../../public/images/JC Logo.png" alt="">
      </section>

      <section class="header-content_panes">
         <div>
            <img class="layer-panes" src="../../public/images/left-pane.png" alt="" onclick="hide_right_pane()">
         </div>
         <div>
            <img class="layer-panes" src="../../public/images/middle-pane.png" alt="" onclick="hide_left_right_pane()">
         </div>
         <div>
            <img class="layer-panes" src="../../public/images/right-pane.png" alt="" onclick="hide_left_pane()">
         </div>
         <div>
            <img class="layer-panes" src="../../public/images/reset-pane.png" alt="" onclick="reset_all_pane()">
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
            <p class="main-content__haeder-text">What's in your mind?</p>
         </div>

         <div class="main-content__form">
            <form class="main-content__sub-form" action="../../controllers/freedom-create.php" method="post">
               <div>
                  <input type="hidden" name="action" value="create">
               </div>
               <div class="main-content__txt-content">
                  <textarea class="main-content__txt-area" name="create_content" rows="19"></textarea><br>
               </div>
               <div>
                  <button class="main-content__btn-submit" type="submit">POST</button>
               </div>
            </form>
         </div>
      </section>

      <!-- Read freedomwall.xml -->
      <section class="main-cotent__scroll">
         <section id="read-entry-id" class="main-content__read-entry">
            <?php include_once '../../controllers/freedom-read.php'; ?>
         </section>
      </section>


      <!-- Update freedomwall.xml -->
      <section id="update-delete-entry" class="update-delete-entry">
         <!-- Update freedomwall.xml -->
         <section class="update-entry">
            <div>
               <h2 class="update-delete-header-text">Update Freedom Wall</h2>
            </div>

            <div>
               <form class="update-delete-entry-form" action="../../controllers/freedom-update.php" method="post">
                  <div>
                     <input type="hidden" name="action" value="update">
                  </div>
                  <div class="update-delete-form-content">
                     <div>
                        <label class="update-delete__header" for="update_id">ID:</label>
                     </div>
                     <div style="width: 90%;">
                        <input class="update-delete__input" type="text" id="update_id" name="update_id" required>
                     </div>
                  </div>

                  <div class="update-delete-form-content-entries">
                     <div>
                        <label class="update-delete__header" for="update_content">New Content:</label>
                     </div>
                     <div style="width: 100%;">
                        <textarea class="update-delete__txt-content" name="update_content" rows="6" required></textarea>
                     </div>
                  </div>

                  <div style="width: 100%;">
                     <button class="update-delete-submit-btn" type="submit">Update Entry</button>
                  </div>
               </form>
            </div>
         </section>

         <!-- Delete freedomwall.xml -->
         <section class="delete-entry">
            <div>
               <h2 class="update-delete-header-text">Delete Freedom Wall</h2>
            </div>

            <div>
               <form class="update-delete-entry-form" action="../../controllers/freedom-delete.php" method="post">
                  <div>
                     <input type="hidden" name="action" value="delete">
                  </div>

                  <div class="update-delete-form-content">
                     <div>
                        <label class="update-delete__header" for="delete_id">ID:</label>
                     </div>
                     <div style="width: 100%;">
                        <input class="update-delete__input" type="text" id="delete_id" name="delete_id" required>
                     </div>
                  </div>

                  <div>
                     <button class="update-delete-submit-btn" type="submit">Delete Entry</button>
                  </div>
               </form>
            </div>
         </section>
      </section>
   </main>
   <script src="../js/script.js"></script>
</body>

</html>