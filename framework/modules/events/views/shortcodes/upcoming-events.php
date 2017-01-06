<?php 
    $args = array(
        'post_type'  => 'event',
        'post_status'=> 'publish',
    	'meta_key'   => 'awesome_events_details_url',
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
    
    $events_query = new WP_Query($args);
    
    //var_dump($events->posts); die();
?>

<?php if($events_query->have_posts()): ?>
<?php wp_enqueue_style('events-module'); ?>
<section class='awesome-events-wrapper'>
    <div class='awesome-events'>
        <?php while($events_query->have_posts()): $events_query->the_post(); ?>
        <div class="event-wrapper">
            <div class='event'>
                <?php
                $url = get_post_meta(get_the_ID(), 'awesome_events_details_url', true);

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
                        <h4 class="card-title"><?php the_title();?></h4>
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