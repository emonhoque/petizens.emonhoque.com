<div class="communitycppostflex">
    <div class="communitycpost" style="min-width: 200px;">
        <strong>View All Posts By:</strong><br>
        <select id="viewallposts" class="viewallposts" name="viewallposts" onchange="usrselect();">
            <option selected="true" disabled="disabled" value="#">Select</option>
            <option value="all">All Users</option>
            <?php
            require "includes/dbh.inc.php";
            $sql =  "SELECT DISTINCT(cpost_user) FROM cposts;";
            $res = $conn->query($sql);
            while ($rows = $res->fetch_assoc()) {
                $CUser = $rows['cpost_user'];
            ?>
                <option value="<?php echo $CUser; ?>"><?php echo $CUser; ?></option>
            <?php
            }
            ?>
        </select><br>
        <a id="viewalla" href="community/">
            <button id="cpost_btn2" class="cpost_btn2 cpost_btnhover" type="button"> View </button>
        </a>
    </div>
    <script>
        function usrselect() {
            var usr = document.getElementById("viewallposts");
            var comm = "community/"
            var displaytext = usr.options[usr.selectedIndex].value;
            var userurl = comm + displaytext
            document.getElementById("viewalla").href = userurl;
        }
    </script>
</div>