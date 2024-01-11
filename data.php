<?php
include 'partials/_dbconnect.php';
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $num = 0;
    $user_id = $_SESSION["sno"];
    $sql = "SELECT * FROM comments where comment_on_id=$user_id and active=1 order by comment_id DESC";
    $result = $con->query($sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $comment_id = $row["comment_id"];
            $comment_by = $row["comment_by"];
            $comment_on_id = $row["comment_on_id"];
            if ($comment_on_id == $comment_by) {
                continue;
            }
            $sql2 = "SELECT * FROM users where id=$comment_by";
            $result2 = $con->query($sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $comment_by_user_name = $row2["username"];
            $thread_id = $row["thread_id"];
            $comment_content = $row["comment_content"];
            $active = $row["active"];
            $status = "seen";
            if ($active == 1) {
                $status = "unseen";
            }
            $sql3 = "SELECT * FROM threads where threads_id=$thread_id";
            $result3 = $con->query($sql3);
            $row3 = mysqli_fetch_assoc($result3);
            $thread_title = $row3["threads_title"];
            echo '<a class="list-group-item d-flex justify-content-between align-items-start text-decoration-none bg-transparent border-secondary" href="thread.php?threadid=' . $thread_id . '&seen=' . $comment_id . '&#section' . $comment_id . '">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold text-primary" style="font-size:10px;">' . $thread_title . '</div>
                    <p class="text-secondary" style="font-size:13px;">' . substr($comment_content, 0, 60) . '...<br><span class="btn btn-sm pe-4 text-dark" style="font-size:10px;padding:1px;background-color:whitesmoke;"> - @' . $comment_by_user_name . '</span></p>
                    </div>
                    <span class="badge bg-primary rounded-pill">' . $status . '</span>
                    </a>';
        }
    } else {
        echo '<li class="list-group-item d-flex justify-content-between align-items-start text-decoration-none bg-transparent">
                <div class="ms-2 me-auto">
                <div class="fw-bold text-light">No Notifications</div>
                    </div>
                </li>';
    }
}

$con->close();
