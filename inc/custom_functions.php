<?php

// 즐겨찾기 리스트 가져오기
function custom_get_favorite_list()
{
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
    <?php endif;

}