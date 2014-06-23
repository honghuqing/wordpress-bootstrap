<?php
/**
 * New Post Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );
global $wpdb;
$id=$_POST['id'];
$value=$_POST['value'];

$sql='update wp_index_temp set order_num = '.$value.' where id='.$id;

if($wpdb->query($sql)){
	echo '成功！';
}else{
	echo '失败，请检查信息内容！';
}
?>