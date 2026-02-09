<?php
// FPDF - Free PDF generator library for PHP
// Version 1.85
// Author: Olivier Plathey
// Homepage: http://www.fpdf.org/

class FPDF
{
    protected $page;       // Current page number
    protected $state;      // Current document state
    protected $compress;   // Compression flag
    protected $k;          // Scale factor (number of points in user unit)
    protected $DefOrientation; // Default orientation
    protected $CurOrientation; // Current orientation
    protected $OrientationChanges; // Orientation changes array
    protected $fwPt, $fhPt;  // Dimensions of page format in points
    protected $fw, $fh;     // Dimensions of page format in user unit
    protected $wPt, $hPt;   // Current dimensions in points
    protected $w, $h;       // Current dimensions in user unit
    protected $lMargin;     // Left margin
    protected $tMargin;     // Top margin
    protected $rMargin;     // Right margin
    protected $bMargin;     // Page break margin
    protected $cMargin;     // Cell margin
    protected $x, $y;       // Current position in user unit
    protected $lasth;       // Height of last cell printed
    protected $lineWidth;   // Line width in user unit
    protected $fontpath;    // Path containing fonts
}
?>
