<?php
function readCSV($filename) {
    $students = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên để lấy tên các cột
        $headers = fgetcsv($handle, 1000, ",");
        
        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $students[] = array_combine($headers, $data);
        }
        fclose($handle);
    }
    return $students;
}
