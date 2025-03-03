<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Absensi</title>
</head>

<body>
    <h2>QR Code untuk Absensi</h2>
    <img
        src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate(url('/absensi/' . $params))) }}" />
    <p>Scan QR Code untuk check-in atau check-out</p>
</body>

</html>
