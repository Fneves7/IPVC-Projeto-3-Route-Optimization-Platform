<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Plataforma de Optimização de Rotas</title>
    <!--Bootstrap-->
    <link href="bundle/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"
          tppabs="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="bundle/netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"
          tppabs="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #A9A9A9;
            padding-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body style="background-color: #f1f1f1">
<div class="jumbotron text-center" style="background-color: #A9A9A9">
    <h1 style="color: white"><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;
        Plataforma de Optimização de Rotas
    </h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 text-center">
            <a href="asearch.php" class="btn btn-default btn-lg btn-block" role="button">Algoritmos de pesquisa</a>
            <a href="tsp.php" class="btn btn-default btn-lg btn-block" role="button">Traveling Salesman Problem</a>
            <a href="vrptw.php" class="btn btn-default btn-lg btn-block" role="button">Vehicle Routing Problem: Time Windows</a>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        <p class="text-center">Francisco Neves@IPVC</p>
    </div>
</div>

<!--SCRIPTS-->
<!--Jquery-->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src="bundle/cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"
        tppabs="bundle/cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"></script>
<!--Bootstrap-->
<script src="bundle/netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"
        tppabs="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>