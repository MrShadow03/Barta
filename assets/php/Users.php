<?php

session_start();
include_once './config.php';
$sql = mysqli_query($conn, "SELECT * FROM users");
$output = "";

if (mysqli_num_rows($sql) == 1) {
    $output = "There are no user to chat with";
} else if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_assoc($sql)) {
        $output .= '<li class="contacts-item friends">
                        <a class="contacts-link" href="./chat_user.php?unique_id=' . $row['unique_id'] . '">
                            <div class="avatar avatar-online">
                                <img src="./assets/storage/' . $row['img'] . '" alt="" />
                            </div>
                            <div class="contacts-content">
                                <div class="contacts-info">
                                    <h6 class="chat-name text-truncate">
                                        ' . $row['name'] . '
                                    </h6>
                                    <div class="chat-time">Just now</div>
                                </div>
                                <div class="contacts-texts">
                                    <p class="text-truncate">
                                        I’m sorry, I didn’t catch that. Could you please
                                        repeat?
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>';
    }
}
echo $output;
