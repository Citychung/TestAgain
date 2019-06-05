<?php
require_once "vendor/autoload.php";

use Dompdf\Dompdf;

// instantiate and use the dompdf class
// instantiate and use the dompdf class
$starttime = explode(' ',microtime());

$dompdf = new Dompdf(array('enable_remote'=> true,'defaultFont'=>'yahei','isphpEnabled'=>true));
$dompdf->set_option('isHtml5ParserEnabled', false);

/*$url = "test.html";
$html=file_get_contents($url);
*/
$FilePath= dirname(dirname(__FILE__));
$html=file_get_contents($FilePath."/测试网站/test8.html","r");
$dompdf->loadHtml($html);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A2', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
$endtime = explode(' ',microtime());
$thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
echo "本网页执行耗时：".$thistime." 秒。";$endtime = explode(' ',microtime());
$file=fopen("D:time.txt","w");
fwrite($file,$thistime);

?>
