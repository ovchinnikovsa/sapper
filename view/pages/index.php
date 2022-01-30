<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/view/assets/css/style.css">
    <title>Tic tac toe</title>
</head>

<header>
    <div class="container-sm">
        <div class="row justify-content-center">
            <h1 class="header-title">Tic tac toe</h1>
        </div>
    </div>
</header>

<body>
<div class="container-sm">
    <form action="/handlers/submit-cell.php" method="post">
        <div class="row justify-content-center">
            <div class="cells">

                <style>
                    .cell:hover:before{
                        content: 'X';
                        font-size: 100px;
                    }
                </style>

                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
                <button type="submit" class="cell" name="number" value=""></button>
            </div>
        </div>
    </form>
</div>
</body>

<script src="/view/assets/js/bootstrap.min.js"></script>

</html>