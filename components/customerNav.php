<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: -moz-linear-gradient(top, #7579ff, #b224ef);">
    <a class="navbar-brand" href="#">
        <img src="../images/icons/footprint.png" style="width: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            $splitedLink = explode("/", $_SERVER['REQUEST_URI']);
            $currLink = $splitedLink[count($splitedLink) - 1];

            $links = array(
                "customer.php" => "Catalog",
                "profile.php" => "My Profile",
                "set-appointment.php" => "Set Appointment",
                "appointment.php" => "My Appointment"
            );
            foreach ($links as $link => $title) :
            ?>
                <?php
                if ($title == "Catalog") {
                ?>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="../pages/<?php echo "$link?page=all" ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $title ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $categories = array(
                                "All",
                                "Accessories",
                                "Bed",
                                "Houses",
                                "Bowls",
                                "Feeders",
                                "Cleaning Tools",
                                "Toilet",
                                "Toys",
                                "Vitamins",
                                "Medicines",
                                "Treats"
                            );
                            foreach ($categories as $category) :
                            ?>
                                <a class="dropdown-item" href="../pages/<?php echo "$link?page=$category" ?>"><?php echo $category ?></a>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </li>
                <?php
                } else if ($link == $currLink) {
                ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="../pages/<?php echo $link ?>"> <?php echo $title ?><span class="sr-only">(current)</span></a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/<?php echo $link ?>"> <?php echo $title ?></a>
                    </li>
            <?php
                }
            endforeach;
            ?>


        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-danger my-2 my-sm-0" type="button" onclick="return window.location.href = '../php/logout.php'">Logout</button>
        </form>
    </div>
</nav>