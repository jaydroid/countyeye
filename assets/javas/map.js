var map;

currentFeature_or_Features = null;

var infowindow = new google.maps.InfoWindow();


function init(){

	/* Call php script<get_json.php> to return counties.json */
    $.getJSON('get_geocodes',function(json){

        showFeature(json); //to display the boundaries



    });

    map = new google.maps.Map(document.getElementById('map'),{

        zoom: 7,

        center: new google.maps.LatLng(0.24,37.70),

        mapTypeId: google.maps.MapTypeId.ROADMAP

    });

}

function showFeature(geojson, style){

    //clearMap();

    currentFeature_or_Features = new GeoJSON(geojson, style || null);

    if (currentFeature_or_Features.type && currentFeature_or_Features.type == "Error"){

        document.getElementById("put_geojson_string_here").value = currentFeature_or_Features.message;

        return;

    }

    if (currentFeature_or_Features.length){

        for (var i = 0; i < currentFeature_or_Features.length; i++){

            if(currentFeature_or_Features[i].length){

                for(var j = 0; j < currentFeature_or_Features[i].length; j++){

                    currentFeature_or_Features[i][j].setMap(map);

                    if(currentFeature_or_Features[i][j].geojsonProperties) {

                        setInfoWindow(currentFeature_or_Features[i][j]);

                    }

                }

            }
            else{

                currentFeature_or_Features[i].setMap(map);

            }

            if (currentFeature_or_Features[i].geojsonProperties) {

                setInfoWindow(currentFeature_or_Features[i]);

            }

        }

    }else{

        currentFeature_or_Features.setMap(map)

        if (currentFeature_or_Features.geojsonProperties) {

            setInfoWindow(currentFeature_or_Features);

        }

    }
   // document.getElementById("feature").value = JSON.stringify(geojson);

}

function rawGeoJSON(){

    // clearMap();

    currentFeature_or_Features = new GeoJSON(JSON.parse(document.getElementById("put_geojson_string_here").value));

    if (currentFeature_or_Features.length){

        for (var i = 0; i < currentFeature_or_Features.length; i++){

            if(currentFeature_or_Features[i].length){

                for(var j = 0; j < currentFeature_or_Features[i].length; j++){

                    currentFeature_or_Features[i][j].setMap(map);

                    if(currentFeature_or_Features[i][j].geojsonProperties) {

                        setInfoWindow(currentFeature_or_Features[i][j]);

                    }

                }

            }

            else{

                currentFeature_or_Features[i].setMap(map);

            }

            if (currentFeature_or_Features[i].geojsonProperties) {

                setInfoWindow(currentFeature_or_Features[i]);

            }

        }

    }else{

        currentFeature_or_Features.setMap(map);

        if (currentFeature_or_Features.geojsonProperties) {

            setInfoWindow(currentFeature_or_Features);

        }

    }

}


function setInfoWindow (feature) {

    google.maps.event.addListener(feature, "click", function(event) {

        var county_name=this.geojsonProperties["COUNTY_NAM"];

        var content = "<div id='infoBox'><strong>"+county_name+ "  COUNTY </strong><br />";

        content += "County Stats</div>";

        infowindow.setContent(content);

        infowindow.position = event.latLng;

        infowindow.open(map);

    });

}



