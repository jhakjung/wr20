<!-- Row 4: 성과물 Section with Nested Table -->
<?php
// "document" 카테고리의 자식 카테고리 가져오기
$parent_category_id = get_cat_ID('성과물'); // "성과물" 카테고리의 ID
$args = [
    'parent' => $parent_category_id, // 부모 카테고리 ID로 자식 카테고리 가져오기
    'hide_empty' => false, // 사용되지 않은 카테고리도 포함
    'orderby' => 'slug', // 슬러그명으로 정렬
    'order' => 'ASC', // 오름차순 정렬
];
$child_categories = get_categories($args);

// 성과물 섹션 출력 시작
?>
<div class="section-title"><i class="fa fa-folder" aria-hidden="true"></i> 성과물</div>
<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php
// 자식 카테고리마다 .card를 출력
    foreach ($child_categories as $category):
    // 각 자식 카테고리에서 게시글 리스트 가져오기
        $category_posts = new WP_Query([
            'cat' => $category->term_id, // 해당 카테고리의 게시글
            'posts_per_page' => -1, // 모든 게시글 출력
            'post_status' => 'publish', // 공개된 게시글만
        ]);
    ?>
    <div class="col">
        <div class="card">
            <a class="card-header text-center badge__light" href="<?php echo get_category_link($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>
            <ul class="list-group list-group-flush">
                <?php if ($category_posts->have_posts()): ?>
                    <?php while ($category_posts->have_posts()):
                        $category_posts->the_post();?>
                        <li class="list-group-item"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                    <?php endwhile;
                    wp_reset_postdata(); // 쿼리 후 데이터 초기화
                    else: ?>
                        <li class="list-group-item">등록된 문서가 없습니다.</li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <?php endforeach;?>
</div> <!-- end of 성과물 -->

<hr>