<!-- Row 2: 사이드바와 콘텐츠 -->
<div class="row">
    <!-- 사이드바 (4컬럼) -->
    <div class="col-4">
        <!-- 즐겨찾기 카드 섹션 -->
        <div class="card mb-3">
            <h5 class="card-header text-center text-dark">
                <i class="fa fa-star"></i> 즐겨찾기</span>
            </h5>

            <!-- <div class="card-body card__group"> -->
            <div class="card-body card__group favoriteList d-flex justify-content-center mb-3 gap-2">
            <?php
                // "즐겨찾기" 카테고리의 슬러그로 게시글을 조회
                $favorite_category = 'favorites'; // "즐겨찾기" 카테고리 슬러그
                $args = [
                    'category_name' => $favorite_category, // 슬러그로 카테고리 필터링
                    'posts_per_page' => -1, // 모든 게시글 출력
                    'post_status' => 'publish', // 공개된 게시글만
                ];
                $query = new WP_Query($args);

                // 게시글이 있을 경우 제목 출력
                if ($query->have_posts()):
                    while ($query->have_posts()): $query->the_post();?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-danger"><?php the_title(); ?></a>
                    <?php endwhile;
                    wp_reset_postdata(); // 쿼리 후 글로벌 $post 객체 초기화
                else: ?>
                    <p>즐겨찾기 카테고리에 게시글이 없습니다.</p>
                <?php endif;?>
            </div> <!-- end of favorites -->
            <!-- </div> -->
        </div>
    </div>