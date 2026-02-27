<footer class="dashboard-footer">
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> BitBalance. All rights reserved.</p>
        <div class="footer-links">
            <a href="<?= BASE_URL ?>terms.php" target="_blank">Terms and Conditions</a>
            <i class="fas fa-external-link-alt link-icon"></i>
        </div>
    </div>
</footer>

<style>
    .dashboard-footer {
        text-align: center;
        transition: all 0.3s ease;
    }

    .footer-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }

    .dashboard-footer p {
        margin: 0;
        color: #adb5bd;
        /* Màu xám nhạt trung tính */
        font-size: 0.85rem;
        font-weight: 500;
    }

    .footer-links {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .dashboard-footer a {
        color: #6c757d;
        /* Màu xám đậm hơn chút so với text thường */
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: color 0.2s ease;
        position: relative;
    }

    /* Hiệu ứng gạch chân khi hover */
    .dashboard-footer a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 1px;
        bottom: -2px;
        left: 0;
        background-color: #4a7ee3;
        /* Màu xanh thương hiệu */
        transition: width 0.3s ease;
    }

    .dashboard-footer a:hover {
        color: #4a7ee3;
    }

    .dashboard-footer a:hover::after {
        width: 100%;
    }

    .link-icon {
        font-size: 0.7rem;
        color: #adb5bd;
        opacity: 0.8;
    }

    /* --- RESPONSIVE --- */

    @media (max-width: 900px) {
        .dashboard-footer {
            /* Mobile: Bỏ margin vì sidebar đã ẩn/chuyển vị trí */
            margin-left: 0;
            margin-right: 0;
            padding-bottom: 80px;
            /* Chừa chỗ cho Sidebar Mobile nếu nó dính dưới đáy */
        }
    }

    /* --- DARK MODE --- */
    [data-theme="dark"] .dashboard-footer p {
        color: #6c757d;
    }

    [data-theme="dark"] .dashboard-footer a {
        color: #adb5bd;
    }

    [data-theme="dark"] .dashboard-footer a:hover {
        color: #4a7ee3;
    }
</style>