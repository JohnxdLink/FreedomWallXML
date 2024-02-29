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
   // $id = isset($_POST['create_id']) ? $_POST['create_id'] : '';
   $content = isset($_POST['create_content']) ? $_POST['create_content'] : '';

   // Validate data
   if ($content !== '') {
      // Load the XML file
      $xmlFile = __DIR__ . '/../xml-files/freedomwall.xml';
      $dom = new DOMDocument('1.0');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;

      // Load existing XML or create a new one if it doesn't exist
      if (file_exists($xmlFile)) {
         $dom->load($xmlFile);
      } else {
         $entries = $dom->createElement('entries');
         $dom->appendChild($entries);
      }

      // Create a new entry
      $newEntry = $dom->createElement('entry');

      // Generate a unique ID
      $uniqueId = uniqid();
      $idNode = $dom->createElement('id', $uniqueId);
      $newEntry->appendChild($idNode);

      // Add content to the entry
      $contentNode = $dom->createElement('content', $content);
      $newEntry->appendChild($contentNode);

      // Append the new entry to the entries element
      $entries = $dom->getElementsByTagName('entries')->item(0);
      $entries->appendChild($newEntry);

      // Save the updated XML file
      $dom->save($xmlFile);

      echo 'Entry created successfully!';
   } else {
      echo 'Invalid data';
   }
}
