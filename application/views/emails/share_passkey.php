<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Verifikasi</title>
</head>

<body style="
    margin:0;
    padding:0;
    background:#f3f6f9;
    font-family:Arial, Helvetica, sans-serif;
">

<table width="100%" cellpadding="0" cellspacing="0" border="0"
       style="background:#f3f6f9; padding:40px 15px;">

    <tr>
        <td align="center">

            <!-- MAIN CONTAINER -->
            <table width="600" cellpadding="0" cellspacing="0" border="0"
                   style="
                       max-width:600px;
                       width:100%;
                       background:#ffffff;
                       border-radius:12px;
                       overflow:hidden;
                       box-shadow:0 4px 18px rgba(0,0,0,0.08);
                   ">

                <!-- HEADER -->
                <tr>
                    <td align="center"
                        style="
                            padding:28px 30px;
                            background:#ffffff;
                            border-bottom:1px solid #eeeeee;
                        ">

                        <img
                            src="<?= $logoUrl;?>"
                            alt="GKP"
                            style="
                                max-width:180px;
                                max-height:60px;
                                display:block;
                            "
                        >

                    </td>
                </tr>


                <!-- CONTENT -->
                <tr>
                    <td style="padding:40px 40px 30px 40px;">

                        <h1 style="
                            margin:0 0 15px 0;
                            color:#1f2937;
                            font-size:24px;
                            font-weight:600;
                            display: none;
                        ">
                            Passkey Access- Data Aset GKP
                        </h1>

                        <p style="
                            margin:0 0 20px 0;
                            color:#4b5563;
                            font-size:15px;
                            line-height:1.7;
                        ">
                            Sampurasun,
                        </p>

                        <p style="margin:0 0 25px 0; color:#4b5563; font-size:15px; line-height:1.7;">
                            Kami mengirimkan Passkey Access untuk membuka file lampiran pada Data Aset GKP.<br>
                            Silakan gunakan Passkey di bawah ini.
                        </p>


                        <!-- OTP BOX -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center">

                                    <div style="
                                        display:inline-block;
                                        background:#f0f7ff;
                                        border:1px solid #d7eaff;
                                        border-radius:10px;
                                        padding:18px 35px;
                                        color:#1769aa;
                                        font-size:36px;
                                        font-weight:bold;
                                        letter-spacing:10px;
                                    ">
                                        <?= $passkey; ?>
                                    </div>

                                </td>
                            </tr>
                        </table>
                        <!-- SECURITY NOTICE -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0"
                               style="margin-top:30px;">

                            <tr>
                                <td style="
                                    background:#fff8e6;
                                    border-left:4px solid #f59e0b;
                                    padding:14px 16px;
                                    border-radius:5px;
                                ">

                                    <p style="
                                        margin:0;
                                        color:#92400e;
                                        font-size:13px;
                                        line-height:1.6;
                                    ">

                                        <strong>Security Notice</strong><br>
                                        JANGAN PERNAH membagikan kode Passkey Access ini kepada siapa pun.<br>
                                        Tim kami tidak akan pernah meminta kode Passkey Access, kata sandi, atau informasi keamanan akun Anda.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <!-- FOOTER -->
                <tr>
                    <td align="center"
                        style="padding:22px 30px;background:#f9fafb;border-top:1px solid #eeeeee;">

                        <p style="margin:0;color:#9ca3af;font-size:12px;
                            line-height:1.6;
                        ">
                            Email ini dikirim secara otomatis.<br>Mohon untuk tidak membalas email ini.
                        </p>

                        <p style="
                            margin:8px 0 0 0;
                            color:#9ca3af;
                            font-size:12px;
                        ">
                            &copy; <?=date('Y');?> Gereja Kristen Pasundan. Hak cipta dilindungi.
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>

</table>

</body>
</html>