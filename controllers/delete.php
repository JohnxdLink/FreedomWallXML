<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   $action = isset($_GET['action']) ? $_GET['action'] : '';

   if ($action === 'delete') {
      handleDelete();
   } else {
      echo '<script>';
      echo 'alert("Invalid action");';
      echo 'window.location.href = "../views/admin/index.php";';
      echo '</script>';
   }
}

function handleDelete()
{
   $id = isset($_GET['delete_id']) ? $_GET['delete_id'] : '';

   // Validate delete
   if ($id !== '') {
      $xmlFile = __DIR__ . '/../xml-files/account.xml'; // Update the path

      if (file_exists($xmlFile)) {
         $xml = simplexml_load_file($xmlFile);
         $updatedUsers = [];

         foreach ($xml->user as $user) {
            if ((string)$user->id !== $id) {
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
         echo 'alert("Invalid registration data");';
         echo 'window.location.href = "../views/admin/index.php";';
         echo '</script>';
      } else {
         echo 'XML file not found';
      }
   } else {
      echo '<script>';
      echo 'alert("Invalid delete data");';
      echo 'window.location.href = "../views/admin/index.php";';
      echo '</script>';
   }
}
