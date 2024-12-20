<head>
    <!-- Thêm liên kết đến Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
/**
 * Job Posting Section
 * 
 * @package JobScout
 */

$job_title         = get_theme_mod('job_posting_section_title', __('Job Posting', 'jobscout'));
$ed_jobposting     = get_theme_mod('ed_jobposting', true);
$count_posts       = wp_count_posts('job_listing');

if ($ed_jobposting && jobscout_is_wp_job_manager_activated() && $job_title) :
?>
    <section id="job-posting-section" class="top-job-section">
        <div class="container">

            <h1 class="text-center mb-4 p2 mb-2">TOP JOBS</h1>

            <?php if (jobscout_is_wp_job_manager_activated() && $count_posts->publish != 0) : ?>
                <div class="row row-cols-1 row-cols-md-2 g-4" id="job-list">
                    <?php
                    $args = array(
                        'post_type'      => 'job_listing',
                        'post_status'    => 'publish',
                        'posts_per_page' => 6,
                        'meta_query'     => array(
                            'relation' => 'OR',
                            array(
                                'key'     => '_job_expires',
                                'value'   => date('Y-m-d'),
                                'compare' => '>=',
                                'type'    => 'DATE',
                            ),
                            array(
                                'key'     => '_job_expires',
                                'compare' => 'NOT EXISTS',
                            ),
                        ),
                    );

                    $jobs = new WP_Query($args);

                    if ($jobs->have_posts()) :
                        while ($jobs->have_posts()) :
                            $jobs->the_post();

                            $company_logo   = get_the_company_logo();
                            $company_name   = get_the_company_name();
                            $job_location   = get_the_job_location();
                            $job_type       = strip_tags(get_the_term_list(get_the_ID(), 'job_listing_type', '', ', ', ''));
                            $job_post_date  = get_the_date();
                            $job_description = wp_trim_words(get_the_excerpt(), 15, '...');
                            $job_money      = get_the_job_salary();
                            $job_important  = get_the_company_tagline();
                            $job_expires    = get_post_meta(get_the_ID(), '_job_expires', true);
                    ?>
                            <div class="col">
                                <div class="job-card border rounded p-3 shadow-sm h-100">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="company-logo text-center mb-2 mt-1">
                                                <?php if ($company_logo) : ?>
                                                    <img src="<?php echo esc_url($company_logo); ?>" alt="<?php the_title(); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-9 ">
                                            <h3 class="job-title h6 fw-bold mb-1"><?php the_title(); ?></h3>
                                            <p class="job-date text-muted small mt-2">Created: <?php echo esc_html($job_post_date); ?></p>
                                            <div class="job-meta my-2">
                                                <span class="badge bg-light text-dark border"><?php echo $job_type; ?></span>
                                                <span class="badge bg-light text-dark border"><?php echo esc_html($company_name); ?></span>
                                                <span class="badge bg-light text-dark border"><?php echo esc_html($job_location); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="job-description list-unstyled small text-muted mt-3">
                                        <li><?php echo wp_kses_post($job_description); ?></li>
                                        <li><?php echo wp_kses_post($job_important); ?></li>
                                        <li><?php echo wp_kses_post($job_money); ?></li>
                                    </ul>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-center">Không có công việc nào được tìm thấy.</p>';
                    endif;
                    ?>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('jobs'))); ?>" id="load-more" class="btn btn-primary">VIEW MORE JOBS</a>
                </div>

            <?php else : ?>
                <p class="text-center">Hiện tại không có công việc nào được đăng.</p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<style>
    .top-job-section {
        padding: 40px 0;
        background-color: #f9f9f9;
    }

    .job-card {
        background-color: #ffffff;
        border: 1px solid #e6e6e6;
        padding: 20px;
        border-radius: 0px;
    }

    .company-logo img {
        height: 120px;
        width: 120px;
        object-fit: contain;
        margin: 0 auto;
        border: 1px solid #999;
    }

    .job-title {
        font-size: 22px;
        font-weight: 700;
        color: #333;
        font-weight: bold;
    }

    .job-date,
    .job-expires {
        font-size: 14px;
        color: #999;
    }

    .job-meta {
        margin-top: 10px;

    }

    .job-meta .badge {
        font-size: 13px;
        background-color: #f8f8f8;
        color: #555;
        margin-right: -5px;
    }

    .job-description {
        font-size: 14px;
        line-height: 1.5;
        list-style-type: disc;
    }

    .job-description li {
        margin-bottom: 5px;
    }

    @media (max-width: 768px) {
        .job-card {
            padding: 15px;
        }

        .job-title {
            font-size: 14px;
        }

        .job-meta .badge {
            font-size: 11px;
            padding: 3px 8px;
        }

        .job-description {
            font-size: 12px;
        }
    }

    #load-more {
        margin-top: 10px;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        color: #f57c40;
        border: 2px solid #f57c40;
        border-radius: 0px;
        background-color: transparent;
        padding: 15px 20px;
        text-align: center;
        text-transform: uppercase;
        width: 250px;
    }
</style>