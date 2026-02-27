<?php
require_once __DIR__ . '/../include/init.php';

// Xử lý đếm giỏ hàng
$cart_count = 0;
if ($isLoggedIn) {
    $cartIdStmt = $pdo->prepare("SELECT cart_id FROM productCart WHERE user_id = ?");
    $cartIdStmt->execute([$_SESSION['user']['user_id']]);
    $cartId = $cartIdStmt->fetchColumn();
    if ($cartId) {
        $qtyStmt = $pdo->prepare("SELECT COALESCE(SUM(quantity),0) FROM productCart_item WHERE cart_id = ?");
        $qtyStmt->execute([$cartId]);
        $cart_count = (int) $qtyStmt->fetchColumn();
    }
} else {
    // Nếu chưa login thì đếm từ session
    $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
}
?>

<header class="main-header">
    <div class="header-container">
        <a href="<?= BASE_URL ?>index.php" class="logo">
            <i class="fas fa-chart-pie logo-icon"></i> BitBalance
        </a>

        <nav>
            <div class="menu" id="navMenu">
                <div class="nav-links">
                    <a href="<?= BASE_URL ?>dashboard/dashboard.php"
                        class="nav-item <?php echo ($activeHeader == 'dashboard') ? 'active' : ''; ?>">Dashboard</a>
                    <!-- <a href="<?= BASE_URL ?>products.php"
                        class="nav-item <?php echo ($activeHeader == 'products') ? 'active' : ''; ?>">Products</a> -->
                    <a href="<?= BASE_URL ?>about.php"
                        class="nav-item <?php echo ($activeHeader == 'about') ? 'active' : ''; ?>">About</a>
                    <!-- <a href="<?= BASE_URL ?>forum.php"
                        class="nav-item <?php echo ($activeHeader == 'forum') ? 'active' : ''; ?>">Forums</a> -->
                </div>

                <div class="user-actions">
                    <!-- <a href="<?= BASE_URL ?>cart.php" class="cart-btn" title="View Cart">
                        <i class="fas fa-shopping-bag"></i>
                        <?php if ($cart_count > 0): ?>
                            <span id="cart-count" class="badge-pulse"><?= $cart_count ?></span>
                        <?php endif; ?>
                    </a> -->

                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="<?= BASE_URL ?>profile.php" class="profile-btn" title="My Profile">
                            <?php if (!empty($_SESSION['user']['profile_image'])): ?>
                                <img src="<?= BASE_URL ?><?= htmlspecialchars($_SESSION['user']['profile_image']) ?>"
                                    alt="Avatar">
                            <?php else: ?>
                                <div class="profile-placeholder"><i class="fas fa-user"></i></div>
                            <?php endif; ?>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>login.php" class="btn-login">Sign In</a>
                    <?php endif; ?>
                </div>
            </div>

            <button class="hamburger" onclick="toggleMenu()" aria-label="Toggle menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>
    </div>
</header>

<?php include PROJECT_ROOT . 'views/cookie-banner.php'; ?>

<?php if ($isLoggedIn): ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const badge = document.getElementById('cart-count');
            if (badge) badge.textContent = <?php echo $cart_count; ?>;
        });
    </script>
<?php endif; ?>

<script>
    function toggleMenu() {
        document.getElementById('navMenu').classList.toggle('show');
    }
</script>

<style>
    /* --- CSS VARIABLES (Đồng bộ với Dashboard) --- */
    :root {
        --header-bg: rgba(255, 255, 255, 0.85);
        --header-blur: 12px;
        --header-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        --text-primary: #2c3e50;
        --text-secondary: #6c757d;
        --accent-color: #4a7ee3;
        /* Blue */
        --brand-gradient: linear-gradient(135deg, #4a7ee3, #764ba2);
        --streak-gradient: linear-gradient(135deg, #ff9966, #ff5e62);
    }

    [data-theme="dark"] {
        --header-bg: rgba(26, 26, 26, 0.85);
        --text-primary: #ffffff;
        --text-secondary: #adb5bd;
        --header-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    /* --- LAYOUT HEADER --- */
    .main-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: var(--header-bg);
        backdrop-filter: blur(var(--header-blur));
        -webkit-backdrop-filter: blur(var(--header-blur));
        /* Safari support */
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: var(--header-shadow);
        transition: all 0.3s ease;
    }

    .header-container {
        max-width: 100%;
        /* Thay 1200px bằng 100% để tràn màn hình */
        margin: 0;
        /* Bỏ margin auto */
        padding: 15px 40px;
        /* Tăng padding 2 bên lên 40px (hoặc 50px) để không bị sát lề quá */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media (max-width: 768px) {
        .header-container {
            padding: 12px 20px;
            /* Mobile thì chỉ cần 20px là đẹp */
        }
    }

    /* --- LOGO --- */
    .logo {
        text-decoration: none;
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 8px;
        letter-spacing: -0.5px;
    }

    .logo-icon {
        background: var(--brand-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 1.6rem;
    }

    /* --- NAVIGATION --- */
    .menu {
        display: flex;
        align-items: center;
        gap: 40px;
    }

    .nav-links {
        display: flex;
        gap: 25px;
    }

    .nav-item {
        text-decoration: none;
        color: var(--text-secondary);
        font-weight: 500;
        font-size: 0.95rem;
        transition: color 0.2s;
        position: relative;
    }

    .nav-item:hover {
        color: var(--accent-color);
    }

    .nav-item.active {
        color: var(--text-primary);
        font-weight: 700;
    }

    /* Dấu chấm nhỏ dưới link active */
    .nav-item.active::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 4px;
        background: var(--accent-color);
        border-radius: 50%;
    }

    /* --- USER ACTIONS (Cart, Profile, Login) --- */
    .user-actions {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-left: 20px;
        border-left: 1px solid rgba(0, 0, 0, 0.08);
        /* Đường kẻ ngăn cách */
    }

    /* Cart Button */
    .cart-btn {
        position: relative;
        color: var(--text-primary);
        font-size: 1.2rem;
        text-decoration: none;
        padding: 8px;
        transition: transform 0.2s;
    }

    .cart-btn:hover {
        transform: scale(1.1);
        color: var(--accent-color);
    }

    /* Badge số lượng (Màu Cam Streak) */
    #cart-count {
        position: absolute;
        top: 0;
        right: -5px;
        background: var(--streak-gradient);
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        min-width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 2px solid white;
        /* Viền trắng để tách khỏi icon */
        box-shadow: 0 2px 5px rgba(255, 94, 98, 0.4);
    }

    /* Profile Avatar */
    .profile-btn img {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: border-color 0.2s;
    }

    .profile-placeholder {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-secondary);
        border: 2px solid transparent;
        transition: all 0.2s;
    }

    .profile-btn:hover img,
    .profile-btn:hover .profile-placeholder {
        border-color: var(--accent-color);
    }

    /* Login Button (Pill Shape) */
    .btn-login {
        text-decoration: none;
        background: var(--text-primary);
        color: var(--header-bg);
        /* Đảo màu */
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s;
    }

    .btn-login:hover {
        background: var(--accent-color);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(74, 126, 227, 0.3);
    }

    /* Hamburger Menu (Mobile) */
    .hamburger {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--text-primary);
        cursor: pointer;
    }

    /* --- RESPONSIVE DESIGN --- */
    @media (max-width: 900px) {
        .hamburger {
            display: block;
        }

        .menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: var(--header-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            flex-direction: column;
            align-items: flex-start;
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .menu.show {
            max-height: 400px;
        }

        .nav-links {
            flex-direction: column;
            width: 100%;
            gap: 0;
        }

        .nav-item {
            padding: 15px 24px;
            width: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
            display: block;
        }

        .nav-item:hover {
            background: rgba(0, 0, 0, 0.02);
        }

        .nav-item.active::after {
            display: none;
        }

        /* Bỏ dấu chấm trên mobile */
        .nav-item.active {
            color: var(--accent-color);
            background: rgba(74, 126, 227, 0.05);
            border-left: 4px solid var(--accent-color);
        }

        .user-actions {
            width: 100%;
            padding: 15px 24px;
            justify-content: space-between;
            border-left: none;
            background: rgba(0, 0, 0, 0.02);
        }
    }
</style>