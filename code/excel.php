<?php

require '../respaldo/vendor/autoload.php';
require "util/db.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$db = connectDB();

$sql = "SELECT * FROM id,full_name,user_name,email FROM users";
$stmt = $db->prepare($sql);

$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValueByColumnAndRow(1,1 ,'#');
$sheet->setCellValueByColumnAndRow(1,2, 'Id');
$sheet->setCellValueByColumnAndRow(3,1, 'Nombre');
$sheet->setCellValueByColumnAndRow(4,1, 'Nombre Usuario');
$sheet->setCellValueByColumnAndRow(5,1, 'Correo');

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