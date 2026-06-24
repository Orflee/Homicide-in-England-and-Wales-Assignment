<?php
$csvFile = '../raw_data/Rate of offences per million population currently recorded as homicide, by age and sex of victim.csv';
function readCSV($csvFile) {
    // check csv
    if (!file_exists($csvFile)) {
        http_response_code(404);
        echo json_encode(['error' => 'File not found.']);
        exit;
    }
    // open csv
    $handle = fopen($csvFile, "r");
    // check if valid
    if ($handle === false) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to open CSV file.']);
        exit;
    }
    // store data
    $data = [];
    // file line by line and store data
    while (($row = fgetcsv($handle, 0, ";")) !== false) {
        $data[] = $row;
    }
    fclose($handle);
    // check read
    if (empty($data)) {
        http_response_code(500);
        echo json_encode(['error' => 'No data found in CSV file.']);
        exit;
    }
    //sent as JSON
    $response = [
        'headers' => $data[0],
        'rows' => array_slice($data, 1)
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
}
readCSV($csvFile);
