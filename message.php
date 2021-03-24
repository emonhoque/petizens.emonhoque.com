<?php

require "includes/header.php";

include('includes/dbhchat.inc.php');
include('includes/messageController.inc.php');

if (!isset($_SESSION['id'])) {
    header("location:userlogin");
}

?>

<head>
    <title>Messages</title>
    <link rel="stylesheet" href="style/style.css" />
</head>

<main class="main-content">

    <div class="animaldiv">
        <h1>PawChat</h1>
    </div>

    <div class="chatsflex">
        <div class="containerchat">
            <div class="searchbar">
                <input class="searchbar-all" onkeyup="locfunction()" id="searchloc" placeholder="Search" autocomplete="off"><br>
            </div>
            <div class="table-responsive">
                <div id="user_details"></div>
            </div>
            <h5 style="margin-top:5px;" align="center"><span style="background-color: rgb(228, 48, 48); padding:3px; border-radius:5px;">Red</span> means user is offline.</h5>
            <h5 style="margin-top:10px;" align="center"><span style="background-color: rgb(30, 202, 39); padding:3px; border-radius:5px;">Green</span> means user is online.</h5>
        </div>
        <div id="user_model_details"></div>
    </div>
</main>

<script>
    $(document).ready(function() {

        fetch_user();

        setInterval(function() {
            update_last_activity();
            update_chat_history_data();
        }, 500);

        function fetch_user() {
            $.ajax({
                url: "fetch_user.php",
                method: "POST",
                success: function(data) {
                    $('#user_details').html(data);
                }
            })
        }

        function update_last_activity() {
            $.ajax({
                url: "update_last_activity.php",
                success: function() {

                }
            })
        }

        function make_chat_dialog_box(to_user_id, to_user_name) {
            var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
            modal_content += '<div class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
            modal_content += fetch_user_chat_history(to_user_id);
            modal_content += '</div>';
            modal_content += '<div class="form-group">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control chat_message" required></textarea>';
            modal_content += '</div><div class="form-group" align="center">';
            modal_content += '<button type="submit" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
            $('#user_model_details').html(modal_content);

            var log2 = $('#chat_history_' + to_user_id);
            log2.animate({
                scrollTop: log2.prop('scrollHeight')
            }, 500);
        }

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            make_chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400
            });
            $('#user_dialog_' + to_user_id).dialog('open');
        });

        $(document).on('click', '.send_chat', function() {
            var to_user_id = $(this).attr('id');
            var chat_message = $('#chat_message_' + to_user_id).val();

            $.ajax({
                url: "insert_chat.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id,
                    chat_message: chat_message
                },
                success: function(data) {
                    $('#chat_message_' + to_user_id).val('');
                    var log = $('#chat_history_' + to_user_id);
                    log.animate({
                        scrollTop: log.prop('scrollHeight')
                    }, 100);
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        });

        function fetch_user_chat_history(to_user_id) {
            $.ajax({
                url: "fetch_user_chat_history.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id
                },
                success: function(data) {
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        }

        function update_chat_history_data() {
            $('.chat_history').each(function() {
                var to_user_id = $(this).data('touserid');
                fetch_user_chat_history(to_user_id);
            });
        }

        $(document).on('click', '.ui-button-icon', function() {
            $('.user_dialog').dialog('destroy').remove();
        });
    });

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