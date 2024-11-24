<?php get_header(); ?>

    <!-- Row 2: 사이드바와 콘텐츠 -->
    <div class="row">
        <!-- 사이드바 (4컬럼) -->
        <div class="col-4">
            <!-- 프로젝트 단계 카드 섹션 -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-folder-fill"></i> <?php _e('프로젝트 단계', 'your-theme-textdomain'); ?>
                </div>
                <div class="card-body card__group">
                    <?php
                    // 태그 항목을 동적으로 표시
                    $tags = get_terms( array(
                        'taxonomy' => 'post_tag', // 태그 텍소노미
                        'orderby'  => 'name',
                    ) );

                    if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) :
                        foreach ( $tags as $tag ) :
                    ?>
                            <span class="fs-7 badge badge__blue"><a class="my_badge" href="<?php echo esc_url( get_term_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?> (<?php echo $tag->count; ?>)</a></span>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <!-- 콘텐츠 영역 (8컬럼) -->
        <div class="col-8">
            <div class="content">
                <h2><?php single_tag_title(); ?></h2>
                <div class="tag-description">
                    <?php echo tag_description(); ?>
                </div>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="post-meta">
                        <span class="post-date"><?php the_date(); ?></span>
                        <span class="post-author"><?php the_author(); ?></span>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endwhile; else : ?>
                    <p><?php _e( '죄송합니다. 해당 태그에는 게시물이 없습니다.', 'your-theme-textdomain' ); ?></p>
                <?php endif; ?>

                <!-- 페이지네이션 -->
                <div class="pagination">
                    <?php echo paginate_links(); ?>
                </div>
            </div>
        </div>
    </div>

    <hr>

<?php get_footer(); ?>
