<!DOCTYPE html>
<html>
<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
    <!--ViewCss-->
    <link href='css/view.css' rel='stylesheet'/>
    <!--Jquery -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <!--Bootstrap-->
    <link href="bundle/netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"
          tppabs="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="bundle/netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"
          tppabs="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.css' rel='stylesheet' />
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
            <li><a href="tsp.php"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;TSP</a></li>
             
            <li class="active"><a href="vrptw.php"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;VRPTW</a></li>
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
             <tr><td>Trajeto:</td><td id="distances"></td></tr>
             <tr><td>Durações:</td><td id="durations"></td></tr>
         </table>
    </div>
</div>

<!-- MapBox-->
<div id='map'></div>

<!--Footer-->
<div id="footer">
    <div class="container">
        <p class="text-center">Francisco Neves@IPVC</p>
    </div>
</div>

<script type='text/javascript'>
L.mapbox.accessToken = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXFhYTA2bTMyeW44ZG0ybXBkMHkifQ.gUGbDOPUN1v1fTs5SeOR4A';
var map = L.mapbox.map('map');

L.mapbox.tileLayer('mapbox.streets').addTo(map);

//$.getJSON('solution.json', function(geojson) {
//OU
$.getJSON('http://localhost:8080/vrp', function(geojson) {
    var geojsonLayer = L.mapbox.featureLayer(geojson).addTo(map);
    var bounds = geojsonLayer.getBounds();
    if (bounds.isValid()) {
        map.fitBounds(geojsonLayer.getBounds());
    } else {
        map.setView([0, 0], 2);
    }
    geojsonLayer.eachLayer(function(l) {
        showProperties(l);
    });
});

function showProperties(l) {
    var properties = l.toGeoJSON().properties;
    var table = document.createElement('table');
    table.setAttribute('class', 'marker-properties display')
    for (var key in properties) {
        var tr = createTableRows(key, properties[key]);
        table.appendChild(tr);
        //testes
        console.log(key, properties[key]);
        //document.getElementById("demo").innerHTML += key + ":" + properties[key] + "<br>";
        //if (key == "route") {document.getElementById("routes").innerHTML += Math.ceil(properties[key]);}
        //if (key == "stop") {document.getElementById("stops").innerHTML += properties[key];}
        var kms = Math.ceil(properties[key] *0.001 * 100) / 100;
        var times = Math.ceil(properties[key] /60);
        if (key == "distance") {document.getElementById("distances").innerHTML += "&nbsp;"+ kms + "&nbsp;km <br>";}
        if (key == "duration") {document.getElementById("durations").innerHTML += "&nbsp;"+ times + "&nbsp;mins <br>";} 
    }
    if (table) l.bindPopup(table);
}

function createTableRows(key, value) {
    var tr = document.createElement('tr');
    var th = document.createElement('th');
    var td = document.createElement('td');
    key = document.createTextNode(key);
    value = document.createTextNode(value);

    th.appendChild(key);
    td.appendChild(value);
    tr.appendChild(th);
    tr.appendChild(td);
    return tr
}
</script>

</body>
</html>