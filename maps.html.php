<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Maps</title>
    <link href="map_styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</head>

<body>
<div id="content">
    <div class="map" id="map" style="width:80%;height:800px"></div>
    <div class="form" style="width: 20%">
        <form class="form-horizontal" action="/add_spot.php" method="post">
            <fieldset>

                <!-- Form Name -->
                <legend align="left">Nowa miejscówka</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="latitude">Szerokość geograficzna</label>
                    <div class="col-md-8">
                        <input id="latitude" name="latitude" type="text" placeholder="" class="form-control input-md"
                               readonly>

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="longitude">Wysokość geograficzna</label>
                    <div class="col-md-8">
                        <input id="longitude" name="longitude" type="text" placeholder="" class="form-control input-md"
                               readonly>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="description">Opis</label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="description" name="description"
                                  placeholder="Opisz skatepark, napisz czy jest oświetlony, kryty, betonowy, ogrodzony itp."></textarea>
                    </div>
                </div>


                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="foto_input">Zdjęcie</label>
                    <div class="col-md-4">
                        <input id="foto_input" name="foto_input" class="input-file" type="file">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="add_spot"></label>
                    <div class="col-md-4">
                        <button id="add_spot" name="add_spot" class="btn btn-primary" type="submit">Dodaj nową
                            miejscówkę!
                        </button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</div>

<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(52.634424, 19.287858);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 6, disableDefaultUI: true, mapTypeControl: true};
        var map = new google.maps.Map(mapCanvas, mapOptions);


        var skateparkSwidnica = new google.maps.LatLng(50.833325, 16.481564)
        var marker = new google.maps.Marker({position: skateparkSwidnica});
        marker.setMap(map);


        google.maps.event.addListener(marker, 'click', function () {
            var infowindow = new google.maps.InfoWindow({
                content: "Betonowy skatepark w Świdnicy"
            });
            infowindow.open(map, marker);
        });

        google.maps.event.addListener(map, 'click', function (event) {
            placeMarker(map, event.latLng);
        });

    }

    function placeMarker(map, location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        document.getElementById("latitude").value = location.lat()
        document.getElementById("longitude").value = location.lng()
    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCYIp-DMH1HR4QU_xfJsMIE7Sd8nlPFTE&callback=myMap"></script>

</body>
</html>
