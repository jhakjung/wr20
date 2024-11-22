<?php

// require get_template_directory() . '/inc/subscriber_editor_ui.php';
// require get_template_directory() . '/inc/subscriber_redirection.php';

// Theme resource FIles
function enqueue_custom_scripts()
{
    // wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', 'NULL', '5.3.0', false);
    wp_enqueue_script('fa-js', '//kit.fontawesome.com/61b7275f5f.js', 'NULL', '5.9.0', false);
    wp_enqueue_script('main-js', get_theme_file_uri('bundled.js'), 'NULL', '1.0', true);
    wp_enqueue_script('custom-js', get_theme_file_uri('/assets/scripts/custom.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('my-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// 메뉴 활성화s
function dev_features()
{
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'dev_features');

// 한글 문서, 아웃룩 문서 upload 가능하게
add_filter('upload_mimes', function ($existing_mimes) {
    $existing_mimes['hwp'] = 'application/hangul';
    $existing_mimes['hwpx'] = 'application/hangul';
    $existing_mimes['msg'] = 'application/vnd.ms-outlook';
    $existing_mimes['svg'] = 'application/msedge';
    $existing_mimes['dat'] = 'application/wordpad';
    $existing_mimes['dwg'] = 'application/cad';
    $existing_mimes['stp'] = 'application/cad';
    return $existing_mimes;
});

// 한글 문서 업로드 가능하게
function my_custom_mime_types($mimes)
{
    // New allowed mime types - 새롭게 허용하는 mime 타입
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['hwp'] = 'application/hangul';
    // Optional. Remove a mime type. - (선택 사항) mime type 제거
    unset($mimes['exe']);
    return $mimes;
}
add_filter('upload_mimes', 'my_custom_mime_types');

// favicon.ico 업로드 가능하게
function allow_favicon_upload($mime_types)
{
    $mime_types['ico'] = 'image/vnd.microsoft.icon'; // .ico 파일의 MIME 유형 추가
    return $mime_types;
}
add_filter('upload_mimes', 'allow_favicon_upload');
