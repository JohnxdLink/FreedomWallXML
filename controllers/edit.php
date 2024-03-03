<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   $action = isset($_GET['action']) ? $_GET['action'] : '';

   if ($action === 'edit') {
      handleEdit();
   } else {
      echo '<script>';
      echo 'alert("Invalid action");';
      echo 'window.location.href = "../views/admin/index.php";';
      echo '</script>';
   }
}

function handleEdit()
{
   $id = isset($_GET['edit_id']) ? $_GET['edit_id'] : '';

   // Validate edit
   if ($id !== '') {
      $xmlFile = __DIR__ . '/../xml-files/account.xml';

      if (file_exists($xmlFile)) {
         $xml = simplexml_load_file($xmlFile);

         $userToEdit = null;

         // Find the user with the given ID
         foreach ($xml->user as $user) {
            if ((string)$user->id === $id) {
               $userToEdit = $user;
               break;
            }
         }

         if ($userToEdit !== null) {
?>
            <link rel="stylesheet" type="text/css" href="../views/css/admin-edit-css.css">
            <header>
               <section>
                  <img class="jc-logo" src="../public/images/JC Logo.png" alt="">
               </section>
               <section>
                  <h1>Edit Profile</h1>
               </section>
            </header>

            <body>
               <section>
                  <div>
                     <form action="update.php?action=update" method="post">
                        <div>
                           <input type="hidden" name="update_id" value="<?= $userToEdit->id ?>" required>
                        </div>

                        <div class="two-form-sections">
                           <section class="first-form-section">
                              <div>
                                 <div>
                                    <label for="update_id">ID:</label>
                                 </div>
                                 <div>
                                    <input type="text" id="update_id" name="update_id" value="<?= $userToEdit->id ?>" required readonly>
                                 </div>
                              </div>
                              <div>
                                 <div>
                                    <label for="update_username">Username:</label>
                                 </div>
                                 <div>
                                    <input type="text" id="update_username" name="update_username" value="<?= $userToEdit->username ?>" required>
                                 </div>
                              </div>
                              <div>
                                 <div>
                                    <label for="update_password">Password:</label>
                                 </div>
                                 <div>
                                    <input type="password" id="update_password" name="update_password" value="<?= $userToEdit->password ?>" required>
                                 </div>
                              </div>
                           </section>

                           <section class="second-form-section">
                              <div>
                                 <div>
                                    <label for="update_firstname">First Name:</label>
                                 </div>
                                 <div>
                                    <input type="text" id="update_firstname" name="update_firstname" value="<?= $userToEdit->firstname ?>" required>
                                 </div>
                              </div>
                              <div>
                                 <div>
                                    <label for="update_lastname">Last Name:</label>
                                 </div>
                                 <div>
                                    <input type="text" id="update_lastname" name="update_lastname" value="<?= $userToEdit->lastname ?>" required>
                                 </div>
                              </div>
                              <div>
                                 <div>
                                    <label for="update_email">Email:</label>
                                 </div>
                                 <div>
                                    <input type="email" id="update_email" name="update_email" value="<?= $userToEdit->email ?>" required>
                                 </div>
                              </div>
                              <div>
                                 <div>
                                    <label for="update_address">Address:</label>
                                 </div>
                                 <div>
                                    <input type="text" id="update_address" name="update_address" value="<?= $userToEdit->address ?>" required>
                                 </div>
                              </div>
                           </section>
                        </div>

                        <div class="submit-button-content">
                           <button type="submit">Update</button>
                        </div>
                     </form>
                  </div>
               </section>
            </body>

<?php
         } else {
            echo '<script>';
            echo 'alert("User not found");';
            echo 'window.location.href = "../views/admin/index.php";';
            echo '</script>';
         }
      } else {
         echo 'XML file not found';
      }
   } else {
      echo '<script>';
      echo 'alert("Invalid edit data");';
      echo 'window.location.href = "../views/admin/index.php";';
      echo '</script>';
   }
}
?>