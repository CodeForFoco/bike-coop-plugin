<?php 
    $args = array(
        'post_type'  => 'event',
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
<section class='awesome-events-wrapper'>
    <header>
        <h2>Events Coming Soon</h2>
    </header>
    <div class='awesome-events'>
        <?php while($events_query->have_posts()): $events_query->the_post(); ?>
        <div class="event-wrapper">
            <div class='event'>
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php endif; ?>