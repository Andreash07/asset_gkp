<?php

require __DIR__ . '/vendor/autoload.php';

use Spatie\Browsershot\Browsershot;

Browsershot::html('
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        h1 {
            color: #333;
        }

        .box {
            background: #20b89a;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <h1>Test Browsershot</h1>

    <div class="box">
        PDF berhasil dibuat!
    </div>

</body>
</html>
')
->format('A4')
->showBackground()
->savePdf(__DIR__ . '/test2.pdf');

echo 'PDF berhasil dibuat';
?>