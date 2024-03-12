<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $action = isset($_GET['action']) ? $_GET['action'] : '';

   if ($action === 'update') {
      handleUpdate();
   } else {
      echo 'Invalid action';
   }
}

function handleUpdate()
{
   $id = isset($_POST['update_id']) ? $_POST['update_id'] : '';
   $username = isset($_POST['update_username']) ? $_POST['update_username'] : '';
   $password = isset($_POST['update_password']) ? $_POST['update_password'] : '';
   $firstname = isset($_POST['update_firstname']) ? $_POST['update_firstname'] : '';
   $lastname = isset($_POST['update_lastname']) ? $_POST['update_lastname'] : '';
   $email = isset($_POST['update_email']) ? $_POST['update_email'] : '';
   $address = isset($_POST['update_address']) ? $_POST['update_address'] : '';

   // ? Validate update
   if ($id !== '' && $password !== '' && $firstname !== '' && $lastname !== '' && $email !== '' && $address !== '') {
      $xmlFile = __DIR__ . '/../xml-files/account.xml';

      if (file_exists($xmlFile)) {
         $xml = simplexml_load_file($xmlFile);
         $updatedUsers = [];

         foreach ($xml->user as $user) {
            if ((string)$user->id === $id) {
               $user->id = $id;
               $user->username = $username;
               $user->password = $password;
               $user->firstname = $firstname;
               $user->lastname = $lastname;
               $user->email = $email;
               $user->address = $address;
            }

            $updatedUsers[] = [
               'id' => (string)$user->id,
               'username' => (string)$user->username,
               'password' => (string)$user->password,
               'firstname' => (string)$user->firstname,
               'lastname' => (string)$user->lastname,
               'email' => (string)$user->email,
               'address' => (string)$user->address
            ];
         }

         $dom = new DOMDocument('1.0');
         $dom->formatOutput = true;

         $usersNode = $dom->createElement('users');
         $dom->appendChild($usersNode);

         foreach ($updatedUsers as $user) {
            $userNode = $dom->createElement('user');
            $usersNode->appendChild($userNode);

            $idNode = $dom->createElement('id', $user['id']);
            $userNode->appendChild($idNode);

            $usernameNode = $dom->createElement('username', $user['username']);
            $userNode->appendChild($usernameNode);

            $passwordNode = $dom->createElement('password', $user['password']);
            $userNode->appendChild($passwordNode);

            $firstnameNode = $dom->createElement('firstname', $user['firstname']);
            $userNode->appendChild($firstnameNode);

            $lastnameNode = $dom->createElement('lastname', $user['lastname']);
            $userNode->appendChild($lastnameNode);

            $emailNode = $dom->createElement('email', $user['email']);
            $userNode->appendChild($emailNode);

            $addressNode = $dom->createElement('address', $user['address']);
            $userNode->appendChild($addressNode);
         }

         $dom->save($xmlFile);

         echo '<script>';
         echo 'alert("Account updated successfully!");';
         echo 'window.location.href = "../views/admin/index.php";';
         echo '</script>';
      } else {
         echo 'XML file not found';
      }
   } else {
      echo '<script>';
      echo 'alert("Invalid update data");';
      echo '</script>';
      header('Location: ../views/admin/index.php');
   }
}
