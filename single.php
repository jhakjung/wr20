<?php get_header(); ?>

    <?php get_template_part('template-parts/section', 'aside'); ?>

    <!-- 콘텐츠 영역 (8컬럼) -->
    <div class="col-8">
        <div class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <div class="post-meta">
                    <span class="post-date"><?php the_date(); ?></span>
                    <span class="post-author"><?php the_author(); ?></span>
                </div>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; else : ?>
                <p><?php _e( '죄송합니다. 해당 게시물이 없습니다.', 'your-theme-textdomain' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<hr>


