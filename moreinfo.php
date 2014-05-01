<?php
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
global $post;
	$args = array(
	'post_type'		=>	'rentalcar',
		'meta_query'	=>	array(
			array(
				'key'	=>'carid',
				'value' => $_GET["id"]
			)
		)
	);
	$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
		 while ( $query->have_posts() ) : $query->the_post(); 
		  echo get_post_meta(get_the_ID(), 'car_desc_'.$_GET["lang"],'yes');
	 	 endwhile;
	 	 wp_reset_query();
	 	 else:
		 echo "";
	  endif;

?>