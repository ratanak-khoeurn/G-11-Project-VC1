<!-- ! Body -->
<?php
require "./database/database.php";
require "./models/admin/restuarant/resturant.process.php";
require "./models/comments/comments.model.php";
require './models/order/add.cart.model.php';

?>
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="#" class="logo-wrapper" title="Home">
                    <span class="sr-only">Home</span>
                    <?php
                    if (isset($_SESSION['manager']['user_id'])) {
                        $names = get_logo_restaurant($_SESSION['manager']['user_id']);
                    }
                    ?>
                    <span class="icon logo" aria-hidden="true"></span>
                    <div class="logo-text">
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <img src="../../assets/images/logo_web.png" alt="" style="width: 80px; height: 80px; border-radius: 50%; margin-right: 10px">
                        <?php elseif (isset($_SESSION['manager'])) : ?>
                            <img src="../../assets/images/restaurant/<?= $names['image'] ?>" alt="" style="width: 80px; height: 80px; border-radius: 50%; margin-right: 10px">
                            <span style="margin-top: 15px;"><?= $names['name'] ?></span>
                        <?php else : ?>
                            <img src="../../assets/images/logo_web.png" alt="" style="width: 80px; height: 80px; border-radius: 50%; margin-right: 10px">
                        <?php endif; ?>
                    </div>

                </a>

            </div>
            <?php
            if (isset($_SESSION['delivery'])) :

            ?>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="active" href="/admin_admin"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                        </li>
                        <li>
                            <a class="active" href="/deliver_new_order"><span class="icon home" aria-hidden="true"></span>New order</a>
                            <span class="msg-counter"><?=count_delivery_order() ?></span>
                        </li>
                        <li>
                            <a class="active" href="/history_deliver"><span class="icon home" aria-hidden="true"></span>History</a>
                        </li>
                        <li>
                            <a class="active" href="/direction"><span class="icon home" aria-hidden="true"></span>Direction</a>
                        </li>
                    <?php
                else : ?>
                        <div class="sidebar-body">
                            <ul class="sidebar-body-menu">
                                <li>
                                    <a class="active" href="/admin_admin"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                                </li>
                                <?php if (!isset($_SESSION['manager'])) : ?>
                                    <li>
                                        <a href="<?php echo isset($_SESSION['admin']) ? '/add_user' : '#'; ?>">
                                            <span class="icon edit" aria-hidden="true"></span>Add User
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo isset($_SESSION['admin']) ? '/restaurant_admin' : '#'; ?>">
                                            <span class="icon edit" aria-hidden="true"></span>Restaurants
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="/product_admin"><span class="icon edit" aria-hidden="true"></span>Products</a>
                                </li>
                                <li>
                                    <a href="/category"><span class="icon edit" aria-hidden="true"></span>Category</a>
                                </li>
                            </ul>
                            <ul class="sidebar-body-menu">
                                <?php if (!isset($_SESSION['manager'])) : ?>
                                    <li>
                                        <a href="<?php echo isset($_SESSION['admin']) ? '/add_admin' : '#'; ?>">
                                            <span class="icon edit" aria-hidden="true"></span>Admins
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo isset($_SESSION['admin']) ? '/manager_admin' : '#'; ?>">
                                            <span class="icon edit" aria-hidden="true"></span>Restaurant's manager
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="/deliverer_admin"><span class="icon edit" aria-hidden="true"></span>Deliverers</a>
                                </li>
                                <li>
                                    <a href="/customer_admin"><span class="icon edit" aria-hidden="true"></span>Customers</a>
                                </li>
                                <li>
                                    <a class="show-cat-btn" href="##">
                                        <span class="icon paper" aria-hidden="true"></span>Orders
                                        <span class="msg-counter">
                                            <?php
                                            if (isset($_SESSION['user']['role'])) {
                                                if ($_SESSION['user']['role'] == 'admin') {
                                                    echo count(accept_order_admin());
                                                } else {
                                                    if (isset($_SESSION['manager']['user_id'])) {
                                                        $inprogressCount = count(inprogress($_SESSION['manager']['user_id']));
                                                    } else {
                                                        $inprogressCount = 0; 
                                                    }
                                                    echo count(accept_order_admin()) + $inprogressCount;
                                                }
                                            } else {
                                                echo 'Error: User role not set';
                                            }
                                            ?>
                                        </span>

                                        </span>
                                    </a>
                                    <ul class="cat-sub-menu">
                                        <li>
                                            <a href="/order">New Order</a>
                                            <span class="msg-counter"><?= count(accept_order_admin()) ?></span>

                                        </li>
                                        <li>
                                            <a href="/inprogress">In Progress</a>
                                            <span class="msg-counter">
                                                <?php
                                                if (isset($_SESSION['user']['role'])) {
                                                    if ($_SESSION['user']['role'] == 'admin') {
                                                        echo count(accept_order_admin());
                                                    } else {
                                                        if (isset($_SESSION['manager']['user_id'])) {
                                                            $inprogressCount = count(inprogress($_SESSION['manager']['user_id']));
                                                        } else {
                                                            $inprogressCount = 0; // Set a default value if $_SESSION['manager']['user_id'] is null
                                                        }
                                                        echo $inprogressCount;
                                                    }
                                                } else {
                                                    echo 'Error: User role not set';
                                                }
                                                ?>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="/done">Order Done</a>
                                        </li>
                                    </ul>
                                <li>
                                    <a href="/comment">
                                        <span class="icon message" aria-hidden="true"></span>Comments
                                    </a>
                                    <span class="msg-counter"><?= count(get_comment()) ?></span>
                                </li>
                                <li>
                            </ul>
                        </div>
                    <?php
                endif;
                    ?>
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