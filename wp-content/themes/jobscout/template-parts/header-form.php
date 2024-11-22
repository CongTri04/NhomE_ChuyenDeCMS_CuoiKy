<?php
/**
 *
 * Creating a custom job search form for homepage
 * The [jobs] shortcode is will use search_location and search_keywords variables from the query string.
 *
 * @link https://wpjobmanager.com/document/tutorial-creating-custom-job-search-form/
 *
 * @package JobScout
 */
$find_a_job_link = get_option( 'job_manager_jobs_page_id', 0 );
$post_slug       = get_post_field( 'post_name', $find_a_job_link );
$ed_job_category = get_option( 'job_manager_enable_categories' );  

if( $post_slug ){
    $action_page =  home_url( '/'. $post_slug );
}else {
    $action_page =  home_url( '/' );
}
?>

<div class="job_listings_container">
  <div class="job_listings">
    <form class="jobscout_job_filters" method="GET" action="http://wordpress.local/jobs/">
      <div class="search_jobs">

        <!-- Search Keywords -->
        <div class="keywords_search">
          <label for="search_keywords"><?php esc_html_e('Keywords', 'jobscout'); ?></label>
          <div class="input_with_icon">
            
            <input type="text" id="search_keywords" name="search_keywords" placeholder="<?php esc_attr_e('Keywords', 'jobscout'); ?>">
          </div>
        </div>

        <!-- Search Location -->
        <div class="location_search">
          <?php
          global $wpdb;
          $table  = $wpdb->prefix . 'postmeta';
          $sql = "SELECT DISTINCT SUBSTRING_INDEX(`meta_value`,',',-1) as location FROM `wp_postmeta` WHERE `meta_key` like '%location%' ORDER BY location";
          $data = $wpdb->get_results($wpdb->prepare($sql));
          ?>
          <label for="search_location"><?php esc_html_e('Location', 'jobscout'); ?></label>
          <div class="input_with_icon">
            <select id="search_location" name="search_location">
              <option value="">Khu vực</option>
              <?php foreach ($data as $value) : ?>
                <option value="<?php echo $value->location; ?>"><?php echo $value->location; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="search_submit">
          <button type="submit">Search Jobs</button>
        </div>

      </div>
    </form>
  </div>
</div>


<style>
 /* Container màu nền */
/* Container màu nền */
.job_listings_container {
  background-color: rgba(0, 0, 0, 0.4); /* Màu đen mờ */
  padding: 20px;
  border-radius: 10px;
}
.keywords_search {
  width: 560px; /* Để container chiếm toàn bộ chiều rộng */
  margin-right: 20px;
}
.location_search{
  width: 300px;
  margin-right: 20px;
}

/* Label màu trắng */
.job_listings label {
  color: white;
  margin-bottom: 5px;
  display: block;
}

/* Nút submit dạng hình chữ nhật */
.search_submit button {
  background-color: darkorange; /* Nút màu cam */
  color: white; /* Chữ màu trắng */
  padding: 12px 20px;
  border: none;
  border-radius: 0; /* Bỏ bo góc để thành hình chữ nhật */
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
  width: 150px; /* Rộng toàn bộ chiều ngang */
  text-align: center;
  transition: background-color 0.3s ease;
  height: 60px;
}
</style>
