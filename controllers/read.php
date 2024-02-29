<?php
function loadUsers()
{
   $xmlFile = '../../xml-files/account.xml';

   if (file_exists($xmlFile)) {
      $xml = simplexml_load_file($xmlFile);
      $users = [];

      foreach ($xml->user as $user) {
         $userData = [
            'id' => (string)$user->id,
            'username' => (string)$user->username,
            'password' => (string)$user->password,
            'firstname' => (string)$user->firstname,
            'lastname' => (string)$user->lastname,
            'email' => (string)$user->email,
            'address' => (string)$user->address
         ];
         $users[] = $userData;
      }

      return $users;
   } else {
      return [];
   }
}

$users = loadUsers();
