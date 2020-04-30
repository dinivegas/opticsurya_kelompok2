<?php
$content= "
<page>
<h1>contoh</h1>
<br>
<a href='http://html2pdf.fr/>HTML2PDF</a>.</br>'
</page>";
require_once ('assets/html2pdf/html2pdf_class.php');
$html2pdf = new Html2Pdf('P', 'A4', 'en');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example.pdf');
?>