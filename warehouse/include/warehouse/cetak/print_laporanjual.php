<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
  * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include('cetak.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once('html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('PDF', 'A4', 'en');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('cetak.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>

