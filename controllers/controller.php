<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $action = isset($_POST['action']) ? $_POST['action'] : '';

   if ($action === 'login') {
      handleLogin();
   } elseif ($action === 'register') {
      handleRegister();
   } else {
      echo '<script>';
      echo 'alert("Invalid action");';
      echo 'window.location.href = "../index.php";';
      echo '</script>';
   }
}

function handleLogin()
{
   $username = isset($_POST['login_username']) ? $_POST['login_username'] : '';
   $password = isset($_POST['login_password']) ? $_POST['login_password'] : '';

   // ? Load admin credentials from JSON file
   $adminCredentials = loadAdminCredentials();

   if ($username === $adminCredentials['username'] && $password === $adminCredentials['password']) {
      // Redirect to admin page
      echo '<script>';
      echo 'alert("You are redirecting to admin page");';
      echo 'window.location.href = "../views/admin/index.php";';
      echo '</script>';
      exit();
   } else {
      // ? Validate against XML file (if needed)
      $users = loadUsers();

      if (isset($users[$username]) && $users[$username]['password'] === $password) {
         // ? Set user session and redirect to home
         $_SESSION['username'] = $username;
         echo '<script>';
         echo 'alert("You are redirecting to Freedom Wall XML home page");';
         echo 'window.location.href = "../views/home/index.php";';
         echo '</script>';
         exit();
      } else {
         // ? Save invalid login attempt to JSON file
         saveInvalidLoginAttempt($username, $password);

         echo '<script>';
         echo 'alert("Invalid login credentials!");';
         echo 'window.location.href = "../index.php";';
         echo '</script>';
      }
   }
}

function handleRegister()
{
   $id = isset($_POST['register_id']) ? $_POST['register_id'] : '';
   $username = isset($_POST['register_username']) ? $_POST['register_username'] : '';
   $password = isset($_POST['register_password']) ? $_POST['register_password'] : '';
   $firstname = isset($_POST['register_firstname']) ? $_POST['register_firstname'] : '';
   $lastname = isset($_POST['register_lastname']) ? $_POST['register_lastname'] : '';
   $email = isset($_POST['register_email']) ? $_POST['register_email'] : '';
   $address = isset($_POST['register_address']) ? $_POST['register_address'] : '';

   // ? Validate registration
   if ($id !== '' && $username !== '' && $password !== '' && $firstname !== '' && $lastname !== '' && $email !== '' && $address !== '') {
      $users = loadUsers();
      if (!isset($users[$username])) {
         $users[$username] = [
            'id' => $id,
            'password' => $password,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'address' => $address
         ];
         saveUsers($users);

         // ? Set user session and redirect to home after registration
         $_SESSION['username'] = $username;
         echo '<script>';
         echo 'alert("Account created you are now redirect at Freedom Wall XML Homepage");';
         echo 'window.location.href = "../views/home/index.php";';
         echo '</script>';

         exit();
      } else {
         echo '<script>';
         echo 'alert("Something went wrong please trry again");';
         echo 'window.location.href = "../index.php";';
         echo '</script>';
      }
   } else {
      echo 'Invalid registration data';
   }
}

function loadUsers()
{
   $xmlFile = '../xml-files/account.xml';

   if (file_exists($xmlFile)) {
      $xml = simplexml_load_file($xmlFile);
      $users = [];

      foreach ($xml->user as $user) {
         $username = (string)$user->username;
         $userData = [
            'id' => (string)$user->id,
            'password' => (string)$user->password,
            'firstname' => (string)$user->firstname,
            'lastname' => (string)$user->lastname,
            'email' => (string)$user->email,
            'address' => (string)$user->address
         ];
         $users[$username] = $userData;
      }

      return $users;
   } else {
      return [];
   }
}

function saveUsers($users)
{
   $xmlFile = '../xml-files/account.xml';

   $dom = new DOMDocument('1.0');
   $dom->formatOutput = true;

   $usersNode = $dom->createElement('users');
   $dom->appendChild($usersNode);

   foreach ($users as $username => $userData) {
      $userNode = $dom->createElement('user');
      $usersNode->appendChild($userNode);

      $idNode = $dom->createElement('id', $userData['id']);
      $userNode->appendChild($idNode);

      $usernameNode = $dom->createElement('username', $username);
      $userNode->appendChild($usernameNode);

      $passwordNode = $dom->createElement('password', $userData['password']);
      $userNode->appendChild($passwordNode);

      $firstnameNode = $dom->createElement('firstname', $userData['firstname']);
      $userNode->appendChild($firstnameNode);

      $lastnameNode = $dom->createElement('lastname', $userData['lastname']);
      $userNode->appendChild($lastnameNode);

      $emailNode = $dom->createElement('email', $userData['email']);
      $userNode->appendChild($emailNode);

      $addressNode = $dom->createElement('address', $userData['address']);
      $userNode->appendChild($addressNode);
   }

   $dom->save($xmlFile);
}

function loadAdminCredentials()
{
   $jsonFile = '../views/js/admin_credentials.json';

   if (file_exists($jsonFile)) {
      $jsonContent = file_get_contents($jsonFile);
      $adminCredentials = json_decode($jsonContent, true);

      return $adminCredentials['admin'];
   } else {
      return [];
   }
}

function saveInvalidLoginAttempt($username, $password)
{
   $jsonFile = '../json/invalid-account.json';

   // ? Load existing invalid login attempts
   $invalidAttempts = [];
   if (file_exists($jsonFile)) {
      $jsonContent = file_get_contents($jsonFile);
      $invalidAttempts = json_decode($jsonContent, true);
   }

   // ? Add the current invalid attempt
   $invalidAttempts[] = [
      'username' => $username,
      'password' => $password,
      'timestamp' => date('Y-m-d H:i:s')
   ];

   // ? Save updated invalid login attempts to the JSON file
   file_put_contents($jsonFile, json_encode($invalidAttempts, JSON_PRETTY_PRINT));
}
