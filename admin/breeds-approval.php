<?php
require "includes/header.php";

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Approve Breeds</title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Approve Breeds</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>

    <div class="postapprovalflex">
        <div class="postapproval">
            <?php

            $sql = "SELECT * FROM breed WHERE breed_approve ='0'";
            $res = $conn->query($sql);
            if (mysqli_num_rows($res) > 0) {
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
                    <table class="approvaltable target">
                        <tbody>
                            <tr>
                                <td colspan="2"><img style="width:300px" src="img/breeds/<?php echo $Image; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h2><?php echo $Name; ?></h2>
                                    <h3><?php echo $Category; ?></h3>
                                    <h4><?php echo $Color; ?></h4>
                                    <p style="padding:10px; background-color:#000; color:#dfdfdf; border-radius:10px;"><i>"<?php echo $Details; ?>"</i></p>
                                    <p>Submitted By: <?php echo $User; ?></p>

                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <form class="editbuttonnostyle" action="includes/approvebreeds.inc" method="$_GET">
                                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="bid" name="bid" placeholder="ID" value="<?php echo $ID; ?>">
                                        <button type="submit" name="approve" id="approve" class="approvalbuttons approvalbuttonsapprove"> APPROVE <i class="fas fa-check" style="font-size:20px"></i></button>
                                    </form>
                                </td width="50%">
                                <td>
                                    <form class="editbuttonnostyle" action="includes/approvebreeds.inc" method="$_GET">
                                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="bid" name="bid" placeholder="ID" value="<?php echo $ID; ?>">
                                        <button type="submit" name="delete" id="delete" class="approvalbuttons approvalbuttonsdeny"> DELETE <i class="fas fa-trash-alt" style="font-size:20px"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                <?php
                }
            } else {
                ?>
                <h3 class="allllllldone">There Are No Unapproved Breeds!</h3>
            <?php
            };
            ?>

        </div>
    </div>

    <p class="backtoadminpanel"> <a href="animals">Go Back to Animals!</a></p>



</main>

<script>

</script>




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