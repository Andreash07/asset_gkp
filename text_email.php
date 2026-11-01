
<?php

error_reporting(E_ALL);

$host = 'mail.gkp.or.id';
$port = 587;

function readSmtpResponse($socket)
{
    $lines = [];

    while (($line = fgets($socket, 515)) !== false) {
        $line = rtrim($line, "\r\n");
        $lines[] = $line;
        echo $line . PHP_EOL;

        // Respons SMTP berakhir dengan tiga digit dan spasi.
        if (preg_match('/^\d{3} /', $line)) {
            return $lines;
        }
    }

    throw new RuntimeException(
        'Respons SMTP tidak lengkap: ' .
        json_encode(stream_get_meta_data($socket))
    );
}

$socket = stream_socket_client(
    "tcp://{$host}:{$port}",
    $errno,
    $errstr,
    30
);

if (!$socket) {
    die("Koneksi gagal: $errno - $errstr\n");
}

stream_set_timeout($socket, 30);

try {
    echo "=== Banner ===\n";
    readSmtpResponse($socket);

    echo "\n=== EHLO ===\n";
    fwrite($socket, "EHLO localhost\r\n");
    $ehlo = readSmtpResponse($socket);

    $hasStartTls = false;

    foreach ($ehlo as $line) {
        if (preg_match('/^250[- ]STARTTLS\b/i', $line)) {
            $hasStartTls = true;
        }
    }

    if (!$hasStartTls) {
        throw new RuntimeException(
            'Server tidak mengiklankan STARTTLS.'
        );
    }

    echo "\n=== STARTTLS ===\n";
    fwrite($socket, "STARTTLS\r\n");
    $response = readSmtpResponse($socket);

    if (!preg_match('/^220(?: |$)/', end($response))) {
        throw new RuntimeException(
            'Server tidak siap memulai TLS.'
        );
    }

    echo "\n=== TLS handshake ===\n";

    $tls = stream_socket_enable_crypto(
        $socket,
        true,
        STREAM_CRYPTO_METHOD_TLS_CLIENT
    );

    var_dump($tls);

} catch (Throwable $e) {
    echo "\nERROR: " . $e->getMessage() . PHP_EOL;
} finally {
    fclose($socket);
}
