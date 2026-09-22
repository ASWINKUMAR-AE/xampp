<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar">
    <div class="sidebar-header">
        <i class="fas fa-hotel"></i>
        <span>PG Admin</span>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="index.php" class="menu-item <?= $current_page == 'index.php' ? 'active' : '' ?>">
                <i class="fas fa-th-large"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="view_students.php" class="menu-item <?= $current_page == 'view_students.php' ? 'active' : '' ?>">
                <i class="fas fa-users"></i>
                <span>Students</span>
            </a>
        </li>
        <li>
            <a href="add_student.php" class="menu-item <?= $current_page == 'add_student.php' ? 'active' : '' ?>">
                <i class="fas fa-user-plus"></i>
                <span>Add Student</span>
            </a>
        </li>
        <li>
            <a href="rooms.php" class="menu-item <?= $current_page == 'rooms.php' ? 'active' : '' ?>">
                <i class="fas fa-door-open"></i>
                <span>Rooms</span>
            </a>
        </li>
        <li>
            <a href="payments.php" class="menu-item <?= $current_page == 'payments.php' ? 'active' : '' ?>">
                <i class="fas fa-wallet"></i>
                <span>Payments</span>
            </a>
        </li>
        <li>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div>
