<div class="right-sidebar">
    <div class="sidebar-section user-welcome">
        <div class="date-badge">
            <i class="far fa-calendar-alt"></i> <?php echo date('j F, Y'); ?>
        </div>
        <h2>Hello, <br><span class="user-name"><?php echo htmlspecialchars($displayUser); ?></span></h2>
    </div>

    <hr class="divider">

    <div class="sidebar-section user-metrics">
        <div class="section-title">
            <i class="fas fa-child"></i> Body Metrics
        </div>
        
        <?php if (empty($userAge) || empty($userWeight) || empty($userHeight)): ?>
            <div class="empty-metrics">
                <p>Missing info.</p>
                <a href="profile.php" class="btn-text">Update Profile</a>
            </div>
        <?php else: ?>
            <div class="metrics-grid">
                <div class="metric-box">
                    <div class="metric-icon age-icon"><i class="fas fa-birthday-cake"></i></div>
                    <span class="metric-val"><?php echo htmlspecialchars((int)$userAge); ?></span>
                    <span class="metric-label">Age</span>
                </div>
                <div class="metric-box">
                    <div class="metric-icon weight-icon"><i class="fas fa-weight"></i></div>
                    <span class="metric-val"><?php echo htmlspecialchars((int)$userWeight); ?></span>
                    <span class="metric-label">kg</span>
                </div>
                <div class="metric-box">
                    <div class="metric-icon height-icon"><i class="fas fa-ruler-vertical"></i></div>
                    <span class="metric-val"><?php echo htmlspecialchars((int)$userHeight); ?></span>
                    <span class="metric-label">cm</span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <hr class="divider">

    <div class="sidebar-section goal-summary">
        <div class="section-title">
            <i class="fas fa-bullseye"></i> Daily Target
        </div>
        
        <div class="goal-card-mini">
            <?php if (!empty($userGoal)): ?>
                <?php $remaining = max(0, $userGoal - $totalCalories); ?>
                
                <div class="goal-row">
                    <span class="goal-label">Target:</span>
                    <span class="goal-val"><?= htmlspecialchars($userGoal) ?></span>
                </div>
                
                <div class="goal-row remaining-row">
                    <span class="goal-label">Remaining:</span>
                    <span class="goal-val <?= $remaining <= 0 ? 'text-success' : 'text-danger' ?>">
                        <?= htmlspecialchars($remaining) ?>
                    </span>
                </div>
            <?php else: ?>
                <p class="no-goal-text">No goal set yet.</p>
                <a href="set-goal.php" class="btn-small">Set Goal</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .right-sidebar {
        margin-top: 20px;
        right: 0;
        width: 200px;
        padding: 20px;
        position: fixed;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .right-sidebar .info {
        margin-bottom: 20px;
        padding: 5px;
        background-color: white;
        margin-bottom: 10px;
    }

    .user-goal p a {
        color: #4a7ee3;
        text-decoration: none;
    }

    .user-goal p a:hover {
        text-decoration: underline;
    }

    @media (max-width: 900px) {
        .right-sidebar {
            display: none;
        }
    }

    /* Các thành phần chung */
    .sidebar-section {
        margin-bottom: 5px;
    }

    .divider {
        border: 0;
        border-top: 1px solid #f0f0f0;
        margin: 15px 0;
    }

    .section-title {
        font-size: 0.85rem;
        color: #95a5a6;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* 1. Welcome Section */
    .date-badge {
        display: inline-block;
        background: #f8f9fa;
        color: #6c757d;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .right-sidebar h2 {
        font-size: 1.1rem;
        color: #2c3e50;
        font-weight: 600;
        margin: 0;
        line-height: 1.4;
    }

    .user-name {
        color: #4a7ee3;
        font-weight: 800;
        font-size: 1.3rem;
    }

    /* 2. Metrics Grid (Lưới chỉ số) */
    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* Chia 3 cột đều nhau */
        gap: 8px;
    }

    .metric-box {
        background: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 12px;
        padding: 10px 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s;
    }

    .metric-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        border-color: #e0e0e0;
    }

    /* Icons cho từng chỉ số */
    .metric-icon {
        font-size: 0.9rem;
        margin-bottom: 6px;
    }

    .age-icon {
        color: #f39c12;
    }

    .weight-icon {
        color: #e74c3c;
    }

    .height-icon {
        color: #3498db;
    }

    .metric-val {
        font-weight: 700;
        color: #2c3e50;
        font-size: 1rem;
    }

    .metric-label {
        font-size: 0.7rem;
        color: #95a5a6;
        text-transform: uppercase;
    }

    .empty-metrics {
        text-align: center;
        background: #fff5f5;
        padding: 10px;
        border-radius: 8px;
        border: 1px dashed #feb2b2;
    }

    .btn-text {
        color: #e53e3e;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
    }

    /* 3. Goal Summary */
    .goal-card-mini {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 15px;
    }

    .goal-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .remaining-row {
        margin-bottom: 0;
        padding-top: 8px;
        border-top: 1px dashed #e0e0e0;
    }

    .goal-label {
        color: #6c757d;
    }

    .goal-val {
        font-weight: 700;
        color: #2c3e50;
    }

    .text-success {
        color: #388e3c;
    }

    .text-danger {
        color: #d32f2f;
    }

    .btn-small {
        display: block;
        text-align: center;
        background: #4a7ee3;
        color: white;
        padding: 6px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.85rem;
        margin-top: 5px;
    }

    /* Responsive: Ẩn trên mobile */
    @media (max-width: 900px) {
        .right-sidebar {
            display: none;
        }
    }
</style>
<style>
    [data-theme="dark"] .right-sidebar {
        background: #2d2d2d !important;
        border: 1px solid #404040 !important;
        color: #ffffff !important;
    }

    [data-theme="dark"] .right-sidebar .info {
        background-color: #2d2d2d !important;
        color: #ffffff !important;
        border: 1px solid #404040 !important;
    }

    [data-theme="dark"] .right-sidebar .info h2,
    [data-theme="dark"] .right-sidebar .info h3,
    [data-theme="dark"] .right-sidebar .info p {
        color: #ffffff !important;
    }

    [data-theme="dark"] .right-sidebar .info h2 span {
        color: #4a7ee3 !important;
    }

    [data-theme="dark"] .right-sidebar .user-goal p a {
        color: #4a7ee3 !important;
    }

    [data-theme="dark"] .right-sidebar .user-goal p a:hover {
        color: #6c9fff !important;
    }
</style>