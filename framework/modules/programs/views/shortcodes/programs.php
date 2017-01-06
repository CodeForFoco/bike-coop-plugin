<?php 
    $args = array(
        'post_type'     => 'program',
        'post_status'   => 'publish',
    	'meta_key'      => 'awesome_programs_details_featured',
    	'orderby'       => 'meta_value_num',
    	'order'         => 'ASC',
    	'posts_per_page'=>  $atts['count']
    	/*'meta_query' => array(
    		array(
    			'key'     => 'age',
    			'value'   => array( 3, 4 ),
    			'compare' => 'IN',
    		),
    	),*/ 
    );
    
    $programs_query = new WP_Query($args);
    
    //var_dump($programs_query->posts); die();
?>

<?php if($programs_query->have_posts()): ?>
<?php wp_enqueue_style('programs-module'); ?>
<section class='awesome-programs-wrapper'>
    <h2 class='title'>
        <span>
            <?php echo $atts['title']; ?>
        </span>
        <?php if(isset($atts['all_programs_link']) && !empty($atts['all_programs_link'])): ?>
            <a href="<?php echo $atts['all_programs_link']; ?>" title="<?php echo $atts['all_programs_text']; ?>">
                <sub>
                    <?php echo $atts['all_programs_text']; ?>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </sub>
            </a>
        <?php endif; ?>
    </h2>
    <div class='awesome-programs'>
        <?php while($programs_query->have_posts()): $programs_query->the_post(); ?>
            <?php include(BIKE_COOP_MODULE_PROGRAMS_DIR . '/views/templates/program.php'); ?>
        <?php endwhile; ?>
    </div>
</section>

<?php endif; ?>