<?php
/**
 * Simple XLSX TO JSON Parser for Student List
 * Uses ZipArchive and SimpleXML
 */

$xlsxFile = 'd:/xampp/htdocs/school_project/boys list.xlsx';
$outputFile = 'd:/xampp/htdocs/school_project/school_project/data/students.json';

if (!file_exists($xlsxFile)) {
    die("Error: File not found: $xlsxFile \n");
}

$zip = new ZipArchive();
if ($zip->open($xlsxFile) !== TRUE) {
    die("Error: Could not open XLSX file as ZIP.\n");
}

// 1. Load shared strings
$sharedStrings = [];
$ssContent = $zip->getFromName('xl/sharedStrings.xml');
if ($ssContent) {
    $xml = simplexml_load_string($ssContent);
    foreach ($xml->si as $si) {
        $sharedStrings[] = (string)$si->t;
    }
}

// 2. Load sheet data
$sheetContent = $zip->getFromName('xl/worksheets/sheet1.xml');
if (!$sheetContent) {
    die("Error: Could not find sheet1.xml in XLSX.\n");
}

$xml = simplexml_load_string($sheetContent);
$students = [];

foreach ($xml->sheetData->row as $row) {
    $rowData = [];
    foreach ($row->c as $cell) {
        $attr = $cell->attributes();
        $type = (string)$attr->t;
        $value = (string)$cell->v;

        if ($type === 's') {
            // String type, reference to shared strings
            $rowData[] = isset($sharedStrings[$value]) ? $sharedStrings[$value] : '';
        } else {
            $rowData[] = $value;
        }
    }

    if (count($rowData) >= 2) {
        $students[] = [
            'reg_no' => trim($rowData[0]),
            'name'   => trim($rowData[1])
        ];
    }
}

$zip->close();

// Filter out headers or empty rows if necessary
// Assuming the first row might be headers
if (!empty($students)) {
    // Basic check: if the first row is headers, remove it
    $first = $students[0];
    if (stripos($first['reg_no'], 'reg') !== false || stripos($first['name'], 'name') !== false) {
        array_shift($students);
    }
}

file_put_contents($outputFile, json_encode($students, JSON_PRETTY_PRINT));
echo "Successfully synced " . count($students) . " students to $outputFile\n";
