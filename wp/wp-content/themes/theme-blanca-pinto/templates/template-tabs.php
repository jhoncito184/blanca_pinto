<?php
/*
Template Name: Tabs
*/
?>

<?php get_header(); ?>

<div class="blanca">
	<div class="blanca__banner">
		<?php if (have_posts() ): while( have_posts() ): the_post(); ?>
            <?php if (get_the_title() == 'Home') : ?>
                <div class="blanca__banner_home">
                    <?php while ( have_rows( 'home__banner' ) ) : the_row(); ?>
                        <div class="blanca__banner_bck">
                            <picture>
                                <source srcset="<?php the_sub_field( 'home__banner_mobile' ); ?>" media="(max-width: 767px) and (orientation: portrait)">
                                <source srcset="<?php the_sub_field( 'home__banner_mobile' ); ?>" media="(max-width: 767px) and (orientation: landscape)">
                                <source srcset="<?php the_sub_field( 'home__banner_desktop' ); ?>" media="(min-width: 768px) and (max-width: 1000px)">
                                <source srcset="<?php the_sub_field( 'home__banner_desktop' ); ?>" media="(min-width: 1001px) and (max-width: 1440px)">
                                <source srcset="<?php the_sub_field( 'home__banner_desktop' ); ?>" media="(min-width: 1441px)"><img class="picture" src="<?php the_sub_field( 'home__banner_desktop' ); ?>">
                            </picture>
                        </div>
                        <div class="blanca__banner_text"></div>
                    <?php endwhile; ?>
                </div>                    
            <?php else: ?>
                <div class="blanca__banner_tabs" data-id="<?php the_title(); ?>">
                    <?php while ( have_rows( 'banner_bck' ) ) : the_row(); ?>
                        <div class="banner_bck">
                            <picture>
                                <source srcset="<?php the_sub_field( 'banner_bck_mobile' ); ?>" media="(max-width: 767px) and (orientation: portrait)">
                                <source srcset="<?php the_sub_field( 'banner_bck_mobile' ); ?>" media="(max-width: 767px) and (orientation: landscape)">
                                <source srcset="<?php the_sub_field( 'banner_bck_desktop' ); ?>" media="(min-width: 768px) and (max-width: 1000px)">
                                <source srcset="<?php the_sub_field( 'banner_bck_desktop' ); ?>" media="(min-width: 1001px) and (max-width: 1440px)">
                                <source srcset="<?php the_sub_field( 'banner_bck_desktop' ); ?>" media="(min-width: 1441px)"><img class="picture" src="<?php the_sub_field( 'banner_bck_desktop' ); ?>">
                            </picture>
                        </div>
                        <div class="blanca__banner_text"><?php the_sub_field( 'banner_bck_text' ); ?></div>
                    <?php endwhile; ?>
                </div>                    
            <?php endif; ?>
        <?php endwhile; else: endif; ?>
	</div>

	<?php get_template_part('includes/section','nav') ?>

	<?php if (have_posts() ): while( have_posts() ): the_post(); ?>
        <?php if (get_the_title() == 'Home') : ?>
            <div class="blanca__home">
                <div class="blanca__content">
                    <div class="blanca__home_title"><?php the_field( 'home__title' ); ?></div>
                    <div class="blanca__home_subtitle"><?php the_field( 'home__subtitle' ); ?></div>
                    <div class="blanca__home_text"><?php the_field( 'home__text' ); ?></div>
                </div>
            </div>
        <?php else: ?>
            <div class="blanca__tab" data-id="<?php the_title(); ?>">
                <div class="blanca__content">
                    <div class="blanca__tab_title"><?php the_field( 'tab__title' ); ?></div>
                    <div class="blanca__tab_subtitle"><?php the_field( 'tab__subtitle' ); ?></div>
                    <div class="blanca__tab_slogan"><?php the_field( 'tab__slogan' ); ?></div>
                    <div class="blanca__tab_content">
                        <?php the_field( 'tab__content' ); ?>
                        <div class="message">
                            <?php while ( have_rows( 'tab__message' ) ) : the_row(); ?>
                                <p style="color: <?php the_sub_field( 'tab__message_color' ); ?>"><?php the_sub_field( 'tab__message_text' ); ?></p>
                            <?php endwhile; ?>
                        </div>

                        <?php
                            $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
                            $pages = array();
                            $title = array();
                            foreach ($pagelist as $page) {
                                $pages[] += $page->ID;
                            }

                            $current = array_search(get_the_ID(), $pages);
                            $prevID = $pages[$current-1];
                            $nextID = $pages[$current+1];
                        ?>
                        <div class="posts" style="<?php if (empty($prevID)) { echo 'justify-content: end;'; } ?>">
                            <?php if (!empty($prevID)) { ?>
                                <a href="../<?php echo str_replace(' ', '-', strtolower(eliminar_acentos(get_the_title($prevID))) ); ?>"> 
                                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 512.006 512.006" style="enable-background:new 0 0 512.006 512.006;" xml:space="preserve">
                                        <g>
                                            <g></g>
                                            <path d="M388.419,475.59L168.834,256.005L388.418,36.421c8.341-8.341,8.341-21.824,0-30.165s-21.824-8.341-30.165,0    L123.586,240.923c-8.341,8.341-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251    c5.461,0,10.923-2.091,15.083-6.251C396.76,497.414,396.76,483.931,388.419,475.59z"></path>
                                        </g>
                                    </svg>
                                    <div class="text"><?php echo get_the_title($prevID); ?></div>
                                </a>
                            <?php }
                                if (!empty($nextID)) { ?>
                                <a href="../<?php echo str_replace(' ', '-', strtolower(eliminar_acentos(get_the_title($nextID))) ); ?>"> 
                                    <div class="text"><?php echo get_the_title($nextID); ?></div>
                                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                        <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001  c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213  C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606  C255,161.018,253.42,157.202,250.606,154.389z"></path>
                                    </svg>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; else: endif; ?>

</div>

<?php get_footer(); ?>

<?php
    function eliminar_acentos($cadena) {
        
        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç'),
        array('N', 'n', 'C', 'c'),
        $cadena
        );
        
        return $cadena;
    }
?>