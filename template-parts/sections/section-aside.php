<aside class="col-lg-4 mb-4">
    <div class="myWidget p-3 pb-2 border mb-3">
        <?php dynamic_sidebar('sidebar1'); ?>
    </div>
    <div class="myWidget p-3 pb-2 border">
        <div id="categories-2" class="widget-2">
            <h5 class="text-dark text-center"><i class="fas fa-folder-open" aria-hidden="true"></i> 카테고리</h5>
            <ul class="category-list-inline">
                <?php
                $categories = get_categories(array(
                    'hide_empty' => 0,
                ));
                foreach ($categories as $category) {
                    echo '<li class="cat-item cat-item-' . $category->term_id . '" style="display: inline;"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '(' . $category->count . ')</a></li>';
                    echo ', ';
                }
                ?>
            </ul>
        </div>
        <hr>
        <?php dynamic_sidebar('sidebar2'); ?>
    </div>


</aside>