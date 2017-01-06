<?php 
    $args = array(
        'post_type'  => 'program',
        'post_status'=> 'publish',
    	'meta_key'   => 'awesome_programs_details_url',
    	'orderby'    => 'meta_value_num',
    	'order'      => 'ASC',
    	/*'meta_query' => array(
    		array(
    			'key'     => 'age',
    			'value'   => array( 3, 4 ),
    			'compare' => 'IN',
    		),
    	),*/ 
    );
    
    $programs_query = new WP_Query($args);
    
    //var_dump($programs->posts); die();
?>

<?php if($programs_query->have_posts()): ?>
<?php wp_enqueue_style('programs-module'); ?>
<section class='awesome-programs-wrapper'>
    <h2 class='title'> Upcoming Events</h2>
    <div class='awesome-programs'>
        <?php while($programs_query->have_posts()): $programs_query->the_post(); ?>
        <div class="program-wrapper">
            <div class='program'>
                <?php
                $url = get_post_meta(get_the_ID(), 'awesome_programs_details_url', true);

                if(empty(trim($url)))
                $url = get_the_permalink();
                ?>
                <a class="card card-inverse" href="<?php echo $url; ?>">
                  <?php if( has_post_thumbnail() ): ?>
                  <?php
                    $src = get_the_post_thumbnail_url();
                    $src = aq_resize( $src, 400, 440, true, true, true );
                  ?>

                      <img class="card-img" src="<?php echo $src; ?>" alt="Upcoming Event">
                 <?php endif; ?>
                  <div class="card-img-overlay">
                      <div class="inner">
                          <div class="card-text">
                            <h4 class="card-title"><?php the_title();?></h4>
                          </div>
                      </div>
                    <!--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                  </div>
                </a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php endif; ?>