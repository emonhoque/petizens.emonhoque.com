<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title> List Posts </title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>List Posts</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>
    <div class="scrollll">
        <table class="listarticles">
            <tr>
                <th> Post ID </th>
                <th> Image </th>
                <th> Username </th>
                <th> Caption </th>
                <th> Time </th>
                <th> Approved </th>
                <th class="last3cells"> View Profile </th>
                <th class="last3cells"> Approval </th>
                <th class="last3cells"> Delete </th>
            </tr>
            <?php
            $sql = "SELECT * FROM posts;";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $Id = $rows['post_id'];
                $user = $rows['post_user'];
                $Img = $rows['post_img'];
                $Caption = $rows['post_caption'];
                $Time = $rows['post_time'];
                $dateA = date("h:i a", strtotime($Time));
                $dateB = date("F j, Y", strtotime($Time));
                $dateC = $dateA . ", " . $dateB;
                $newdate = $dateC;
                $arr = array(1 => 'Yes', 0 => 'No');
                $approved = $arr[$rows['post_approved']];

            ?>
                <tr class="target">
                    <td> <?php echo $Id; ?> </td>
                    <td><img class="adminimginadmintable" src="img/posts/<?php echo $Img; ?>"></td>
                    <td> <?php echo $user; ?> </td>
                    <td width=265px> <?php echo $Caption; ?></td>
                    <td width=130px> <?php echo $newdate; ?> </td>
                    <td> <?php echo $approved; ?> </td>
                    <td class="last3cells"> <a class="view-art" href="../user/<?php echo $user; ?>/posts">VIEW</a> </td>
                    <td class="last3cells">
                        <a class="edit-art" href="includes/approvepost.inc?phid=<?php echo $Id; ?>">Approve</a> <br>
                        <a class="delete-art" href="includes/revokepost.inc?phid=<?php echo $Id; ?>">Revoke</a>
                    </td>
                    <td class="last3cells"> <a class="delete-art" href="includes/deletepost.inc?phid=<?php echo $Id; ?>" onClick=" return confirm('Are you sure you want to delete this? This can not be undone!')">DELETE</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <p class="backtoadminpanel"> <a href="posts-manager">Go Back to Posts Manager! </a></p>



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