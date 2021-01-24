<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Plataforma de Optimização de Rotas</title>
    <!--ViewCss-->
    <link href='css/view.css' rel='stylesheet'/>
    <!--Mapbox-->
    <link href="bundle/api.mapbox.com/mapbox.js/v2.2.3/mapbox.css"
          tppabs="http://api.mapbox.com/mapbox.js/v2.2.3/mapbox.css" rel='stylesheet'>
    <link href="bundle/api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css"
          tppabs="http://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css"
          rel='stylesheet'>
    <link href="bundle/api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css"
          tppabs="http://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css"
          rel='stylesheet'>
    <!--Bootstrap-->
    <link href="bundle/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"
          tppabs="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <!--Leaflet-->
    <link href="lib/leaflet-awesome-markers/leaflet.awesome-markers.css"
          tppabs="http://www.kevanahlquist.com/osm_pathfinding/lib/leaflet-awesome-markers/leaflet.awesome-markers.css"
          rel="stylesheet">
    <!--chosen-->
    <link href="lib/chosen/chosen.min.css"
          tppabs="http://www.kevanahlquist.com/osm_pathfinding/lib/chosen/chosen.min.css" rel="stylesheet">

    <style type="text/css">
        #controls {
            /*margin-left: 10px;*/
            /*padding-top: 10px;*/
            float: left;
            display: block;
            color: #000000;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .slider.range {
            display: none;
        }

        .slider-container {
            margin-left: 20px;
        }

        /* slider root element */
        .slider {
            display: inline-block;
            background: #fff url("bundle/raw.githubusercontent.com/jquerytools/jquerytools.github.com/master/media/img/gradient/h30.png") repeat-x 0 0;
            height: 9px;
            position: relative;
            cursor: pointer;
            border: 1px solid #333;
            width: 100px;
            margin-top: 10px;
            margin-left: 10px;
            margin-right: 10px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-box-shadow: inset 0 0 8px #000;
        }

        /* progress bar (enabled with progress: true) */
        .progress {
            height: 9px;
            background-color: #C5FF00;
            display: none;
            opacity: 0.6;
        }

        /* drag handle */
        .handle {
            background: #fff url("bundle/raw.githubusercontent.com/jquerytools/jquerytools.github.com/master/media/img/gradient/h30.png") repeat-x 0 0;
            height: 20px;
            width: 20px;
            top: -7px;
            position: absolute;
            margin-top: 1px;
            border: 1px solid #000;
            cursor: move;
            -moz-box-shadow: 0 0 6px #000;
            -webkit-box-shadow: 0 0 6px #000;
            -moz-border-radius: 14px;
            -webkit-border-radius: 14px;
        }

        /* the input field */
        .range {
            border: 1px inset #ddd;
            font-size: 20px;
            margin: 0 0 0 15px;
            padding: 3px 0;
            text-align: center;
            width: 50px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }
    </style>

    <link href="bundle/netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"
          tppabs="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style=" background-color: #f1f1f1">
<!--Navbar do site-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;P.O.R.</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="asearch.php"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;A. Pesquisa</a></li>
            <li><a href="tsp.php"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;TSP</a></li>
             
            <li><a href="vrptw.php"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;VRPTW</a></li>
        </ul>
    </div>
</nav>

<!--Sidebar controlo do mapa -->
<div class="sidebar">
    <div class="container">
        <!--ESCOLHER ALGORITMO-->
        <span class="label label-default">Escolher Algoritmo</span><br>
        <select name="algo" id="algo-sel" class="algo">
            <option value="" style="display:none;"></option>
            <option value="astar">A*</option>
            <option value="bfs">Breadth First Search</option>
            <option value="gbfs">Greedy Best First Search</option>
            <option value="ucs">Uniform Cost Search</option>
            <option value="dfs">Depth First Search</option>
        </select>
    </div>

    <!--SE E RAPIDA OU LENTA A PROCURA-->
    <div class="container">
        <span class="slider-container"><br>
          <span class="label label-danger">Rápido</span>
            <input type="range" class="slider" name="test" min="-8" max="40" step="8" value="0">
          <span class="label label-info">Lento</span>
          </span>
    </div>
    <!--ESCOLHER PONTO DE PARTIDA-->
    <br>
    <div class="container">
        <span class="label label-default">Partida</span><br>
        <select name="start" id="start-sel" class="loc" style="width: 16.5%">
            <option value="" style="display:none;"></option>
        </select>
    </div>
    <!--ESCOLHER PONTO DE CHEGADA-->
    <br>
    <div class="container">
        <span class="label label-default">Chegada</span><br>
        <select name="goal" id="goal-sel" class="loc" style="width: 16.5%">
            <option value="" style="display:none;"></option>
        </select>
    </div>
    <!--ACTION BUTTONS-->
    <br>
    <div class="container">
        <button id="start-btn" class="btn btn-success btn-xs" disabled>Começar</button>
        <button id="stop-btn" class="btn btn-danger btn-xs" disabled>Parar</button>
        <button id="clear-btn" class="btn btn-warning btn-xs">Limpar</button>
    </div>
</div>
<!--Mapa-->
<div id="map"></div>
<!--Footer-->
<div id="footer">
    <div class="container">
        <p class="text-center">Francisco Neves@IPVC</p>
    </div>
</div>
<!--SCRIPTS-->
<!--Jquery-->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<!--<script src="bundle/cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" tppabs="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
<!--script src="bundle/cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js" tppabs="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"-->
<script src="bundle/cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"
        tppabs="bundle/cdnjs.cloudflare.com/ajax/libs/jquery-tools/1.2.7/jquery.tools.min.js"></script>
<!--Underscore-->
<script src="bundle/cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"
        tppabs="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
<!--Mapbox-->
<script src="bundle/api.mapbox.com/mapbox.js/v2.2.3/mapbox.js"
        tppabs="http://api.mapbox.com/mapbox.js/v2.2.3/mapbox.js"></script>
<script src="bundle/api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"
        tppabs="http://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>
<!--Leaflet-->
<script src="lib/leaflet-awesome-markers/leaflet.awesome-markers.min.js"
        tppabs="http://www.kevanahlquist.com/osm_pathfinding/lib/leaflet-awesome-markers/leaflet.awesome-markers.min.js"></script>
<!--Chosen-->
<script src="lib/chosen/chosen.jquery.min.js"
        tppabs="http://www.kevanahlquist.com/osm_pathfinding/lib/chosen/chosen.jquery.min.js"></script>
<script src="lib/chosen/chosen.proto.min.js"
        tppabs="http://www.kevanahlquist.com/osm_pathfinding/lib/chosen/chosen.proto.min.js"></script>
<!--Bootstrap-->
<script src="bundle/netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"
        tppabs="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!--Scripts Meus-->
<script src="js/presentation.js" tppabs="http://www.kevanahlquist.com/osm_pathfinding/js/presentation.js"></script>
<script src="js/form-setup.js" tppabs="http://www.kevanahlquist.com/osm_pathfinding/js/form-setup.js"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'bundle/www.google-analytics.com/analytics.js'/*tpa=http://www.google-analytics.com/analytics.js*/, 'ga');
    ga('create', 'UA-49474610-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>