<?php
require "includes/changebasefolder.inc.php";
require "includes/header.php";

if (isset($_GET['locid'])) {
    $locid = $_GET['locid'];
    if ($locid == 'all') {
        $selectloc = "SELECT * FROM locations;";
    } elseif ($locid == 'veterinary') {
        $selectloc = "SELECT * FROM locations WHERE location_cate='Veterinary';";
    } elseif ($locid == 'store') {
        $selectloc = "SELECT * FROM locations WHERE location_cate='Store';";
    } elseif ($locid == 'shelter') {
        $selectloc = "SELECT * FROM locations WHERE location_cate='Shelter';";
    } elseif ($locid == 'other') {
        $selectloc = "SELECT * FROM locations WHERE location_cate='Other';";
    } else {
        $selectloc = "SELECT * FROM locations;";
    }
} else {
    $selectloc = "SELECT * FROM locations;";
}
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <title>Locations Map</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Locations Map</h1>
    </div>

    <div class="wrapperlocations">
        <a class="editbuttonnostyle" href="locations/map/all">
            <div class="wrapperlocationsdiv">All</div>
        </a>
        <?php
        $sql = "SELECT DISTINCT(location_cate) FROM locations";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $Lcate = $rows['location_cate'];
        ?>
            <a class="editbuttonnostyle" href="locations/map/<?php echo strtolower($Lcate); ?>">
                <div class="wrapperlocationsdiv"><?php echo $Lcate; ?></div>
            </a>
        <?php
        }
        ?>
    </div>

    <style>
        .mapboxgl-popup {
            max-width: 400px;
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
        }
    </style>
    <div class="mapflex">
        <div id="map"></div>
    </div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZW1vbmhvcXVlIiwiYSI6ImNrZHR2czZzNzA3MzEycnBsazJjZmJnY2kifQ.cGlu522TpyfiWTVrhNT6LA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [101.6869, 3.1390],
            zoom: 10.15
        });

        map.addControl(new mapboxgl.NavigationControl());

        map.on('load', function() {
            map.loadImage(
                'img/marker.png',
                // Add an image to use as a custom marker
                function(error, image) {
                    if (error) throw error;
                    map.addImage('custom-marker', image);
                    map.addSource('places', {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': [
                                <?php
                                $sql = "$selectloc";
                                $res = $conn->query($sql);
                                while ($rows = $res->fetch_assoc()) {
                                    $Llng = $rows['location_lng'];
                                    $Llat = $rows['location_lat'];
                                    $Lname = $rows['location_name'];
                                    $Ldesc = $rows['location_desc'];
                                    $Lcate = $rows['location_cate'];
                                    $Llink = $rows['location_link'];
                                ?> {
                                        'type': 'Feature',
                                        'properties': {
                                            'description': '<h3><strong><?php echo $Lname; ?></strong></h3><p><strong><?php echo $Lcate; ?></strong></p><p><?php echo $Ldesc; ?></p><p class="gothere"><a class="editbuttonnostyle" href="<?php echo $Llink; ?>">Go There</a></p>'
                                        },
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [<?php echo $Llng; ?>, <?php echo $Llat; ?>]
                                        }
                                    },
                                <?php } ?>
                            ]
                        }
                    });
                    // Add a layer showing the places.
                    map.addLayer({
                        'id': 'places',
                        'type': 'symbol',
                        'source': 'places',
                        'layout': {
                            'icon-image': 'custom-marker',
                            'icon-allow-overlap': true
                        }
                    });
                }
            );


            // When a click event occurs on a feature in the places layer, open a popup at the
            // location of the feature, with description HTML from its properties.
            map.on('click', 'places', function(e) {
                var coordinates = e.features[0].geometry.coordinates.slice();
                var description = e.features[0].properties.description;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .addTo(map);
            });

            // Change the cursor to a pointer when the mouse is over the places layer.
            map.on('mouseenter', 'places', function() {
                map.getCanvas().style.cursor = 'pointer';
            });

            // Change it back to a pointer when it leaves.
            map.on('mouseleave', 'places', function() {
                map.getCanvas().style.cursor = '';
            });
        });
    </script>


</main>

<?php
require "includes/footer.php";
?>