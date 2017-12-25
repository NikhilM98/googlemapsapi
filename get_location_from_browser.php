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
            getLocation()
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(searchMap);
                    navigator.geolocation.getCurrentPosition(showPosition);
                    
                } else { 
                    myLocation.innerHTML = "Geolocation is off";
                }
            }
            
            function showPosition(position) {
                myLocation.innerHTML = "Latitude: " + position.coords.latitude + 
                "<br>Longitude: " + position.coords.longitude;
            }

            function searchMap(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude
                    var coordinates = {lat: lat, lng: lng};
                    var radius = 500;
                    var searchResults = document.getElementById('searchResults');
                    var service = new google.maps.places.PlacesService(searchResults);
                    console.log(service);
                    service.nearbySearch({
                    location: coordinates,
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