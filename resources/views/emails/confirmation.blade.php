<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <link rel="stylesheet" href="load/load.css">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <style>
        /* Reset CSS */
        body, h1, p {
            margin: 0;
            padding: 0;
        }

        /* Container Style */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Title Style */
        .title {
            font-size: 28px;
            font-weight: bold;
            color: #0d47a1; /* Blue color */
            margin-top: 20px;
            text-align: center;
        }

        /* Soft Style */
        .soft {
            color: #000; /* Black color */
        }

        /* Body Style */
        .body {
            font-size: 16px;
            color: #000; /* Black color */
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <center>
            <h1 style="color: #00c3ff;">Humma<span class="soft">soft</span></h1>
        </center>
        <h2>Hello{{ $aproval->name }}</h2>
        <h4>Selamat anda di terima akun anda sudah bisa di gunakan sekarang</h4>

    </div>
</body>
</html>
