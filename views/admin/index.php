<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/admin-index-css.css">
   <title>Admin Page</title>
</head>

<body>
   <h2>Create Account</h2>
   <section>
      <div>
         <form action="../../controllers/create.php" method="post">
            <input type="hidden" name="action" value="create">
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
            <button type="submit">Create</button>
         </form>
      </div>
   </section>


   <h2>Accounts</h2>

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
         <th>Delete</th>
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
               <td><a href="../../controllers/edit.php?action=edit&edit_id=<?= $user['id'] ?>">Edit</a></td>
               <td><a href="#" onclick="confirmDelete(<?= $user['id'] ?>)">Delete</a></td>
            </tr>
      <?php
         }
      } else {
         echo '<tr><td colspan="9">No users found</td></tr>';
      }
      ?>

   </table>

   <script src="../js/script.js"></script>
</body>

</html>