
<?php

require "util/db.php";
$db = connectDB();

$sql = "SELECT * FROM users";

//statement

$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Exportar a excel

//require 'vendor/autoload.php';
require '../respaldo/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
/*$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'FULL_NAME');
$sheet->setCellValue('C1', 'EMAIL');
$sheet->setCellValue('D1', 'USER');*/
$sheet->setCellValueByColumnAndRow(1,1, 'ID');
$sheet->setCellValueByColumnAndRow(2,1, 'FULL_NAME');
$sheet->setCellValueByColumnAndRow(3,1, 'EMAIL');
$sheet->setCellValueByColumnAndRow(4,1, 'USER');


foreach($users as $key => $user){
    $fil=$key + 2;
    $sheet->setCellValueByColumnAndRow(1,$fil,$key+1);
    $sheet->setCellValue(2, $fil,$user['Id']);    
    $sheet->setCellValue(3, $fil,$user['Full_name']);    
    $sheet->setCellValue(4,$fil,$user['user_name']);    
    $sheet->setCellValue(5, $fil,$user['email']);
}

$writer = new Xlsx($spreadsheet);
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="usuarios.xlsx"');
$writer->save('php://output');

?>