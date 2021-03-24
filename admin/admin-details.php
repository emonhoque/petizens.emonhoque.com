<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<title> Admins Details </title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Admin Details</h1><br>
    </div>
    <div class="scrollll">
        <table class="listarticles">
            <tr>
                <th> User ID </th>
                <th> Image </th>
                <th> Name </th>
                <th> Email </th>
                <th> Username </th>
                <th> Phone </th>
                <th> Bio </th>
                <th class="last3cells"> View Profile </th>
                <th class="last3cells"> Edit </th>
                <th class="last3cells"> Delete </th>
            </tr>
            <?php
            $sql = "SELECT * FROM users WHERE is_admin=1";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $ID = $rows['user_id'];
                $Username = $rows['username'];
                $FName = $rows['user_fname'];
                $LName = $rows['user_lname'];
                $Email = $rows['user_email'];
                $Phone = $rows['user_phone'];
                $Image = $rows['user_img'];
                $Desc = $rows['user_desc'];
                $Join = $rows['user_join'];
                $arr = array(1 => '(Admin)', 0 => ' ');
                $Admin = $arr[$rows['is_admin']];
            ?>
                <tr class="target">
                    <td> <?php echo $ID; ?> </td>
                    <td><img class="adminimginadmintable" src="img/users/<?php echo $Image; ?>"></td>
                    <td> <?php echo $FName; ?> <?php echo $LName; ?> </td>
                    <td> <?php echo $Email; ?> </td>
                    <td> <?php echo $Username; ?> <?php echo $Admin; ?> </td>
                    <td> <?php echo $Phone; ?> </td>
                    <td width=265px> <?php echo $Desc; ?> </td>
                    <td class="last3cells"> <a class="view-art" href="../user/<?php echo $Username; ?>">VIEW</a> </td>
                    <td class="last3cells"> <a class="edit-art" href="editadmindetails?id=<?php echo $Username; ?>">EDIT</a> </td>
                    <td class=""> <a class="delete-art" href="includes/deleteadmindetails.inc?id=<?php echo $Username; ?>">DELETE</a> </td>
                </tr>
            <?php
            }
            ?>
        </table>

        <p class="backtoadminpanel2"> <a href="adduserdetails">Add New Admin </a></p>

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