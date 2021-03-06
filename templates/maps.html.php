<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myspots!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../assets/map_styles.css" rel="stylesheet">
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
            <div class="map" id="map" style="width:100%"></div>
        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <form enctype="multipart/form-data" class="form-horizontal" action="../controller/add_spot.php"
                  method="post">
                <fieldset>

                    <!-- Form Name -->
                    <legend align="left">New skatepark <a class="howto" href="../templates/how_to.html"> (how to)</a>
                    </legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="latitude">Latitude</label>
                        <div class="col-md-8">
                            <input id="latitude" name="latitude" class="form-control input-md readonly" required
                                   data-readonly>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="longitude">Longitude</label>
                        <div class="col-md-8">
                            <input id="longitude" name="longitude" class="form-control input-md readonly" required
                                   data-readonly>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="city">City</label>
                        <div class="col-md-8">
                            <input id="city" name="city" class="form-control input-md" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="street">Adress</label>
                        <div class="col-md-8">
                            <input id="street" name="street" class="form-control input-md" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="link">Link</label>
                        <div class="col-md-8">
                            <input id="link" name="link" class="form-control input-md">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Description</label>
                        <div class="col-md-8">
                        <textarea class="form-control" id="description" name="description"
                                  placeholder="Write something about skatepark you are adding. Is it indoor park? Do you have to pay to use it and how much? Is a helmet required etc."></textarea>
                        </div>
                    </div>
                    <!--

                                    <ZDJECIA>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="image">Image</label>
                                            <div class="col-md-8">
                                                <input id="image" name="image" class="input-file" type="file">
                                            </div>
                                        </div>

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
                            <button onclick="addSpot()" id="add_spot"
                                    name="add_spot" class="btn btn-primary"
                                    type="submit">
                                Add new skatepark!
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<!-- Sczegóły które wyświetlają się po kliknięciu na interesujący nas skatepark(marker) -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend id="skatepark_info" align="left">Skatepark:</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="adress">City</label>
                        <div class="col-md-4">
                            <input id="city_info" name="city_info" type="text" placeholder=""
                                   class="form-control input-md info" readonly>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="adress">Adress</label>
                        <div class="col-md-4">
                            <input id="street_info" name="street_info" type="text"
                                   class="form-control input-md info" readonly>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description_info">Description</label>
                        <div class="col-md-4">
                        <textarea id="description_info" name="description_info"
                                  class="form-control input-md info textarea" readonly></textarea>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="latitude">Latitude</label>
                        <div class="col-md-4">
                            <input id="latitude_info" name="latitude_info" type="text"
                                   class="form-control input-md info" readonly>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="longitude_info">Longitude</label>
                        <div class="col-md-4">
                            <input id="longitude_info" name="longitude_info" type="text" placeholder=""
                                   class="form-control input-md info" readonly>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="link_info">Link</label>
                        <div class="col-md-4">
                            <a id="link_info" name="link_info"
                               class="form-control info text-left"
                               readonly></a>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="locals">Locals you can contact with if you are going
                            to visit this spot.</label>
                        <div class="col-md-4">
                            <div id="locals" class="form-control input-md info" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="imlocal"></label>
                            <div class="col-md-4">
                                <a href="/i_am_local?id=" id="imlocal" name="imlocal"
                                   class="btn btn-primary disabled">I
                                    am local!</a>
                            </div>
                        </div>


                </fieldset>
            </form>

        </div>
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
        var infowindow;

        for (var i = 0; i < places.length; ++i) {

            var place = places[i];
            var position = new google.maps.LatLng(place.latitude, place.longitude);
            var marker = new google.maps.Marker({position: position});
            marker.setMap(map);
            marker.place = place;
            marker.addListener('click', function () {
                if (infowindow) {
                    delete infowindow;
                    infowindow.close();
                }
                infowindow = new google.maps.InfoWindow({
                    content: this.place.city
                })
                ;
                infowindow.open(map, this);

                function showLocal(local, fb_link) {
                    var link = document.createElement('a');
                    link.setAttribute('href', local.fb_link);
                    link.setAttribute('class', 'local_member');
                    link.setAttribute('target', '_blank');
                    link.innerHTML = local.name_surname;
                    document.getElementById("locals").appendChild(link);
                }


                console.log(this);
                document.getElementById("imlocal").setAttribute('class', "btn btn-primary");
                document.getElementById("imlocal").setAttribute('href', "/i_am_local?id=" + this.place.skatepark_id);
                document.getElementById("description_info").value = this.place.description;
                document.getElementById("latitude_info").value = this.position.lat();
                document.getElementById("longitude_info").value = this.position.lng();
                document.getElementById("city_info").value = this.place.city;
                document.getElementById("locals").innerHTML = '';
                this.place.locals.forEach(showLocal);
                document.getElementById("street_info").value = this.place.street;
                if(this.place.link) {
                    document.getElementById("link_info").innerHTML = this.place.link;
                    document.getElementById("link_info").setAttribute('target', '_blank');
                    document.getElementById("link_info").setAttribute('href', this.place.link);
                }
                document.getElementById("image_info").setAttribute('src', this.place.url);
            });
        }

        <!-- Funkcja odpowiedzialna za umieszczanie markera na mapie, oraz -->
        <!-- wypełnienie pól szczegółów pod mapą, po kliknięciu na marker -->

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

    function addSpot() {
        alert("Your spot will be available as soon as we approve it :)");
    }


</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCYIp-DMH1HR4QU_xfJsMIE7Sd8nlPFTE&callback=myMap"></script>

<?php include 'footer.html.php' ?>

</body>
</html>
