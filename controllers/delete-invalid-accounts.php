<?php
function deleteInvalidAccounts()
{
   $jsonFile = '../json/invalid-account.json';

   // Check if the JSON file exists
   if (file_exists($jsonFile)) {
      // Read the contents of the JSON file
      $jsonContent = file_get_contents($jsonFile);

      // Decode the JSON content into an associative array
      $invalidAccounts = json_decode($jsonContent, true);

      // Clear the array of invalid accounts
      $invalidAccounts = [];

      // Encode the empty array back to JSON format
      $jsonString = json_encode($invalidAccounts, JSON_PRETTY_PRINT);

      // Write the empty JSON content back to the file
      if (file_put_contents($jsonFile, $jsonString) !== false) {
         // If successful, redirect back to the admin page
         echo '<script>';
         echo 'alert("All invalid accounts deleted successfully!");';
         echo 'window.location.href = "../views/admin/index.php";';
         echo '</script>';
      } else {
         // If failed to write to the file, display an error message
         echo '<script>';
         echo 'alert("Failed to delete invalid accounts!");';
         echo 'window.location.href = "../views/admin/index.php";';
         echo '</script>';
      }
   } else {
      // If the JSON file does not exist, display an error message
      echo '<script>';
      echo 'alert("Invalid account JSON file not found!");';
      echo 'window.location.href = "../views/admin/index.php";';
      echo '</script>';
   }
}

// Call the function to delete invalid accounts
deleteInvalidAccounts();
