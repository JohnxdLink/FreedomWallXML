<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/admin-index-css.css">
   <title>Freedom Wall | Admin</title>
</head>

<body>
   <header class="content">
      <section class="logo-content">
         <section>
            <img class="jc-logo" src="../../public/images/JC Logo.png" alt="">
         </section>
         <section>
            <h1 class="header-text">Admin Page</h1>
         </section>
      </section>
      <section class="anchor-logout--layout">
         <a class="anchor-logout" href="../../index.php">Logout</a>
      </section>
   </header>

   <main class="content">
      <section class="account-content">
         <div>
            <form action="../../controllers/create.php" method="post">
               <div>
                  <input type="hidden" name="action" value="create">
               </div>
               <div>
                  <h1>Create Account</h1>
               </div>
               <div>
                  <div>
                     <label for="create_id">ID:</label>
                  </div>
                  <div>
                     <input type="text" id="create_id" name="create_id" required>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="create_username">Username:</label>
                  </div>
                  <div>
                     <input type="text" id="create_username" name="create_username" required>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="create_password">Password:</label>
                  </div>
                  <div>
                     <input type="password" id="create_password" name="create_password" required>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="create_firstname">First Name:</label>
                  </div>
                  <div>
                     <input type="text" id="create_firstname" name="create_firstname" required>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="create_lastname">Last Name:</label>
                  </div>
                  <div>
                     <input type="text" id="create_lastname" name="create_lastname" required>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="create_email">Email:</label>
                  </div>
                  <div>
                     <input type="email" id="create_email" name="create_email" required>
                  </div>
               </div>
               <div>
                  <div>
                     <label for="create_address">Address:</label>
                  </div>
                  <div>
                     <input type="text" id="create_address" name="create_address" required>
                  </div>
               </div>

               <div style="width: 100%;">
                  <button type="submit">Create</button>
               </div>
            </form>
         </div>
      </section>

      <section class="dashboard-content">
         <div>
            <h1>Dashboard</h1>
         </div>
         <?php
         // Include the read logic to load users' data
         include_once('../../controllers/read.php');
         ?>

         <table>
            <tr>
               <th>ID</th>
               <th>Username</th>
               <th>Password</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Email</th>
               <th>Address</th>
               <th>Edit/Update</th>
            </tr>

            <?php
            // Check if $users is set before using it
            if (isset($users)) {
               foreach ($users as $user) {
            ?>
                  <tr>
                     <td><?= $user['id'] ?></td>
                     <td><?= $user['username'] ?></td>
                     <td><?= $user['password'] ?></td>
                     <td><?= $user['firstname'] ?></td>
                     <td><?= $user['lastname'] ?></td>
                     <td><?= $user['email'] ?></td>
                     <td><?= $user['address'] ?></td>
                     <td>
                        <div class="edit-delete-content">
                           <div class="anchor-edit-design">
                              <a class="anchor-design" href="../../controllers/edit.php?action=edit&edit_id=<?= $user['id'] ?>">Edit</a>
                           </div>
                           <div class="anchor-delete-design">
                              <a class="anchor-design" href="#" onclick="confirmDelete(<?= $user['id'] ?>)">Delete</a>
                           </div>
                        </div>
                     </td>
                  </tr>
            <?php
               }
            } else {
               echo '<tr><td colspan="9">No users found</td></tr>';
            }
            ?>

         </table>
      </section>
   </main>
   <script src="../js/script.js"></script>
</body>

</html>