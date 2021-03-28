<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <title>LAPOR HOAX! - Home</title>
</head>
<body>
    <div id="header">
        <div id="logo">
            <h3><span>NewsNet</span> Lapor </h3>
        </div>

        <nav>
            <a href="#">HOME</a>
            <a href="#">ABOUT</a>
            <a href="{{ route('logins') }}">LOGIN NOW</a>
        </nav>
    </div>

    <div id="container">
        <div id="content">
            <h4>UPDATE NEWS WITH FACT</h4>
            <p>Now you can report any hoax / false information on the internet here</p>
            <button>Read More</button>
        </div>
        <div id="bg">
            <img src="{{ asset('frontend/img/gambar14.jpg') }}" width="100%">
        </div>
    </div>
</body>
</html>