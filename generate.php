<?php
require 'core/init.php';
require 'fpdf.php';

$user = new User;

$users_id = escape($user->data()->users_id); 
$surname = escape($user->data()->surname); 
$firstname = escape($user->data()->firstname);
$username = escape($user->data()->email);
$password = escape($user->data()->matric_no);
$matric_no = escape($user->data()->matric_no);
$email = escape($user->data()->email);
$othername = escape($user->data()->othername);
$dob = escape($user->data()->dob);
$course = escape($user->data()->course);
$programme = escape($user->data()->programme);
$photo = escape($user->data()->photo);
$joined = escape($user->data()->joined);
$date = date('d F Y, h:i A');
$year = date('Y');
 
class PDF extends FPDF
{
	function Header()
	{
	    $this->SetFont('Times','',8);
	    //reset Y
	    $this->SetY(0.5);
	}
}
 
//class instantiation
$pdf = new PDF("P","in","A4");
 
$pdf->SetMargins(.5,.5,.5);
 
$pdf->AddPage();
 
$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('Times','B',25);
$pdf->Cell(0, 0.5, "MOSHOOD ABIOLA POLYTECHNIC,", 0, 1, "C", 1);

$pdf->SetFont('Times','',17);
$pdf->Cell(0, 0.3, "P.M.B. 2210 ABEOKUTA.", 0, 1, "C", 1);

$pdf->SetFont('Times','',12);
$pdf->Cell(0, 0.3, "www.mapoly.edu.ng   info@mapoly.edu.ng     Tel:241272, 240698", '0', 1, "C");

$pdf->SetFont('Times','B',19);
$pdf->Cell(0, 0.6, "INITIAL CLEARANCE REPORT", 0, 1, "C", 1);

$pdf->SetFont('Times','',17);
$pdf->Cell(0, .3, "", 'T', 1, "C");

// $pdf->Image("profile/$photo", 6.65 ,.93);
$pdf->Image("mapoly.jpg", .5, .9, -500, -650);

$pdf->SetFont('Times','',14); 
$pdf->Cell(0, 0.5, "NAMES IN FULL: $surname $firstname $othername", 1, 0, "L", 0);
$pdf->Cell(0, 0.5, "MATRIC NUMBER: $matric_no", 1, 1, "R", 0);

$pdf->Cell(0, 0.5, "COURSE: $programme in $course", 1, 0, "L", 0);
$pdf->Cell(0, 0.5, "DATE : $date", 1, 1, "R", 0);
$pdf->Cell(0, 0.3, "", 0, 1, "C", 0);


$pdf->SetFont('Times','',13); 
$dot = ".";
$pdf->Write(0.35, "With Reference to your Admission into the Moshhod Abiola Polytechnic, Abeokuta for the $year/2020 Academic session. I am pleased to inform you that you have Successfully Undergone the Clearance Process to be Verified that You were given Admission to the School, and Completed the INITIAL CLEARANCE PROCESS. Please Your Obligations as a Student Should be Executed as Learning is the Ultimate goal.. This document accertains that you are a licit Student of the School".$dot."\n"
        );

$pdf->SetFont('Times','',13); 
$pdf->Cell(0, 0.3, "", 0, 1, "C", 0);
$pdf->Cell(0, 0.5, "I declare that the this statements made above are true and clear", 0, 1, "L", 0);
$pdf->Cell(0, 0.3, "CANDIDATE SIGNATURE AND DATE:	........................................................................................", 0, 0, "L", 0);

// School Officer
$pdf->Cell(0, .6, "", 0, 1, "C", 0);
$pdf->Cell(0, 0.5, "School Officer's Comment:	..................................................................................................................", 0, 1, "L", 0);
$pdf->Cell(0, 0.4, "Name:	...................................................", 0, 0, "L", 0);
$pdf->Cell(0, 0.4, "Signature and Date:		..................................................", 0, 0, "R", 0);

// HOD
$pdf->Cell(0, .6, "", 0, 1, "C", 0);
$pdf->Cell(0, 0.5, "HOD's Comment:	..............................................................................................................................", 0, 1, "L", 0);
$pdf->Cell(0, 0.4, "Name:	...................................................", 0, 0, "L", 0);
$pdf->Cell(0, 0.4, "Signature and Date:		..................................................", 0, 0, "R", 0);

// Admission Officer
$pdf->Cell(0, .6, "", 0, 1, "C", 0);
$pdf->Cell(0, 0.5, "Admission Officer's Comment:	...............................................................................................................", 0, 1, "L", 0);
$pdf->Cell(0, 0.4, "Name:	...................................................", 0, 0, "L", 0);
$pdf->Cell(0, 0.4, "Signature and Date:		..................................................", 0, 0, "R", 0);


$pdf->Cell(0, 0.3, "", 0, 1, "C", 0);
$pdf->Cell(0, 0.3, "", 0, 1, "C", 0);

$pdf->Output('clearance.pdf','D');
?>