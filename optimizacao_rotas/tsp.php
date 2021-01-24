<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <title>Plataforma de Optimização de Rotas</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no'/>
    <!--ViewCss-->
    <link href='css/view.css' rel='stylesheet'/>
    <!--Jquery -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <!--Bootstrap-->
    <link href="bundle/netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"
          tppabs="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="bundle/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"
          tppabs="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <!--Mapbox -->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.1/mapbox-gl.css' rel='stylesheet'/>
    <!--Turf -->
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
</head>

<body style=" background-color: #f1f1f1">
<!--Navbar do site-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;P.O.R.</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="asearch.php"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;A. Pesquisa</a></li>
            <li class="active"><a href="tsp.php"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;TSP</a></li>
             
            <li><a href="vrptw.php"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;VRPTW</a></li>
        </ul>
    </div>
</nav>

<!--Sidebar controlo do mapa -->
<div class="sidebar">
    <div class="container">
        <!--apresentar dados do json-->
        <span class="label label-default">Resultados</span><br><br>
         <table border="1">
             <!--<tr><td>Rotas :</td><td id="routes"></td></tr>
             <tr><td>Paragens :</td><td id="stops"></td></tr>-->
             <!--<tr><td>Trajeto :</td><td id="distances"></td></tr>
             <tr><td>Duração :</td><td id="durations"></td></tr>-->
             <tr><td>Trajeto:</td><td id="distances1">&nbsp;</td></tr>
             <tr><td>Duração:</td><td id="durations1">&nbsp;</td></tr>
         </table>
    </div>
</div>

<div id='map' class='contain'></div>
<!--Footer-->
<div id="footer">
    <div class="container">
        <p class="text-center">Francisco Neves@IPVC</p>
    </div>
</div>
<!--SCRIPTS-->
<script src='js/routing/tsp.js'></script>
<!--Jquery-->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<!--Bootstrap-->
<script src="bundle/netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"
        tppabs="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>