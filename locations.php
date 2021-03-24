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
    } elseif ($locid == 'map') {
        header("location: map/all");
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
    <title>Locations</title>
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>Locations</h1>

    </div>

    <div class="wrapperlocations">
        <a class="editbuttonnostyle" href="locations/all">
            <div class="wrapperlocationsdiv">All</div>
        </a>
        <?php
        $sql = "SELECT DISTINCT(location_cate) FROM locations";
        $res = $conn->query($sql);
        while ($rows = $res->fetch_assoc()) {
            $Lcate = $rows['location_cate'];
        ?>
            <a class="editbuttonnostyle" href="locations/<?php echo strtolower($Lcate); ?>">
                <div class="wrapperlocationsdiv"><?php echo $Lcate; ?></div>
            </a>
        <?php
        }
        ?>
    </div>

    <div class="userpagepostsflex">
        <div class="userpageposts">
            <table class="userpagepoststable userpagepoststabletd" style="border-collapse: collapse;">
                <a class="editbuttonnostyle" href="locations/map">
                    <div class="noofarts editbuttonusershover">
                        Open Map <i class="fas fa-map" style="font-size:20px"></i>
                    </div>
                </a>
                <div class="searchbar">
                    <input class="searchbar-all" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
                </div>
                <thead>
                    <hr class="userposthr">
                    <hr class="userposthr2">
                </thead>
                <tbody>
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
                    ?>
                        <tr class="target">
                            <td class="widthlocationstable">
                                <div class="locationsflex2">
                                    <img src="img/locations/<?php echo strtolower($Lcate); ?>.jpg" class="locationsimages" alt="Locations-<?php echo $Lcate; ?>">
                                </div>
                            </td>
                            <td>
                                <div class="locationsflex2">
                                    <img src="img/locations/<?php echo strtolower($Lcate); ?>.jpg" class="locationsimagesmobile" alt="Locations-<?php echo $Lcate; ?>">
                                    <h2><?php echo $Lname; ?></h2>
                                    <h4><?php echo $Lcate; ?></h4>
                                    <p><?php echo $Ldesc; ?></p>
                                    <p class="gothere2"><a class="editbuttonnostyle" href="<?php echo $Llink; ?>">Go There</a></p>
                                    <hr class="userposthr" style="width: 100%;">
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



</main>

<?php
require "includes/footer.php";
?>