<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $action = isset($_POST['action']) ? $_POST['action'] : '';

   if ($action === 'create') {
      handleCreate();
   } else {
      echo 'Invalid action';
   }
}

function handleCreate()
{
   $id = isset($_POST['create_id']) ? $_POST['create_id'] : '';
   $username = isset($_POST['create_username']) ? $_POST['create_username'] : '';
   $password = isset($_POST['create_password']) ? $_POST['create_password'] : '';
   $firstname = isset($_POST['create_firstname']) ? $_POST['create_firstname'] : '';
   $lastname = isset($_POST['create_lastname']) ? $_POST['create_lastname'] : '';
   $email = isset($_POST['create_email']) ? $_POST['create_email'] : '';
   $address = isset($_POST['create_address']) ? $_POST['create_address'] : '';

   // Validate registration
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
         echo 'Account created successfully!';
      } else {
         echo 'Username already exists';
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
