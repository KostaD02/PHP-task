<?php
$jsonString = file_get_contents('./assets/data/about/history.json');
$jsonData = json_decode($jsonString, true);

if ($jsonData === null) {
  die('Error');
}

$htmlContent = $jsonData['data'];

echo $htmlContent;
?>