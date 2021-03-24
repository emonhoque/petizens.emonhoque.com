<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Newsletter Subscriptions</title>
</head>

<main class="main-content">
    <div class="au-2">
        <h1 class="auh-2">Newsletter Subcriptions</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>


    <div class="nlsubs">
        <table class="nlsubstable">
            <tr>
                <th> Newsletter ID </th>
                <th> Newsletter Email </th>
                <th>
                    <p class="nlremove"> Remove </p>
                </th>
            </tr>
            <?php
            $sql = "SELECT * FROM newsletter ORDER BY newsletter_id DESC";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $NLID = $rows['newsletter_id'];
                $NLemail = $rows['newsletter_email'];
            ?>
                <tr class="target">
                    <td> <?php echo $NLID; ?> </td>
                    <td> <?php echo $NLemail; ?> </td>
                    <td> <a class="edit" href="includes/nldelete.inc?newsletter_id=<?php echo $NLID; ?>">REMOVE</a> </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>


    <p class="backtoadminpanel"> <a href="admin">Go Back to Admin Panel! </a></p>


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