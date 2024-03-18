<!-- ! Body -->
<?php
// session_start();
?>
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="/" class="logo-wrapper" title="Home">
                    <span class="sr-only">Home</span>
                    <span class="icon logo" aria-hidden="true"></span>
                    <div class="logo-text">
                        <img src="../../assets/images/logo_web.png" alt="" style="width: 80px; height: 80px; border-radius: 50%;margin-right:10px">
                    </div>
                </a>

            </div>
            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    <li>
                        <a class="active" href="/admin_admin"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                    </li>
                    <li>
                        <a href="
                        <?php
                        if (isset($_SESSION['admin'])) {
                            echo '/add_user';
                        } else {
                            echo '#';
                        }
                        ?>
                        "><span class="icon edit" aria-hidden="true"></span>Add User</a>
                    </li>
                    <li>
                        <a href="
                        <?php
                        if (isset($_SESSION['admin'])) {
                            echo '/restaurant_admin';
                        } else {
                            echo '#';
                        }
                        ?>
                        
                        "><span class="icon edit" aria-hidden="true"></span>Restaurants</a>
                    </li>
                    <li>
                        <a href="/product_admin"><span class="icon edit" aria-hidden="true"></span>Products</a>
                    </li>
                    <li>
                        <a href="/category"><span class="icon edit" aria-hidden="true"></span>Category</a>
                    </li>

                </ul>
                <ul class="sidebar-body-menu">
                    <li>
                        <a href="
                        <?php
                        if (isset($_SESSION['admin'])) {
                            echo '/add_admin';
                        } else {
                            echo '#';
                        }
                        ?>
               "><span class="icon edit" aria-hidden="true"></span>Admins</a>
                    </li>
                    <li>
                        <a href="
                        <?php
                        if (isset($_SESSION['admin'])) {
                            echo '/manager_admin';
                        } else {
                            echo '#';
                        }
                        ?>
                        "><span class="icon edit" aria-hidden="true"></span>Restaurant's manager</a>
                    </li>
                    <li>
                        <a href="/deliverer_admin"><span class="icon edit" aria-hidden="true"></span>Deliverers</a>
                    </li>
                    <li>
                        <a href="/customer_admin"><span class="icon edit" aria-hidden="true"></span>Customers</a>
                    </li>

                    <li>
                        <a href="comments.html">
                            <span class="icon message" aria-hidden="true"></span>
                            Comments
                        </a>
                        <span class="msg-counter">7</span>
                    </li>
                    <li>
                        <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
            <a href="##" class="sidebar-user">
                <span class="sidebar-user-img">
                    <picture>
                        <source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                    </picture>
                </span>
                <div class="sidebar-user-info">
                    <span class="sidebar-user__title">Nafisa Sh.</span>
                    <span class="sidebar-user__subtitle">Support manager</span>
                </div>
            </a>
        </div>
    </aside>