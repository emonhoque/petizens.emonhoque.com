<?php
require "includes/header.php";

$dive = mysqli_query($conn, "SELECT * FROM posts WHERE post_approved='$0';");
$hiderow = mysqli_num_rows($dive);

if ($hiderow < 1) {
    $HideDiv = "block";
}

?>




<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title> Approve Community Posts </title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Approve Community Posts</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>

    <div class="postapprovalflex">
        <div class="postapproval">
            <?php
            $sql = "SELECT * FROM cposts WHERE cpost_approved ='0';";
            $res = $conn->query($sql);
            if (mysqli_num_rows($res) > 0) {
                while ($rows = $res->fetch_assoc()) {
                    $Id = $rows['cpost_id'];
                    $user = $rows['cpost_user'];
                    $Img = $rows['cpost_img'];
                    $Caption = $rows['cpost_caption'];
                    $Time = $rows['cpost_time'];
                    $dateA = date("h:i a", strtotime($Time));
                    $dateB = date("F j, Y", strtotime($Time));
                    $dateC = $dateA . ", " . $dateB;
                    $newdate = $dateC;
                    $arr = array(1 => 'Yes', 0 => 'No');
                    $approved = $arr[$rows['cpost_approved']];
            ?>
                    <table class="approvaltable target">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <?php
                                    if ($Img == null) {
                                    } else {
                                    ?>
                                        <img style="width:300px" src="img/cposts/<?php echo $Img; ?>">
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h3>@<?php echo $user; ?></h3>
                                    <p><?php echo $newdate; ?></p>
                                    <h4><?php echo $Caption; ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <a class="editbuttonnostyle" href="includes/approvecpost2.inc?phid=<?php echo $Id; ?>">
                                        <button type="submit" class="approvalbuttons approvalbuttonsapprove"> APPROVE <i class="fas fa-check" style="font-size:20px"></i></button>
                                    </a>
                                </td width="50%">
                                <td>
                                    <a class="editbuttonnostyle" href="includes/deletecpost2.inc?phid=<?php echo $Id; ?>">
                                        <button type="submit" class="approvalbuttons approvalbuttonsdeny"> DELETE <i class="fas fa-trash-alt" style="font-size:20px"></i></button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                <?php
                }
            } else {
                ?>
                <h3 class="allllllldone">There Are No Unapproved Posts!</h3>
            <?php
            };
            ?>
        </div>
    </div>


    <p class="backtoadminpanel"> <a href="community-manager">Go Back to Community Manager! </a></p>



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