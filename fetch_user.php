<?php

//fetch_user.php

include('includes/dbhchat.inc.php');
include('includes/messageController.inc.php');

session_start();

$query = "
SELECT * FROM users 
WHERE username != '" . $_SESSION['username'] . "' 
";

$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="tableuserlist">
 <tr>
  <th width="50%">Username</td>
  <th width="20%">Chat</th>
 </tr>
';

foreach ($result as $row) {
    $status = '';
    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
    $user_last_activity = fetch_user_last_activity($row['user_id'], $conn);
    if ($user_last_activity > $current_timestamp) {
        $status = 'rgb(30, 202, 39);';
    } else {
        $status = 'rgb(228, 48, 48);';
    }
    $output .= '
 <tr class="target">
  <td class="usernamechat">@' . $row['username'] . ' ' . count_unseen_message($row['user_id'], $_SESSION['id'], $conn) . '</td>
  <td><button type="button" style="background-color:' . $status . '" class="start_chat" data-touserid="' . $row['user_id'] . '" data-tousername="' . $row['username'] . '">Open Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;
