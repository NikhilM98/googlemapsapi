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

            <button onclick="getLocation()">Try It</button>
            
            <div id="myLocation"></div>
            <div id="searchResults">
            </div>
            
            <script>
            var myLocation = document.getElementById("myLocation");
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(getGPSCoordinates);
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else { 
                    myLocation.innerHTML = "Geolocation Service not Available";
                }
            }
            
            function showPosition(position) {
                myLocation.innerHTML = "Latitude: " + position.coords.latitude + 
                "<br>Longitude: " + position.coords.longitude;
            }

            function getGPSCoordinates(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var radius = 500;
                searchMap(lat, lng, radius);
            }

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
                
            </script>
            
    </body>
</html>