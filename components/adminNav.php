<nav id="sidebar" class="img">
    <div class="p-4">
        <div class="" style="text-align: center;">
            <img src="../images/icons/footprint.png" style="width: 50px;">
            <h5 class="logo text-white">
                <small>Online Veterenary System</small>
            </h5>
        </div>
        <hr class="text-white">
        <ul class="list-unstyled components mb-5">
            <?php
            $splitedLink = explode("/", $_SERVER['REQUEST_URI']);
            $currLink = $splitedLink[count($splitedLink) - 1];

            $links = array(
                "admin.php" => "Appointments",
                "prev-appointment.php" => "Previous Appointments",
                "products.php" => "Products",
                "add-products.php" => "Add Products",
                "add-admin.php" => "Add Admin",
                "admin-list.php" => "Admin List"
            );

            $icons = array(
                "fa-calendar",
                "fa-calendar-check-o",
                "fa-cart-plus",
                "fa-plus",
                "fa-user",
                "fa-th-list"
            );
            $counter = 0;
            foreach ($links as $link => $title) :
                if ($link == $currLink) :
            ?>
                    <li class="active">
                        <a href="<?php echo $link ?>"><span class="fa <?php echo $icons[$counter] ?> mr-3"></span> <?php echo $title ?></a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?php echo $link ?>"><span class="fa <?php echo $icons[$counter] ?> mr-3"></span> <?php echo $title ?></a>
                    </li>
            <?php
                endif;
                $counter++;
            endforeach;
            ?>
            <li>
                <a href="../php/logout.php"><span class="fa fa-power-off mr-3"></span> Logout</a>
            </li>
        </ul>
    </div>
</nav>