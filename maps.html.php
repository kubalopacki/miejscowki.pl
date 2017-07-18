<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
                    <label class="col-md-4 control-label" for="longitude">Długość geograficzna</label>
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

                <!--
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="foto_input">Zdjęcie</label>
                                    <div class="col-md-4">
                                        <input id="foto_input" name="foto_input" class="input-file" type="file">
                                    </div>
                                </div>
                                -->

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

    var global_marker;

    function myMap() {
        var myCenter = new google.maps.LatLng(52.634424, 19.287858);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 6, disableDefaultUI: true, mapTypeControl: true};
        var map = new google.maps.Map(mapCanvas, mapOptions);

        <!-- To musi wykonać się dla wszystkich rekordów w tabeli skateparki -->

        var places = <?php echo json_encode($places) ?>;

        for (var i = 0; i < places.length; ++i) {

            var place = places[i];
            var position = new google.maps.LatLng(place.latitude, place.longitude);
            var marker = new google.maps.Marker({position: position});
            marker.setMap(map);
            marker.description = place.description;
            marker.addListener('click', function () {
                var infowindow = new google.maps.InfoWindow({
                    content: this.description
                });
                infowindow.open(map, this);
            });
        }

        <!-- Funkcja odpowiedzialna za umieszczanie markera na mapie -->

        google.maps.event.addListener(map, 'click', function (event) {
            if (global_marker) {
                global_marker.setPosition(event.latLng)
            } else {

                global_marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/micons/blue-pushpin.png',
                    shadow: 'http://maps.google.com/mapfiles/ms/micons/pushpin_shadow.png'
                });
            }

            document.getElementById("latitude").value = event.latLng.lat();
            document.getElementById("longitude").value = event.latLng.lng();
        });

    }


</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCYIp-DMH1HR4QU_xfJsMIE7Sd8nlPFTE&callback=myMap"></script>

</body>
</html>
