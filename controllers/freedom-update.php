<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $action = isset($_POST['action']) ? $_POST['action'] : '';

   if ($action === 'update') {
      handleUpdate();
   } else {
      echo '<script>';
      echo 'alert("Invalid action");';
      echo 'window.location.href = "../views/home/index.php";';
      echo '</script>';
   }
}

function handleUpdate()
{
   $id = isset($_POST['update_id']) ? $_POST['update_id'] : '';
   $content = isset($_POST['update_content']) ? $_POST['update_content'] : '';

   // ? Validate data
   if ($id !== '' && $content !== '') {
      // ? Load the XML file
      $xmlFile = __DIR__ . '/../xml-files/freedomwall.xml';
      $dom = new DOMDocument('1.0');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;

      // ? Load existing XML
      $dom->load($xmlFile);

      // ? Find the entry with the specified ID
      $entries = $dom->getElementsByTagName('entry');
      $entryToUpdate = null;

      foreach ($entries as $entry) {
         $entryId = $entry->getElementsByTagName('id')->item(0)->nodeValue;

         if ($entryId === $id) {
            $entryToUpdate = $entry;
            break;
         }
      }

      if ($entryToUpdate !== null) {
         // ? Update the content of the entry
         $contentNode = $entryToUpdate->getElementsByTagName('content')->item(0);
         $contentNode->nodeValue = $content;

         // ? Save the updated XML file
         $dom->save($xmlFile);

         echo '<script>';
         echo 'alert("Entry updated successfully!");';
         echo 'window.location.href = "../views/home/index.php";';
         echo '</script>';
      } else {
         echo '<script>';
         echo 'alert("Entry not found");';
         echo 'window.location.href = "../views/home/index.php";';
         echo '</script>';
      }
   } else {
      echo '<script>';
      echo 'alert("Invalid data");';
      echo 'window.location.href = "../views/home/index.php";';
      echo '</script>';
   }
}
