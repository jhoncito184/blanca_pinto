<div class="blanca__nav">
    <div class="overlay"></div>
    <nav id="responsive">
        <div id="main2">
            <div class="header__list menu">
                <div class="navbar-wrapper">
                    <?php
                        $menuitems = wp_nav_menu(
                            array(
                                'theme_location' => 'header',
                                'menu_class' => 'navbar-menu-list',
                            )
                        );

                        $menu_name = 'header'; //menu slug
                        $locations = get_nav_menu_locations();
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );                                
                    ?>
                    <!-- <select id="menu-list-mobile">
                        <option value="" disabled selected>Selecciona</option>
                        <?php
                            for($i = 0; $i < count($menuitems);$i++) {
                        ?>
                        <option value="<?php echo $menuitems[$i]->title; ?>"><?php echo $menuitems[$i]->title; ?></option>
                        <?php
                            }
                        ?>
                    </select> -->
                </div>
            </div>
        </div>
    </nav>
    <header>
        <div class="head-bar">
            <div class="icons">
                <a class="icon_hamburguer" href="javascript:void(0);">
                    <div class="hamburguer"></div>
                </a>
            </div>
        </div>
    </header>
</div>