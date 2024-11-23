<?php

// 관리자 화면에서 글 메뉴만 보이게
function restrict_admin_menu_for_subscribers()
{
    if (is_admin()) {
        $user = wp_get_current_user();
        if (in_array('subscriber', (array) $user->roles) || in_array('editor', (array) $user->roles)) { // 구독자 또는 편집자 권한일 경우 실행할 코드
            remove_menu_page('index.php'); // 대시보드
            remove_menu_page('edit.php?post_type=page'); // 페이지
            remove_menu_page('edit-comments.php'); // 댓글
            remove_menu_page('themes.php'); // 테마
            remove_menu_page('plugins.php'); // 플러그인
            remove_menu_page('upload.php'); // 미디어
            remove_menu_page('users.php'); // 사용자
            remove_menu_page('tools.php'); // 도구
            remove_menu_page('options-general.php'); // 설정
            remove_menu_page('profile.php'); // 프로필 메뉴 숨기기

            // 2. "메뉴 접기" 제거를 위한 JavaScript 추가
            add_action('admin_footer', function () {
                ?>
                <script type="text/javascript">
                    document.addEventListener('DOMContentLoaded', function() {
                        // "메뉴 접기" 버튼 숨기기
                        var collapseButton = document.getElementById('collapse-button');
                        if (collapseButton) {
                            collapseButton.style.display = 'none';
                        }
                    });
                </script>
                <?php
});
        }
    }
}
add_action('admin_menu', 'restrict_admin_menu_for_subscribers', 99);

// 구독자의 경우 자신의 글 목록만 볼 수 있게
function restrict_posts_to_own($query)
{
    // 관리자 화면 & 글(post) 목록에서만 적용
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'post') {
        $user = wp_get_current_user();

        // 구독자인 경우 자신의 게시물만 표시
        if (in_array('subscriber', (array) $user->roles) || in_array('editor', (array) $user->roles)) { // 구독자 또는 편집자 권한일 경우 실행할 코드
            $query->set('author', $user->ID); // 자신의 게시물만 쿼리
        }
    }
}
add_action('pre_get_posts', 'restrict_posts_to_own');

// 메뉴 이름을 '내 글 목록'으로 변경
function change_menu_label_for_subscriber()
{
    $user = wp_get_current_user();
    if (in_array('subscriber', $user->roles)) {
        global $menu;
        foreach ($menu as &$item) {
            if ($item[0] === '글') {
                $item[0] = '내 글 목록'; // 메뉴 이름 변경
                break;
            }
        }
    }
}
add_action('admin_menu', 'change_menu_label_for_subscriber', 999);

// 태그 박스를 체크박스 형태로
function customize_tag_box_for_subscribers()
{
    $user = wp_get_current_user();
    if (in_array('subscriber', (array) $user->roles) || in_array('editor', (array) $user->roles)) { // 구독자 또는 편집자 권한일 경우 실행할 코드
        echo '<style>
            /* 태그 리스트에 고정 높이와 스크롤 추가 */
            .tag-checkbox-list {
                max-height: 200px; /* 고정 높이 */
                overflow-y: auto; /* 스크롤 추가 */
                border: 1px solid #ddd; /* 박스 테두리 */
                padding: 10px;
                margin-bottom: 20px;
            }
            /* 한 줄에 여러 개의 태그 체크박스 배치 */
            .tag-checkbox-list label {
                display: inline-block;
                width: 45%; /* 한 줄에 두 개씩 배치 */
                margin-bottom: 5px;
                white-space: nowrap; /* 텍스트 줄바꿈 방지 */
            }
        </style>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#post_tag .ajaxtag").css("margin-top", "20px");

                // 모든 태그를 체크박스 형태로 나열
                $.ajax({
                    url: ajaxurl,
                    type: "POST",
                    data: {
                        action: "get_all_tags"
                    },
                    success: function(response) {
                        var tagList = JSON.parse(response);
                        var checkboxHTML = "<div class=\'tag-checkbox-list\'><p>태그를 선택하세요:</p>";
                        tagList.forEach(function(tag) {
                            checkboxHTML += "<label><input type=\'checkbox\' name=\'tax_input[post_tag][]\' value=\'" + tag.term_id + "\'> " + tag.name + "</label>";
                        });
                        checkboxHTML += "</div>";
                        $("#post_tag").prepend(checkboxHTML);
                    }
                });
            });
        </script>';
    }
}
add_action('admin_footer-post.php', 'customize_tag_box_for_subscribers');
add_action('admin_footer-post-new.php', 'customize_tag_box_for_subscribers');

// 태그 데이터를 가져오는 Ajax 콜백 함수
function get_all_tags_callback()
{
    $tags = get_terms(array(
        'taxonomy' => 'post_tag',
        'hide_empty' => false,
    ));
    echo json_encode($tags);
    wp_die();
}
add_action('wp_ajax_get_all_tags', 'get_all_tags_callback');

// 태그 안내문구 변경
function customize_tag_box_help_text_for_subscribers()
{
    $user = wp_get_current_user();
    if (in_array('subscriber', (array) $user->roles) || in_array('editor', (array) $user->roles)) { // 구독자 또는 편집자 권한일 경우 실행할 코드
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                // 태그 안내 문구 변경
                $("#new-tag-post_tag-desc").text("태그가 없을 경우 태그 추가 가능. 여러 개의 태그 추가는 쉼표로 분리");
            });
        </script>
        <?php
}
}
add_action('admin_head-post.php', 'customize_tag_box_help_text_for_subscribers');
add_action('admin_head-post-new.php', 'customize_tag_box_help_text_for_subscribers');

// 미디어 추가 --> 파일 추가
function customize_editor_for_subscribers()
{
    $user = wp_get_current_user();
    if (in_array('subscriber', (array) $user->roles) || in_array('editor', (array) $user->roles)) { // 구독자 또는 편집자 권한일 경우 실행할 코드
        echo '<style>
            /* 비주얼 탭 숨기기 */
            #content-tmce, /* 비주얼 탭 버튼 */
            #wp-content-editor-tools .wp-editor-tabs span { display: none !important; }

            /* 입력 박스 맨 아래 상태 정보 숨기기 */
            #wp-content-wrap .wp-editor-meta { display: none !important; }
        </style>';

        echo '<script type="text/javascript">
            jQuery(document).ready(function($) {
                /* "미디어 추가" 버튼의 텍스트를 "파일 추가"로 변경 */
                $("#insert-media-button").attr("title", "파일 추가").text("파일 추가");

                /* 텍스트 탭만 활성화 (비주얼 탭 강제 비활성화) */
                if ($("#content-tmce").hasClass("active")) {
                    $("#content-tmce").removeClass("active");
                    $("#content-html").addClass("active");
                    $("#wp-content-wrap").removeClass("tmce-active").addClass("html-active");
                }
            });
        </script>';
    }
}
add_action('admin_head-post.php', 'customize_editor_for_subscribers');
add_action('admin_head-post-new.php', 'customize_editor_for_subscribers');

// 불필요한 요소 모두 숨기기
function hide_admin_bar_comments()
{
    $user = wp_get_current_user();
    if (in_array('subscriber', (array) $user->roles) || in_array('editor', (array) $user->roles)) { // 구독자 또는 편집자 권한일 경우 실행할 코드
        echo '<style>
        #submitdiv .postbox-header,
        #wp-admin-bar-comments,
        #wp-admin-bar-new-content,
        #wp-admin-bar-top-secondary,
        span.order-higher-indicator,
        span.order-lower-indicator,
        span.toggle-indicator,
        #wpfooter,
        #ed_toolbar,
        .wp-editor-tabs,
        .mce-toolbar-grp,
        #post-status-info,
        #save-post, /* 임시글로 저장 버튼 숨기기 */
        #post-preview, /* 미리보기 버튼 숨기기 */
        .misc-pub-section, /* 상태, 가시성, 즉시발행 숨기기 */
        #minor-publishing, /* 공개 박스 하단 숨기기 */
        #contextual-help-link-wrap, /* 도움말 메뉴 */
        #screen-options-link-wrap, /* 화면 옵션 */
        #postimagediv, /* 특성이미지 설정 탭 숨기기 */
        #edit-slug-box, /* 고유주소 편집 라인 숨기기 */
        #category-add-toggle, /* 새 카테고리 추가 */
        .categorydiv #category-tabs>li,
        #tagsdiv-post_tag .tagcloud-link
        { display: none; }
        #major-publishing-actions
        { background: transparent; }</style>';
    }
}
add_action('admin_head', 'hide_admin_bar_comments');
