<?php
function saveAsJson()
{
   $xmlFile = '../xml-files/account.xml';
   $jsonFile = '../json/js-account.json';

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

      $jsonString = json_encode(['users' => $users], JSON_PRETTY_PRINT);

      if (file_put_contents($jsonFile, $jsonString) !== false) {
         echo '<script>';
         echo 'alert("JSON file created successfully!");';
         echo 'window.location.href = "../views/admin/index.php";';
         echo '</script>';
      } else {
         echo '<script>';
         echo 'alert("Failed to create JSON file!");';
         echo 'window.location.href = "../views/admin/index.php";';
         echo '</script>';
      }
   } else {
      echo '<script>';
      echo 'alert("XML file not found!");';
      echo 'window.location.href = "../views/admin/index.php";';
      echo '</script>';
   }
}

// ? Call the function to save as JSON
saveAsJson();
