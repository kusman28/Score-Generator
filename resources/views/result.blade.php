<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
    <div class="flex-center position-ref full-height"">
        <div class="content">
            <div class="row">
                <div class="card mr-2">
                    <h5 class="card-header">SCORE</h5>
                    <div class="card-body">
                      <h1 class="card-title"><b>{{$generate->score}}</b></h1>
                    </div>
                </div>
                <div class="card mr-2">
                    <h5 class="card-header">Date/Time</h5>
                    <div class="card-body">
                      <h1 class="card-title"><b>{{$generate->created_at}}</b></h1>
                    </div>
                </div>
                <div class="card mr-2">
                    <h5 class="card-header">Generated Per Day</h5>
                    <div class="card-body">
                      <h1 class="card-title"><b>{{$generate->created_at}} Times</b></h1>
                    </div>
                </div>
            </div>
            <a href="/" class="btn btn-primary mt-4">Generate New</a>
        </div>
    </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>