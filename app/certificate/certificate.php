<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../FPDF/fpdf.php';
session_start();

use App\database\Database;

$db = Database::getInstance();
$db_connection = $db->getConnection();
$pdf = new FPDF('P', 'mm', array(210, 297));
$certificateid = (isset($_GET['certificateid']) ? ($_GET['certificateid']) : null);
$posts = $db->select("SELECT student.nim, student.name 
    AS sname, student.lastname AS slastname,
     certificate.certificate_name,
     courses.id AS courseid,
     courses.title AS coursetitle,
     event.id,
     event.title AS eventTitle,
     event.speaker 
     FROM student INNER JOIN certificate ON 
     student.nim=certificate.student_id
     INNER  JOIN courses ON certificate.courses_id=courses.id
     INNER  JOIN event ON certificate.event_id=event.id
     WHERE certificate.id = " . $certificateid . " LIMIT 1");
    $pdf->addPage("P", "A4");
    $pdf->GetPageWidth();  // Width of Current Page
    $pdf->GetPageHeight(); // Height of Current Page
    $pdf->SetAutoPageBreak(true, 1);
    $pdf->SetFont('Arial', 'B', 16);
   $pdf->SetTextColor(0,0,0);

if (mysqli_num_rows($posts) <= 0) {
    echo '<div class="alert alert-primary" role="alert"><h1>NO student found</h1></div>';
} else {

    while ($row = mysqli_fetch_assoc($posts)) {

        $pdf->SetFont('', 'U');
        $pdf->Cell(0, -90,  strtoupper($row['sname']), 0, true, 'C');
        $pdf->SetFont('Courier', 'B', 12);
        
        // $pdf->Text(30, 120, strtoupper($row['coursetitle']));
        // description
        $pdf->WriteHTML('<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> 
   <p align="center">Congratulations on completing the  requirements for your <br/>getting this certificate.</p>');
        $pdf->WriteHTML('
    <p align="center">   Doing all the word successfully
       </p>');

        $pdf->Line(10, 250, 80, 250);
        if(strlen($row['sname'])<=10){
            $pdf->Text(30, 260, strtoupper($row['sname']));
        }else{
            $pdf->Text(30, 260, strtoupper($row['sname']));
        }
        $pdf->SetFont('Courier', 'B', 10);
        $pdf->Text(90, 251, 'Signature');
        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Line(120, 250, 200, 250);
        if (strlen($row['speaker']) <= 10) {
            $pdf->Text(155, 260, strtoupper($row['speaker']));
        } else {
            $pdf->Text(140, 260, strtoupper($row['speaker']));
        }
        $pdf->Ln();

        $pdf->Output();
    }
    $posts->free();
}
