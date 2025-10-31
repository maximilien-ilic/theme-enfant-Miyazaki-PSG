<article <?php post_class( 'section-inner' ); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>


	<?php endif; ?>
    <div class="content">
        <header class="entry-header">

            <?php 
            
            the_title( '<h1 class="entry-title">', '</h1>' );
            
            if ( has_excerpt() ) : 
                ?>

                <div class="intro-text">
                    <?php the_excerpt(); ?>
                </div>

                <?php
            endif;

            // Single top post meta
            miyazaki_the_post_meta( $post->ID, 'single-top' );

            ?>

        </header><!-- .entry-header -->

        <div class="post-inner">

            <div class="text">

                <?php 
                
                the_content();
                wp_link_pages();

                ?>

            </div><!-- .entry-content -->


        </div><!-- .post-inner -->
    </div>
</article><!-- .post -->
