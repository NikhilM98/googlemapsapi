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
        <script>
            var geocoder = new google.maps.Geocoder();
            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder);
            });

            function geocodeAddress(geocoder) {
                var address = document.getElementById('address').value;
                geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    console.log(results[0].place_id);
                    console.log(results[0].formatted_address);
                } else {
                    console.log('Geocoder is broken: ' + status);
                }
                });
            }
        </script>
    </body>
</html>