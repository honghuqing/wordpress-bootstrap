<?php
/**
 * New Post Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );
$id=isset($_GET['id'])?intval($_GET['id']):0;
global $wpdb;
$title=$wpdb->get_var('select title1 from wp_index_temp where id='.$id);
$sql="delete from wp_index_temp where id=".$id;
if($wpdb->query($sql)){
	header("location:set_index_temp_list.php");
}else{
	header("location:set_index_temp_list.php");
}

?>