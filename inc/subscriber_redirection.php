<?php

add_action('admin_init', function () {
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();

        // 현재 사용자의 역할 확인
        if (in_array('subscriber', $current_user->roles)) {
            // 'post-new.php'에 대한 예외 처리
            $current_page = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

            if (strpos($current_page, 'post-new.php') === false) {
                // 홈 화면으로 리디렉션
                wp_safe_redirect(home_url());
                exit;
            }
        }
    }
});

function hide_admin_bar_for_subscribers()
{
    $user = wp_get_current_user();
    if (in_array('subscriber', (array) $user->roles)) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action('after_setup_theme', 'hide_admin_bar_for_subscribers');
