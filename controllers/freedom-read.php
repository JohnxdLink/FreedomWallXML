<?php
// ? Load the XML file
$xmlFile = __DIR__ . '/../xml-files/freedomwall.xml';
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

if (file_exists($xmlFile)) {
   $dom->load($xmlFile);

   // ? Get all entries and reverse the order
   $entries = iterator_to_array($dom->getElementsByTagName('entry'));
   $entries = array_reverse($entries);

   foreach ($entries as $entry) {
      $id = $entry->getElementsByTagName('id')->item(0)->nodeValue;
      $content = $entry->getElementsByTagName('content')->item(0)->nodeValue;

      // ? Display the entries in the specified format
?>
      <div class="freedom-wall-content">
         <div class="freedom-wall-id-content">
            <div>
               <label for="">ID No. </label>
            </div>
            <div>
               <p><?= $id ?></p>
            </div>
         </div>
         <div>
            <p class="freedom-wall-content-text"><?= $content ?></p>
         </div>
      </div>
<?php
   }
} else {
   echo 'No entries found.';
}
?>