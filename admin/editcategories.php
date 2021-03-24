<?php
require "includes/header.php";
?>

<head>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/admin-style.css" />
    <title> Edit Animals Category Details </title>
</head>

<main class="main-content">

    <div class="listarticlesdiv"><br>
        <h1>Category Details</h1><br>
    </div>
    <div class="scrollll">
        <table class="listarticles">
            <tr>
                <th> Category ID </th>
                <th> Name </th>
                <th> Description </th>
                <th> Short Description </th>
                <th> Image </th>
                <th> Life Expectancy </th>
                <th> View </th>
                <th> Edit </th>
            </tr>
            <?php
            $sql = "SELECT * FROM article_categories";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $CateID = $rows['category_id'];
                $CateName = $rows['category_name'];
                $CateDesc = $rows['category_description'];
                $CateShortDesc = $rows['category_descshort'];
                $CateImg = $rows['category_img'];
                $CateLF = $rows['category_lifeexpect'];
            ?>
                <tr class="target">
                    <td> <?php echo $CateID; ?> </td>
                    <td> <?php echo $CateName; ?> </td>
                    <td width=450px> <?php echo $CateDesc; ?> </td>
                    <td width=300px> <?php echo $CateShortDesc; ?> </td>
                    <td><img class="adminimginadmintable" src="img/animals/<?php echo $CateImg; ?>"></td>
                    <td> <?php echo $CateLF; ?> </td>
                    <td class="last3cells"> <a class="view-art" href="../animals/<?php echo strtolower($CateName); ?>">VIEW</a> </td>
                    <td class="last3cells"> <a class="edit-art" href="editcate?id=<?php echo $CateID; ?>">EDIT</a> </td>
                </tr>
            <?php
            }
            ?>
        </table>
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