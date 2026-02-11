<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../config.php';

if (!isset($_GET['lesson_id'])) {
    die('Invalid request.');
}
$lesson_id = intval($_GET['lesson_id']);

// Fetch student info (assuming session)
$student_name = isset($_settings) ? $_settings->userdata('firstname') . ' ' . $_settings->userdata('lastname') : 'Student Name';
$lesson_title = '';
$qry = $conn->query("SELECT title FROM lessons WHERE id = $lesson_id");
if ($qry && $row = $qry->fetch_assoc()) {
    $lesson_title = $row['title'];
} else {
    $lesson_title = 'Lesson';
}
$date = date('F d, Y');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Completion</title>
    <!-- Inter font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            background: #f6f6fa; 
            font-family: 'Inter', Arial, sans-serif;
        }
        .cert-container {
            width: 900px;
            margin: 40px auto;
            border: 8px solid #222;
            border-radius: 32px;
            padding: 48px 70px 80px 70px;
            background: #fff;
            box-sizing: border-box;
            text-align: center;
            position: relative;
            box-shadow: 0 8px 32px rgba(44,62,80,0.10);
        }
        .cert-badge {
            margin: 0 auto 1.5em auto;
            width: 40px;
        }
        .cert-title {
            font-family: 'Inter', Arial, sans-serif;
            font-size: 2.7em;
            color: #3a3a3a;
            font-weight: 700;
            letter-spacing: 2px;
            margin-top: 30px;
            margin-bottom: 0.6em;
        }
        .cert-course {
            font-family: 'Inter', Arial, sans-serif;
            font-size: 2.2em;
            color: #2d2d2d;
            font-weight: 600;
            margin: 0.5em 0 0.2em 0;
            letter-spacing: 1px;
        }
        .cert-name {
            font-family: 'Inter', Arial, sans-serif;
            font-size: 1.8em;
            color: #4a4a4a;
            font-weight: 600;
            margin: 0.5em 0 1.2em 0;
            letter-spacing: 1px;
        }
        .cert-desc {
            font-size: 1.15em;
            color: #555;
            margin: 1.5em 0 2.2em 0;
            font-style: italic;
        }
        .cert-footer {
            position: absolute;
            left: 70px;
            right: 70px;
            bottom: 48px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .cert-sign {
            font-size: 1.1em;
            color: #555;
            text-align: left;
            font-family: 'Inter', Arial, sans-serif;
        }
        .cert-sign img {
            margin-bottom: 2px;
            filter: grayscale(1);
        }
        .cert-date {
            font-size: 1.1em;
            color: #888;
            text-align: right;
            font-family: 'Inter', Arial, sans-serif;
        }
        .cert-id {
            position: absolute;
            right: 70px;
            top: 48px;
            font-size: 0.95em;
            color: #bbb;
            font-family: 'Inter', Arial, sans-serif;
        }
        #print-btn {
            font-family: 'Inter', Arial, sans-serif;
            font-size: 1.2em;
            padding: 12px 36px;
            border-radius: 30px;
            border: none;
            background: linear-gradient(90deg, #6a82fb 0%, #fc5c7d 100%);
            color: #fff;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(44,62,80,0.10);
            cursor: pointer;
            transition: background 0.3s;
        }
        #print-btn:hover {
            background: linear-gradient(90deg, #fc5c7d 0%, #6a82fb 100%);
        }
        @media print {
            #print-btn { display: none; }
            body { background: #fff; }
            .cert-container { box-shadow: none; }
        }
    </style>
</head>
<body>
    <div class="cert-container">
        <div class="cert-id">Certificate ID: <?= strtoupper(substr(md5($student_name.$lesson_title.$date),0,10)) ?></div>
        <img src="https://toolkit africa.co.ke/wp/wp-content/uploads/2024/10/logo.jpeg" class="cert-badge" alt="Certificate Badge" />
        <div class="cert-title">Certificate of Completion</div>
        <div class="cert-course"><?= htmlspecialchars($lesson_title) ?></div>
        <div class="cert-name"><?= htmlspecialchars($student_name) ?></div>
        <div class="cert-desc">The bearer of this certificate has successfully completed the course above.</div>
        <div class="cert-footer">
            <div class="cert-sign">
                <img src="https://img.freepik.com/premium-vector/signature-documents-white-background-hand-drawn-business-autograph-calligraphy-lettering-vector-illustration_81863-11822.jpg?ga=GA1.1.363956532.1747578705&semt=ais_hybrid&w=740" height="40" style="display:block;" alt="Signature" />
                <div>Founders, Toolkit Africa</div>
            </div>
            <div class="cert-date">Issued: <?= $date ?></div>
        </div>
    </div>
    <div style="text-align:center; margin: 30px;">
        <button id="print-btn" onclick="handleCertificateDownload()">Download/Print Certificate</button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    function handleCertificateDownload() {
        if (isMobile()) {
            // Use html2pdf for mobile
            var element = document.querySelector('.cert-container');
            var opt = {
                margin:       0,
                filename:     'certificate.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'pt', format: 'a4', orientation: 'landscape' }
            };
            html2pdf().set(opt).from(element).save();
        } else {
            // Use print for desktop
            window.print();
        }
    }
    </script>
</body>
</html>
