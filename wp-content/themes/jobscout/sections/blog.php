<?php

/**
 * Blog Section
 * 
 * @package JobScout
 */

$blog_heading = get_theme_mod('blog_section_title', __('NEWEST BLOG ENTRIES', 'jobscout'));

$hide_author  = get_theme_mod('ed_post_author', false);
$hide_date    = get_theme_mod('ed_post_date', false);
$ed_blog      = get_theme_mod('ed_blog', true);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <?php
    if ($blog_heading) echo '<h2 class="title-card">' . esc_html($blog_heading) . '</h2>';
    ?>
    <div class="container-card">



        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="card">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" loading="lazy">
                <?php else : ?>
                    <img src="https://placehold.co/200x200" alt="Placeholder image" loading="lazy">
                <?php endif; ?>
                <div class="card-body">
                    <h2><?php echo mb_strimwidth(get_the_title(), 0, 35, ''); ?></h2>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                    <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif;
wp_reset_postdata();
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    .title-card {
        text-align: center;
        /* Căn giữa tiêu đề */
        margin: 0 auto;
        margin-top: 50px;
        margin-bottom: 10px;
    }

    .container-card {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        /* Căn giữa các thẻ con */
        align-items: center;
        /* Căn giữa theo chiều dọc nếu cần */
        padding: 20px;
        /* Đảm bảo container nằm giữa */
        width: 100%;
        /* Đảm bảo container chiếm toàn bộ chiều ngang */
        /* Giới hạn chiều rộng nếu cần */
        box-sizing: border-box;
        /* Đảm bảo padding không ảnh hưởng đến kích thước */
        border: none;
    }


    .card {
        margin: 15px;
        margin-bottom: 35px;
        display: flex;
        flex-direction: row;
        background-color: #ffffff;
        width: 550px;
    }

    .card img {
        width: 200px;
        height: 200px;
        margin: 20px 10px 20px 20px;
        border-radius: 4px;
    }

    .card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 300px;

    }

    .card-body h2 {
        font-size: 20px;
        margin: 0 0 10px;
        font-weight: bold;
        padding-right: 30px;
    }

    .card-body p {
        font-size: 16px;
        color: #6c757d;
        margin: 0px 0 10px;
    }

    .card-body a {
        color: #ff6f00;
        text-decoration: none;
        font-weight: bold;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .card-body a:hover {
        color: #e65100;
    }
</style>