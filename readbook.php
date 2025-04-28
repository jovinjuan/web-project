<?php
require "config.php";
$user_id = $_SESSION['user_id'];
$book_id = $_SESSION['book_id'];

if(isset($user_id) && isset($book_id)){

$current_pages = $_POST['current_page'];
$reading_duration = $_POST['timer'];
$reading_date = $reading_date = date('Y-m-d'); 
$reading_progress = $_POST['progress'];

$sql = "INSERT INTO reading_activity (user_id,book_id,current_pages,reading_duration,reading_date,reading_progress) VALUE (:user_id,:book_id,:current_pages,:reading_duration,:reading_date,:reading_progress) 
ON DUPLICATE KEY UPDATE current_pages = :current_pages, reading_duration = :reading_duration, reading_date = :reading_date, reading_progress = :reading_progress";

$query = $conn->prepare($sql);
$query->bindParam(':user_id',$user_id,PDO::PARAM_INT);
$query->bindParam(':book_id',$book_id,PDO::PARAM_INT);
$query->bindParam(':current_pages',$current_pages,PDO::PARAM_INT);
$query->bindParam(':reading_duration',$reading_duration,PDO::PARAM_INT);
$query->bindParam(':reading_date',$reading_date,PDO::PARAM_STR);
$query->bindParam(':reading_progress',$reading_progress,PDO::PARAM_STR);

$result = $query->execute();

if($result){
header("Location: home.php?message=success");
}
else{
echo "Error Saving Data";
}

}
?>
