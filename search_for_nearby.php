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
        <div id="searchResults">
        </div>

        <script>         
        searchMap()   
                function searchMap() {
                    var searchResults = document.getElementById('searchResults');
                    var pyrmont = {lat: -33.867, lng: 151.195};
                    var service = new google.maps.places.PlacesService(searchResults); //map
                    console.log(service);
                    service.nearbySearch({
                    location: pyrmont,
                    radius: 500,
                    type: ['store']
                    }, getPlaceInfo);
                }
            
                function getPlaceInfo(results, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {
                            console.log(results[i]);
                        }
                    }
                }
            
                </script>
    </body>
</html>