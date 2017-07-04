<?php
$inv = 
'This is pdf test';

//echo $inv; die();
require_once("dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html($inv);
$dompdf->render();
$dompdf->stream("ledger.pdf",array("Attachment" => 0));
