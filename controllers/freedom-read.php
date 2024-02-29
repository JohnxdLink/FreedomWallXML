<?php
// Load the XML file
$xmlFile = __DIR__ . '/../xml-files/freedomwall.xml';
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

if (file_exists($xmlFile)) {
   $dom->load($xmlFile);

   $entries = $dom->getElementsByTagName('entry');

   foreach ($entries as $entry) {
      $id = $entry->getElementsByTagName('id')->item(0)->nodeValue;
      $content = $entry->getElementsByTagName('content')->item(0)->nodeValue;

      // Display the entries in the specified format
?>
      <div class="freedom-wall-container">
         <div class="freedom-wall-id-content">
            <p><?= $id ?></p>
         </div>
         <div class="freedom-wall-content">
            <p><?= $content ?></p>
         </div>
      </div>
<?php
   }
} else {
   echo 'No entries found.';
}
?>