<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $action = isset($_POST['action']) ? $_POST['action'] : '';

   if ($action === 'delete') {
      handleDelete();
   } else {
      echo '<script>';
      echo 'alert("Invalid action");';
      echo 'window.location.href = "../views/home/index.php";';
      echo '</script>';
   }
}

function handleDelete()
{
   $id = isset($_POST['delete_id']) ? $_POST['delete_id'] : '';

   // ? Validate data
   if ($id !== '') {
      // ? Load the XML file
      $xmlFile = __DIR__ . '/../xml-files/freedomwall.xml';
      $dom = new DOMDocument('1.0');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;

      // ? Load existing XML
      $dom->load($xmlFile);

      // ? Find the entry with the specified ID
      $entries = $dom->getElementsByTagName('entry');
      $entryToDelete = null;

      foreach ($entries as $entry) {
         $entryId = $entry->getElementsByTagName('id')->item(0)->nodeValue;

         if ($entryId === $id) {
            $entryToDelete = $entry;
            break;
         }
      }

      if ($entryToDelete !== null) {
         // ? Remove the entry from the XML
         $entryToDelete->parentNode->removeChild($entryToDelete);

         // ? Save the updated XML file
         $dom->save($xmlFile);

         echo '<script>';
         echo 'alert("Entry deleted successfully!");';
         echo 'window.location.href = "../views/home/index.php";';
         echo '</script>';
      } else {
         echo '';
         echo '<script>';
         echo 'alert("Entry not found");';
         echo 'window.location.href = "../views/home/index.php";';
         echo '</script>';
      }
   } else {
      echo '';
      echo '<script>';
      echo 'alert("Invalid data");';
      echo 'window.location.href = "../views/home/index.php";';
      echo '</script>';
   }
}
