<?php
require_once __DIR__ . '/../../include/init.php';

if (!isset($_SESSION['user']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../dashboard.php");
    exit();
}

$userId = $_SESSION['user']['user_id'];
$goal = filter_input(INPUT_POST, 'calorie_goal', FILTER_VALIDATE_INT, [
    "options" => ["min_range" => 800, "max_range" => 10000]
]);

if ($goal === false || $goal === null) {
    $error = "Please enter a valid calorie goal (800–10,000).";
    header("Location: ../dashboard.php?error=" . urlencode($error));
} else {
    // Cập nhật hoặc Thêm mới goal vào bảng userGoal
    // Lưu ý: Logic này giả định bạn muốn insert lịch sử goal mới. 
    // Nếu chỉ muốn update dòng hiện tại, hãy dùng UPDATE. 
    // Ở đây mình giữ nguyên logic INSERT như code cũ của bạn.
    $stmt = $pdo->prepare("INSERT INTO userGoal (user_id, calorie_goal, date_set) VALUES (?, ?, NOW())");
    $stmt->execute([$userId, $goal]);
    
    $success = "Calorie goal updated successfully!";
    header("Location: ../dashboard.php?success=" . urlencode($success));
}
exit();
?>