<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Approve Community Comments</title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Approve Community Comments</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>

    <div class="postapprovalflex">
        <div class="postapproval">
            <?php

            $sql = "SELECT * FROM cposts_comments LEFT JOIN cposts ON cposts.cpost_id=cposts_comments.cpost_id WHERE cposts_comments.cpc_approved ='0'";
            $res = $conn->query($sql);
            if (mysqli_num_rows($res) > 0) {
                while ($rows = $res->fetch_assoc()) {
                    $Id = $rows['cpc_id'];
                    $Img = $rows['cpost_img'];
                    $caption = $rows['cpost_caption'];
                    $user = $rows['cpc_user'];
                    $Comment = $rows['cpc_comment'];
                    $Time = $rows['cpc_time'];
                    $dateA = date("h:i a", strtotime($Time));
                    $dateB = date("F j, Y", strtotime($Time));
                    $dateC = $dateA . ", " . $dateB;
                    $newdate = $dateC;
                    $arr = array(1 => 'Yes', 0 => 'No');
                    $approved = $arr[$rows['cpc_approved']];
            ?>
                    <table class="approvaltable target">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <?php
                                    if ($Img == null) {
                                    ?>
                                        <p><i><?php echo $caption; ?></i></p>
                                    <?php
                                    } else {
                                    ?>
                                        <p><i><?php echo $caption; ?></i></p>
                                        <img style="width:300px" src="img/cposts/<?php echo $Img; ?>">
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h3>@<?php echo $user; ?></h3>
                                    <p style="padding:10px; background-color:#000; color:#dfdfdf; border-radius:10px;"><i>"<?php echo $Comment; ?>"</i></p>
                                    <p><?php echo $newdate; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <form class="editbuttonnostyle" action="includes/approvedeletecommentcpost.inc" method="$_GET">
                                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="cid" name="cid" placeholder="ID" value="<?php echo $Id; ?>">
                                        <button type="submit" name="approve" id="approve" class="approvalbuttons approvalbuttonsapprove"> APPROVE <i class="fas fa-check" style="font-size:20px"></i></button>
                                    </form>
                                </td width="50%">
                                <td>
                                    <form class="editbuttonnostyle" action="includes/approvedeletecommentcpost.inc" method="$_GET">
                                        <input style="display: none;" readonly="readonly" class="input-field" type="text" id="cid" name="cid" placeholder="ID" value="<?php echo $Id; ?>">
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
                <h3 class="allllllldone">There Are No Unapproved Comments!</h3>
            <?php
            };
            ?>

        </div>
    </div>



    <p class="backtoadminpanel"> <a href="community-manager">Go Back to Community Manager! </a></p>



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