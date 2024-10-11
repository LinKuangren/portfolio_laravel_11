<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/2f9a7f15c2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
  <title>404</title>
 
  <style id="" media="all">
    /* cyrillic-ext */
    @font-face {
      font-family: 'Montserrat';
      font-style: normal;
      font-weight: 900;
      font-display: swap;
      src: url(/fonts.gstatic.com/s/montserrat/v25/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCvC73w0aXpsog.woff2) format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
 
    * {
      -webkit-box-sizing: border-box;
      box-sizing: border-box
    }
 
    body {
      padding: 0;
      margin: 0
    }
 
    #notfound {
      position: relative;
      height: 100vh
    }
 
    #notfound .notfound {
      position: absolute;
      left: 50%;
      top: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%)
    }

    a {
        text-decoration: none;
        color: white;
        font-weight: 500;
        background-color: rgb(110 231 183);
        padding: 1rem 3rem;
        border-radius: 5px;
        border-width: 2px;
        border-color: rgb(16 185 129);
    }

    a:hover {
        color: white;
        background-color: rgb(16 185 129);
        border-width: 2px;
        border-color: rgb(16 185 129);
    }
 
    .notfound {
      max-width: 520px;
      width: 100%;
      line-height: 1.4;
      text-align: center
    }
 
    .notfound .notfound-404 {
      position: relative;
      height: 240px
    }
 
    .notfound .notfound-404 h1 {
      font-family: montserrat, sans-serif;
      position: absolute;
      left: 50%;
      top: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      font-size: 252px;
      font-weight: 900;
      margin: 0;
      color: #262626;
      text-transform: uppercase;
      letter-spacing: -40px;
      margin-left: -20px
    }
 
    .notfound .notfound-404 h1>span {
      text-shadow: -8px 0 0 #fff
    }
 
    .notfound .notfound-404 h3 {
      font-family: cabin, sans-serif;
      position: relative;
      font-size: 16px;
      font-weight: 700;
      text-transform: uppercase;
      color: #262626;
      margin: 0;
      letter-spacing: 3px;
      padding-left: 6px
    }
 
    .notfound h2 {
      font-family: cabin, sans-serif;
      font-size: 20px;
      font-weight: 400;
      text-transform: uppercase;
      color: #000;
      margin-top: 0;
      margin-bottom: 25px
    }
 
    @media only screen and (max-width: 767px) {
      .notfound .notfound-404 {
        height: 200px
      }
 
      .notfound .notfound-404 h1 {
        font-size: 200px
      }
    }
 
    @media only screen and (max-width: 480px) {
      .notfound .notfound-404 {
        height: 162px
      }
 
      .notfound .notfound-404 h1 {
        font-size: 162px;
        height: 150px;
        line-height: 162px
      }
 
      .notfound h2 {
        font-size: 16px
      }
    }
  </style>
  <meta name="robots" content="noindex, follow">
</head>
<body>
  <div id="notfound">
    <div class="notfound">
      <div class="notfound-404">
        <h3>Oops! Page not found</h3>
        <h1><span>4</span><span>0</span><span>4</span></h1>
      </div>
      <h2>nous sommes désolés, mais la page demandée n'a pas été trouvée</h2>
      <a class="text-slate-950 no-underline" href="{{ route('home') }}">Accueil</a>
    </div>
  </div>
</body>
</html>