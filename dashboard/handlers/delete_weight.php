<?php
require_once __DIR__ . '/../../include/init.php';

// Check Login & Method
if (!isset($_SESSION['user']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'error' => 'Unauthorized']);
    exit();
}

$userId = $_SESSION['user']['user_id'];
$weightId = $_POST['weight_id'] ?? null;

if (!$weightId) {
    echo json_encode(['ok' => false, 'error' => 'Missing ID']);
    exit();
}

try {
    // Chỉ xóa nếu weight_id đó thuộc về user đang đăng nhập (Bảo mật)
    $stmt = $pdo->prepare("DELETE FROM weight_log WHERE weight_id = ? AND user_id = ?");
    $stmt->execute([$weightId, $userId]);

    if ($stmt->rowCount() > 0) {
        // (Tùy chọn) Cập nhật lại userPhysicalInfo về số cân gần nhất còn lại
        // Để đảm bảo tính đồng bộ, ta lấy dòng mới nhất còn lại trong log
        $stmtUpdate = $pdo->prepare("
            UPDATE userPhysicalInfo 
            SET weight = (SELECT weight FROM weight_log WHERE user_id = ? ORDER BY date_logged DESC, weight_id DESC LIMIT 1)
            WHERE user_id = ?
        ");
        $stmtUpdate->execute([$userId, $userId]);

        echo json_encode(['ok' => true]);
    } else {
        echo json_encode(['ok' => false, 'error' => 'Entry not found or permission denied']);
    }

} catch (PDOException $e) {
    echo json_encode(['ok' => false, 'error' => 'Database error']);
}
?>