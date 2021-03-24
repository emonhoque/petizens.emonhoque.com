<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Delete Locations</title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Delete Locations</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>
    <div class="scrollll">
        <table class="listarticles">
            <tr>
                <th> ID </th>
                <th> Longitude </th>
                <th> Latitude </th>
                <th> Name </th>
                <th> Description </th>
                <th> Category </th>
                <th class="last3cells"> Link </th>
                <th class="last3cells"> Delete </th>
            </tr>
            <?php
            $sql = "SELECT * FROM locations;";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $Lid = $rows['location_id'];
                $Llng = $rows['location_lng'];
                $Llat = $rows['location_lat'];
                $Lname = $rows['location_name'];
                $Ldesc = $rows['location_desc'];
                $Lcate = $rows['location_cate'];
                $Llink = $rows['location_link'];
            ?>
                <tr class="target">
                    <td> <?php echo $Lid; ?> </td>
                    <td> <?php echo $Llng; ?> </td>
                    <td> <?php echo $Llat; ?> </td>
                    <td> <?php echo $Lname; ?> </td>
                    <td width="300px"> <?php echo $Ldesc; ?> </td>
                    <td> <?php echo $Lcate; ?> </td>
                    <td class="last3cells"> <a class="link-art" href="<?php echo $Llink; ?>">LINK</a> </td>
                    <td class="last3cells"> <a class="delete-art" href="includes/deletelocdetails.inc?id=<?php echo $Lid; ?>">DELETE</a> </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <p class="backtoadminpanel"> <a href="locations">Go Back to Locations! </a></p>


</main>

<script>
    function locfunction() {
        var input = document.getElementById("searchloc");
        var filter = input.value.toLowerCase();
        var nodes = document.getElementsByClassName('target');

        for (i = 0; i < nodes.length; i++) {
            if (nodes[i].innerText.toLowerCase().includes(filter)) {
                nodes[i].style.display = "table-row";
            } else {
                nodes[i].style.display = "none";
            }
        }
    }
</script>

<?php
require "includes/footer.php";
?>