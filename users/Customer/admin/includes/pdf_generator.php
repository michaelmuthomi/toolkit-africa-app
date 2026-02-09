// pdf_generator.php
require 'vendor/autoload.php'; // Assuming you have installed a PDF library via Composer

use Dompdf\Dompdf;

function generate_pdf($html_content, $filename) {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html_content);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream($filename);
}
