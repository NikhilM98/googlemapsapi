<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>ScrollMagic Demo - The Basics</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj6mdf1-Un64guiGoDmy7EcbgwTxq5dMI&libraries=places"></script>
    </head>
    <body>

        <div>
            <input id="address" type="textbox" placeholder="Enter Address">
            <input id="submit" type="button" value="Submit">
        </div>
        <div id="searchResults">
            </div>
        <script>

            initGeocode()

            function initGeocode() {
                var geocoder = new google.maps.Geocoder();
                document.getElementById('submit').addEventListener('click', function() {
                    geocodeAddress(geocoder);
                });
            }

            function geocodeAddress(geocoder) {
                var address = document.getElementById('address').value;
                geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    var lat = results[0].geometry.location.lat();
                    var lng = results[0].geometry.location.lng();
                    console.log(results[0].formatted_address);
                    var radius = 500;
                    searchMap(lat, lng, radius);
                } else {
                    console.log('Geocoder is broken: ' + status);
                }
                });

                function searchMap(lat, lng, radius) {
                    var searchResults = document.getElementById('searchResults');
                    var service = new google.maps.places.PlacesService(searchResults);
                    console.log(service);
                    service.nearbySearch({
                    location: {lat: lat, lng: lng},
                    radius: radius,
                    type: ['store']
                    }, getPlaceInfo);
                }
            
                function getPlaceInfo(results, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        console.log(results);
                        for (var i = 0; i < results.length; i++) {
                            console.log(results[i]);
                        }
                    }
                }
            }
        </script>
    </body>
</html>