<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<title> Animals Breeds </title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Animals Breeds</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>
    <div class="scrollll">
        <table class="listarticles">
            <tr>
                <th> Breed ID </th>
                <th> Category </th>
                <th> Name </th>
                <th> Color </th>
                <th> Details </th>
                <th> Approved? </th>
                <th> Submit By </th>
                <th> Image </th>
                <th class="last3cells"> Edit </th>
                <th class="last3cells"> Approval </th>
                <th class="last3cells"> Delete </th>
            </tr>
            <?php
            $sql = "SELECT * FROM breed";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ID = $rows['breed_id'];
                $Category = $rows['breed_category'];
                $Name = $rows['breed_name'];
                $Color = $rows['breed_color'];
                $Details = $rows['breed_details'];
                $Image = $rows['breed_img'];
                $User = $rows['breed_submit'];
                $arr = array(1 => 'Yes', 0 => 'No');
                $approved = $arr[$rows['breed_approve']];
            ?>
                <tr class="target">
                    <td> <?php echo $ID; ?> </td>
                    <td> <?php echo $Category; ?> </td>
                    <td> <?php echo $Name; ?></td>
                    <td> <?php echo $Color; ?></td>
                    <td width=265px> <?php echo $Details; ?> </td>
                    <td> <?php echo $approved; ?></td>
                    <td> <?php echo $User; ?></td>
                    <td><img class="adminimginadmintable" src="img/breeds/<?php echo $Image; ?>"></td>
                    <td class="last3cells"> <a class="edit-art" href="editbreeds?id=<?php echo $ID; ?>">EDIT</a> </td>
                    <td class="last3cells">
                        <a class="edit-art" href="includes/approvebreed.inc?bid=<?php echo $ID; ?>">Approve</a> <br>
                        <a class="delete-art" href="includes/revokebreed.inc?bid=<?php echo $ID; ?>">Revoke</a>
                    </td>
                    <td class=""> <a class="delete-art" href="includes/deletebreeds.inc?id=<?php echo $ID; ?>">DELETE</a> </td>
                </tr>
            <?php
            }
            ?>
        </table>

        <p class="backtoadminpanel2"> <a href="addbreedsdetails">Add New Breed </a></p>

    </div>

    <p class="backtoadminpanel"> <a href="animals">Go Back to Animals! </a></p>


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