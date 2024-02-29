<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $action = isset($_POST['action']) ? $_POST['action'] : '';

   if ($action === 'update') {
      handleUpdate();
   } else {
      echo 'Invalid action';
   }
}

function handleUpdate()
{
   $id = isset($_POST['update_id']) ? $_POST['update_id'] : '';
   $content = isset($_POST['update_content']) ? $_POST['update_content'] : '';

   // Validate data
   if ($id !== '' && $content !== '') {
      // Load the XML file
      $xmlFile = __DIR__ . '/../xml-files/freedomwall.xml';
      $dom = new DOMDocument('1.0');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;

      // Load existing XML
      $dom->load($xmlFile);

      // Find the entry with the specified ID
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
         // Update the content of the entry
         $contentNode = $entryToUpdate->getElementsByTagName('content')->item(0);
         $contentNode->nodeValue = $content;

         // Save the updated XML file
         $dom->save($xmlFile);

         echo 'Entry updated successfully!';
      } else {
         echo 'Entry not found';
      }
   } else {
      echo 'Invalid data';
   }
}
