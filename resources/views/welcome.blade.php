<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="css/app.css" rel="stylesheet">
        <link href="css/croppie.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="js/jquery.js"></script>


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="col-md-12">
          <div class="container">

            <div class="centered">
              <div class="title">
                Croppie-Js
              </div>
              <div id="upload-into"></div>
              <meta name="csrf-token" content="{{ csrf_token()}}">
              <button class="btn btn-primary">
                <input type=file value="upload a pic" id="uploading"/>
              </button>
              <button class="btn btn-success upload-result">
                Upload
              </button>

            </div>
          </div>
        </div>
    </body>
    <script src="js/croppie.js"></script>
    <script src="js/main.js"></script>
</html>
