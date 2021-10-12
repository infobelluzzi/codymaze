<?php
echo "starting";
require('fpdf/fpdf.php');
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial','I',20);
$id="2188E4CD-A418-401A-88B9-B96203D8180A";
$date="2021-08-16 18:00:00";
$name="Mario Rossi";;
$dateMsg="This certificate, released on ".$date.", has the following identifier:";
$idMsg=$id;
$pdf->Image('images/header.png',40,14,210,0);
$pdf->Cell(0,60,'',0,1,'C');
$pdf->Cell(0,0,'Certificate of completion',0,1,'C');
$pdf->SetFont('Arial','B',32);
$pdf->Cell(0,30,$name,0,1,'C');
$pdf->SetFont('Arial','',20);
$pdf->Cell(0,10,'has successfully completed the Maker Summer Camp CodyMaze activity, performing',0,1,'C');
$pdf->Cell(0,10,'code interpretation with basic coding instructions, among which sequence of elementary',0,1,'C');
$pdf->Cell(0,10,'instructions, conditionals, repetitions, and conditional repetitions.',0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->Cell(0,10,$dateMsg,0,1,'C');
$pdf->Cell(0,10,$idMsg,0,1,'C');
$pdf->Image('images/logo-summer-school.jpg',200,165,80,0);

// Recupero il valore dei campi del form
$destinatario = 'duilio.peroni@gmail.com';
$mittente = 'makers@schoolmakerday.it';
$oggetto = 'test email con allegato';
$messaggio = 'messaggio di prova per codymaze';

// Valorizzo le variabili relative all'allegato
$allegato = 'testfile.pdf';
$allegato_type = 'pdf';
$allegato_name = 'testfile.pdf';

// Creo altre due variabili ad uno interno
$headers = "From: " . $mittente;
$msg = "";
// Verifico se il file è stato caricato correttamente via HTTP
// In caso affermativo proseguo nel lavoro...
//if (is_uploaded_file($allegato))
if (true)
{
  // Apro e leggo il file allegato
//  $file = fopen($allegato,'rb');
//  $data = fread($file, filesize($allegato));
	$data=$pdf->Output('S');
//  fclose($file);

  // Adatto il file al formato MIME base64 usando base64_encode
  $data = chunk_split(base64_encode($data));

  // Genero il "separatore"
  // Serve per dividere, appunto, le varie parti del messaggio.
  // Nel nostro caso separerà la parte testuale dall'allegato
  $semi_rand = md5(time());
  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
  
  // Aggiungo le intestazioni necessarie per l'allegato
  $headers .= "\nMIME-Version: 1.0\n";
  $headers .= "Content-Type: multipart/mixed;\n";
  $headers .= " boundary=\"{$mime_boundary}\"";
/*
Content-Type: application/pdf;
name="CodyMazePiazzadelNettuno.pdf"
Content-Transfer-Encoding: base64
Content-Disposition: attachment;
filename="CodyMazePiazzadelNettuno.pdf"

*/
  // Definisco il tipo di messaggio (MIME/multi-part)
  $msg .= "This is a multi-part message in MIME format.\n\n";

  // Metto il separatore
  $msg .= "--{$mime_boundary}\n";

  // Questa è la parte "testuale" del messaggio
  $msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
  $msg .= "Content-Transfer-Encoding: 7bit\n\n";
  $msg .= $messaggio . "\n\n";

  // Metto il separatore
  $msg .= "--{$mime_boundary}\n";

  // Aggiungo l'allegato al messaggio
  $msg .= "Content-Disposition: attachment; filename=\"{$allegato_name}\"\n";
  $msg .= "Content-Transfer-Encoding: base64;\n";
  $msg .= "Content-Type: application/pdf;\n";
  $msg .= "name={$allegato_name};\n\n";
  $msg .= $data . "\n\n";

  // chiudo con il separatore
  $msg .= "--{$mime_boundary}--\n";
}
// se non è stato caricato alcun file
// preparo un semplice messaggio testuale
else
{
  $msg = $messaggio;
}

// Invio la mail
if (mail($destinatario, $oggetto, $msg, $headers))
{
  echo "<p>Mail inviata con successo!</p>";
}else{
  echo "<p>Errore!</p>";
}
?>