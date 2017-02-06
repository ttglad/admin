<!DOCTYPE html>
<html>
    <head>
        <title>权限不足</title>

        <meta http-equiv="refresh" content="3;url={{ url()->previous() }}">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }

            .url {
                font-size: 36px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">权限不足.</div>
            </div>
            <div class="">
                <div class="url">3秒之后会自动跳转，手动跳转到<a href="{{ url()->previous() }}">前一页</a></div>
            </div>
        </div>
    </body>
</html>
