<div class="sidebar">
    <a href="dashboard.php" class="nav-link <?php echo ($activePage == 'overview') ? 'active' : ''; ?>">
        <i class="fas fa-th-large"></i> Overview
    </a>
    
    <a href="dashboard-intake.php" class="nav-link <?php echo ($activePage == 'intake') ? 'active' : ''; ?>">
        <i class="fas fa-utensils"></i> Food Intake
    </a>
    
    <a href="dashboard-history.php" class="nav-link <?php echo ($activePage == 'history') ? 'active' : ''; ?>">
        <i class="fas fa-history"></i> History
    </a>
    
    <a href="dashboard-calculator.php" class="nav-link <?php echo ($activePage == 'calculator') ? 'active' : ''; ?>">
        <i class="fas fa-calculator"></i> Calculator
    </a>
</div>

<style>
    .sidebar a {
        display: block;
        padding: 8px;
        color: #333;
        text-decoration: none;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .sidebar a.active {
        background-color: #4a7ee3;
        color: white;
    }

    .sidebar a:hover {
        background-color: #ddd;
        color: black;
        transition: all 0.3s ease;
    }

    @media (max-width: 900px) {
        .sidebar {
            width: 100vw;
            position: static;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            padding: 8px 0;
            border-radius: 0;
            box-shadow: none;
            border: none;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar a {
            flex: 1;
            margin: 0;
            font-size: 1.05rem;
            padding: 14px 0;
            text-align: center;
            border-radius: 0;
            border: none;
        }

        .sidebar a.active {
            background: #4a7ee3;
            color: #fff;
        }
    }

    @media (max-width: 480px) {
        .sidebar a {
            font-size: 0.95rem;
            padding: 10px 0;
        }
    }
</style>

<style>
    /* --- DESKTOP STYLING (Giao diện Modern bạn thích) --- */
    .sidebar {
        width: 200px;
        background: #ffffff;
        border-radius: 16px;
        padding: 20px 15px;
        margin-top: 20px;
        position: fixed;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        z-index: 90;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        color: #6c757d;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 500;
        font-size: 0.95rem;
        margin-bottom: 8px;
        transition: all 0.2s ease;
    }

    .nav-link i {
        width: 20px;
        text-align: center;
    }

    /* Hover Desktop */
    .nav-link:hover {
        background-color: #f8f9fa;
        color: #4a7ee3;
        transform: translateX(5px);
    }

    /* Active Desktop (Soft Blue) */
    .nav-link.active {
        background-color: rgba(74, 126, 227, 0.1);
        color: #4a7ee3;
        font-weight: 700;
    }

    .sidebar-footer {
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
        text-align: center;
        color: #adb5bd;
    }

    /* --- MOBILE STYLING (Giữ nguyên logic code cũ của bạn) --- */
    @media (max-width: 900px) {
        .sidebar {
            width: 100vw;
            position: static; /* Không dính nữa */
            display: flex;
            flex-direction: row; /* Xếp ngang */
            justify-content: space-around;
            padding: 0; /* Bỏ padding bao quanh */
            margin: 0 0 20px 0; /* Cách phần dưới ra chút */
            border-radius: 0;
            box-shadow: none;
            border: none;
            background: #fff; /* Nền trắng cho thanh nav */
            border-bottom: 1px solid #eee;
            min-height: auto;
        }

        .nav-link {
            flex: 1; /* Chia đều chiều rộng */
            margin: 0;
            padding: 14px 0; /* Padding trên dưới như cũ */
            text-align: center;
            border-radius: 0; /* Vuông góc */
            border: none;
            justify-content: center; /* Căn giữa nội dung */
            font-size: 1rem;
            flex-direction: row; /* Icon nằm ngang với chữ */
            gap: 8px;
        }

        /* Active Mobile (Giữ đúng màu xanh đậm bạn muốn) */
        .nav-link.active {
            background-color: #4a7ee3; /* Màu xanh Solid */
            color: #ffffff;
            font-weight: 600;
        }

        /* Bỏ các hiệu ứng Desktop không cần thiết trên Mobile */
        .nav-link:hover {
            transform: none;
            background-color: transparent; /* Hoặc #ddd tùy bạn */
            color: inherit;
        }
        
        .nav-link.active:hover {
             background-color: #4a7ee3;
             color: #fff;
        }

        .sidebar-footer {
            display: none; /* Ẩn footer trên mobile */
        }
    }

    @media (max-width: 480px) {
        .nav-link {
            font-size: 0.9rem;
            padding: 12px 0;
        }
        .nav-link i {
            display: none; /* Ẩn icon trên màn hình siêu nhỏ nếu cần chỗ */
        }
    }
</style>