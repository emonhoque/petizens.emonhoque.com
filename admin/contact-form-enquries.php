<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title>Messages For Petizens</title>
</head>

<main class="main-content">
    <div class="listarticlesdiv">
        <h1>Messages For Petizens</h1><br>
        <input class="searchloc" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
    </div>

    <?php
    $sql = "SELECT * FROM contactform ORDER BY cf_id DESC";
    $res = $conn->query($sql);
    while ($rows = $res->fetch_assoc()) {
        $CFID = $rows['cf_id'];
        $Join = $rows['cf_time'];
        $newdate = date("F j, Y, g:i a", strtotime($Join));
        $newdate = $newdate;
    ?>

        <div class="cfresults">
            <table class="cfresultstable">
                <tr>
                    <p><strong>A message from:</strong></p><br>
                    <p><strong><?php echo $rows['cf_name']; ?></strong></p>
                    <p><a href="mailto:<?php echo $rows['cf_email']; ?>"><?php echo $rows['cf_email']; ?></a></p>
                    <p><a href="phoneto:<?php echo $rows['cf_phone']; ?>"><?php echo $rows['cf_phone']; ?></a></p><br>
                    <p><strong>Subject: </strong></p>
                    <p><?php echo $rows['cf_subject']; ?></p><br>
                </tr>
                <tr>
                    <p><strong>Message: </strong></p>
                    <p><?php echo $rows['cf_message']; ?></p><br>
                </tr>
                <tr>
                    <p><strong>Time: </strong></p>
                    <p><?php echo $newdate; ?></p><br>
                </tr>
                <tr>
                    <p class="cfresultreply"><a href="mailto:<?php echo $rows['cf_email']; ?>">Reply!</a></p><br>
                </tr>
                <tr>
                    <td>
                        <p class="cfresultreplyred"><a href="includes/cfdelete.inc?cf_id=<?php echo $CFID; ?>">DELETE</a></p>
                    </td>
                </tr>
            </table>
        </div>
    <?php
    }
    ?>
</main>

<script>
    function locfunction() {
        var input = document.getElementById("searchloc");
        var filter = input.value.toLowerCase();
        var nodes = document.getElementsByClassName('cfresults');

        for (i = 0; i < nodes.length; i++) {
            if (nodes[i].innerText.toLowerCase().includes(filter)) {
                nodes[i].style.display = "inline-block";
            } else {
                nodes[i].style.display = "none";
            }
        }
    }
</script>

<?php
require "includes/footer.php";
?>