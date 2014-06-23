<?php get_header(); ?>
<?php
	global $wpdb;
	$sql='select * from wp_index_temp where 1=1 order by `order_num` asc';
	
	$content=$wpdb->get_results($sql);
	foreach($content as $row){
		$filename=$row->type.'.php';
		include(dirname(__FILE__).'/temp/'.$filename);
	}

?>
<?php get_footer(); ?>