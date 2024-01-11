
<?php
include 'partials/_dbconnect.php';
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $not_num=0;
    $user_id=$_SESSION["sno"];
    $sql = "SELECT * FROM comments where comment_on_id=$user_id and active=1 order by comment_id DESC";
    $result = $con->query($sql);
    while ($row=mysqli_fetch_assoc($result)) {
        $comment_by=$row["comment_by"];
        $comment_on_id=$row["comment_on_id"];
        if ($comment_on_id==$comment_by) {
            continue;
        }else{
            ++$not_num;
        }
    }
    echo $not_num;
}
$con->close();
?>