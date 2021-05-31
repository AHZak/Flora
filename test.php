<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Mapp styles -->
        <link rel="stylesheet" href="https://cdn.map.ir/web-sdk/1.4.2/css/mapp.min.css">
    <link rel="stylesheet" href="https://cdn.map.ir/web-sdk/1.4.2/css/fa/style.css">

    <style type='text/css'>
            @charset "utf-8";
            html, body {
                width: 100%;
                height: 100%;
                padding: 0;
                margin: 0;
            }
            html {
                font-size: 10px;
            }
            body {
                overflow: hidden;
            }
            #app {
                width: 100%;
                height: 100%;
            }
    </style>

    </head>
    <body>
        <div id="app"></div>
        <script type="text/javascript" src="./dist/js/jquery-3.2.1.min.js"></script>
        <!-- Mapp scripts -->
        <script type="text/javascript" src="https://cdn.map.ir/web-sdk/1.4.2/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.map.ir/web-sdk/1.4.2/js/mapp.env.js"></script>
    <script type="text/javascript" src="https://cdn.map.ir/web-sdk/1.4.2/js/mapp.min.js"></script>

    <script>
        $(document).ready(function() {
            var app = new Mapp({
                element: '#app',
                presets: {
                    latlng: {
                            lat: 36.463625410164006,
                            lng:  52.85794973373413,
                    },
                    zoom:15,
                },
                apiKey: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjUwZDViZGYyZTNiYmVhMjIwODNiNzRmMzI3M2Q1ODljOWU2MzU0ZjhlMmQwMDBjYmZhNTRkMTQzNDkxMDYxOTQyN2FmMzQzZjE4N2QwZGM2In0.eyJhdWQiOiIxMzYzNiIsImp0aSI6IjUwZDViZGYyZTNiYmVhMjIwODNiNzRmMzI3M2Q1ODljOWU2MzU0ZjhlMmQwMDBjYmZhNTRkMTQzNDkxMDYxOTQyN2FmMzQzZjE4N2QwZGM2IiwiaWF0IjoxNjE4OTgzNTcxLCJuYmYiOjE2MTg5ODM1NzEsImV4cCI6MTYyMTU3NTU3MSwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.WEx2apjQCZ56KFgqBiw0n1SOGTv5QIPzNuRSa54wkaAexEqhLXgNvUV7qa-7RDjBlYe44SQtJMM8XJvcIOpsmRK1g-ZsUeiAafuWjGJAax_whkDOutwQxXvUL-Zpp0yhbNfBA8tMdFpcJwIWJPZvvOYvE-Eo_TivRT0qDX0nRizQKfwRPFQjzd7h36U1_b2U6Ole_4wPUERRlJAMaQbZAr3sM6L12vJtZEc_7k_a12WDphx13poN6M2PrFA7UkeAMwWg93YN7DEDyza7n3oFNQDXxQTEQvNYZMper4xWnWCKRncoAv3YZh0MCBu-ehq9jZCKWozFodCWNUKTRakoBA'
            });
            app.addLayers();
            app.addFile({
                url: 'map(2).geojson',
                format: 'geojson',
            });

            // Add in a crosshair for the map
            var crosshairIcon = L.icon({
                iconUrl: 'assets/images/maopcon.png',
                iconSize:     [40, 40], // size of the icon
                iconAnchor:   [20, 20], // point of the icon which will correspond to marker's location
            });
            crosshairMarker = new L.marker(app.map.getCenter(), {icon: crosshairIcon, clickable:false});
            crosshairMarker.addTo(app.map);
            // Move the crosshair to the center of the map when the user pans
            app.map.on('move', function(e) {
                crosshairMarker.setLatLng(app.map.getCenter());
            });
            var lat;
            var lng;
            app.map.on('mouseup', function(e) {
                crosshairMarker.setLatLng(app.map.getCenter());
                //console.log(e);
                app.markReverseGeocode({
                    state: {
                        latlng: {
                            lat: e.latlng.lat,
                            lng: e.latlng.lng,
                            
                        },
                    },
                });
                getAddress(e.latlng.lat,e.latlng.lng);
                
            });

        });


        function getAddress(lat,lng) {

            $.post("inc/ajaxRequests/map.php",{lat:lat,lng:lng},function(response) {
                $("#address").val(response);
            });
        }
    </script>
    </body>
    </html>