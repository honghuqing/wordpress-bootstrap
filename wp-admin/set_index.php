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
$pic=$_POST['pic'];
$type=$_POST['type'];
$order_num=$_POST['order_num'];
$title1=$_POST['title1'];
$title2=$_POST['title2'];
$description=$_POST['description'];
$img_type=$_POST['img_type'];
$bg_weight=$_POST['bg_weight'];
$bg_height=$_POST['bg_height'];
$sql='insert into wp_index_temp (`title1`,`title2`,`pic`,`type`,`description`,`order_num`,`img_type`,`bg_weight`,`bg_height`) value ("'.$title1.'","'.$title2.'","'.$pic.'",'.$type.',"'.$description.'",'.$order_num.',"'.$img_type.'","'.$bg_weight.'","'.$bg_height.'")';
if($wpdb->query($sql)){
	echo '添加成功！';
}else{
	echo '添加失败，请检查信息内容！';
}
?>