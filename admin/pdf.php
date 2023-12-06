</php
require('fpdf.php'); 


$imagePath = '"C:\xampp\htdocs\shourya_academy\pdf.jpeg"';


$image = imagecreatefromjpeg($imagePath);




$candidateName = "John Doe";
$candidateTitle = "Certificate of Achievement";


$pdf = new FPDF();
$pdf->AddPage();


$pdf->Image($imagePath, 0, 0, 210); // Adjust width (210) according to your image size


$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(255, 255, 255); // Font color (white)


$pdf->SetXY(50, 100); // Adjust coordinates
$pdf->Cell(0, 10, utf8_decode($candidateTitle), 0, 1, 'C'); // Center-aligned title
$pdf->SetXY(50, 120); // Adjust coordinates
$pdf->Cell(0, 10, utf8_decode($candidateName), 0, 1, 'C'); // Center-aligned name


$pdf->Output('generated_certificate.pdf', 'D'); // 'D' to force download


imagedestroy($image);
?>