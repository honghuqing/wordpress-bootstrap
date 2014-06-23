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
$pic=$_POST['pic'];
$type=$_POST['type'];
$order_num=$_POST['order_num'];
$title1=$_POST['title1'];
$title2=$_POST['title2'];
$description=$_POST['description'];
$img_type=$_POST['img_type'];
$bg_weight=$_POST['bg_weight'];
$bg_height=$_POST['bg_height'];
$sql="update wp_index_temp set title1='$title1',title2='$title2',type=$type,order_num=$order_num,description='$description',img_type='$img_type',bg_weight='$bg_weight',bg_height='$bg_height'";
if($pic != ''){
	$sql.=",pic=$pic";
}
$sql.=" where id=$id";

if($wpdb->query($sql)){
	echo '编辑成功！';
}else{
	echo '编辑失败，请检查信息内容！';
}
?>