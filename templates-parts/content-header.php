<header class="encabezado">
        <div class="container-fluid gx-5 py-3">
            <div class="row">
                <div class="encabezado__hamburguesa col-2">
                    <a href="<?php echo home_url();?>">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon-menu.svg" alt="menu icon">
                    </a>
                </div>
                <div class="enbezado__logo col-5 col-md-2 px-2 px-md-4">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.svg" width="100%" alt="Yard Sales">
                    </a>
                </div>
                <div class="encabezado__menu col-6 col-md-5">
                    <?php 
                        wp_nav_menu(
                            array(
                                "menu" => 'main-menu'
                            )
                        )
                    ?>
                </div>
                <div class="encabezado__cart col-5 col-md-1">
                    <a href="sign_in.html" class="encabezado_sign-in">
                        <?php do_action("xtiv_signin") ?>
                    </a>
                    <a href="#" class="encabezado__link active">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/header-empty-card.svg" alt="cart">
                    </a>
                </div>
            </div>
            <div class="encabezado__menu-responsive">
                    <?php 
                        wp_nav_menu(
                            array(
                                "menu" => 'responsive-menu'
                            )
                        )
                    ?>
            </div>
        </div>
    </header>