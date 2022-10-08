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
                            <div class="blanca__banner_title">
                                <?php while ( have_rows( 'home__banner_title' ) ) : the_row(); ?>
                                    <p style="color: <?php the_sub_field( 'title_color' ); ?>"><?php the_sub_field( 'title_text' ); ?></p>
                                <?php endwhile; ?>
                            </div>
                            <div class="blanca__banner_text"></div>
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
            <?php endif; ?>
        <?php endwhile; else: endif; ?>
    </div>

    <?php get_footer(); ?>

  </body>
</html>