<?php
/**
 * New Post Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );
require_once( ABSPATH . 'wp-admin/admin-header.php' );
global $wpdb;
$id=$_GET['id'];
$sql="select * from wp_index_temp where id=".$id;
$info=$wpdb->get_row($sql); 
?>
<div class="wrap">
<h2>设置首页模板</h2>
<form name="temp_info" action="set_index.php" method="post" target="" onsubmit="return postinfo()">
	<table border="0" width='1000'>
	<tr>
	<td>选择模板格式：</td>
	<td><select name="type" id="type">
		<option value='0'>请选择</option>
		<option <?php if($info->type==1){echo "selected";}?> value='1'>图上文下</option>
		<option <?php if($info->type==2){echo "selected";}?> value='2'>图下文上</option>
		<option <?php if($info->type==3){echo "selected";}?> value='3'>图左文右</option>
		<option <?php if($info->type==4){echo "selected";}?> value='4'>图右文左</option>
	</select>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input type="text" name="order_num" id="order_num" value="<?php echo $info->order_num;?>" size="10" />
	</td>
	</tr>
	<tr>
	<td>标题【主】：</td><td><input type="text" name="title1" value="<?php echo $info->title1;?>" id="title1" size='60' /></td>
	</tr>
	<tr>
	<td>标题【副】:</td><td><input type="text" name="title2" value="<?php echo $info->title2;?>" id="title2" size='60' /></td>
	</tr>
	<tr>
	<td>描述:</td><td><textarea name="description" id="description" style="width:521px"><?php echo $info->description;?></textarea></td>
	</tr>
	<tr>
		<td colspan='2'>
<?php wp_editor( $post->post_content, 'content', array(
	'dfw' => true,
	'drag_drop_upload' => true,
	'tabfocus_elements' => 'insert-media-button,save-post',
	'editor_height' => 360,
	'tinymce' => array(
		'resize' => false,
		'add_unload_trigger' => false,
	),
) ); ?>

</td>		
	</tr>
	<tr>
		<td colspan=2><img src="<?php echo $info->pic;?>" height="200" /></td>
	</tr>
	<tr style="height:40px;line-height:40px;">
		<td>请选择图片类型：</td>
		<td>
		<select name="img_type" id="img_type" onchange="bg_wh()">
			<option value="img" <?php if($info->img_type=='img'){echo "selected";}?> /> 图片
			<option value="bg_img" <?php if($info->img_type=='bg_img'){echo "selected";}?> /> 背景图
		</select>
		</td>
	</tr>
	</table>
	<div id="wh" style="display:<?php if($info->img_type=='bg_img'){echo "inline";}else{echo 'none';}?>">
		<ul>
			<li><span>背景图宽：</span><input type="text" value="<?php echo $info->bg_weight;?>" name="bg_weight" id="bg_weight" /></li>
			<li><span>背景图高：</span><input type="text" name="bg_height" value="<?php echo $info->bg_height;?>" id="bg_height" /></li>
		</ul>
	</div>
	<input type="hidden"  name="id" id="id" value="<?php echo $id;?>" />
	<input id="publish" class="button button-primary button-large" type="submit" accesskey="p" value="发布" name="publish" /><img src="./images/loading.gif" id="zhuan" style="display:none" />
</form>
</div>
<?php  

include( ABSPATH . 'wp-admin/admin-footer.php' );
?>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript">
function postinfo(){
	var title1=$("#title1").val();
	var id=$("#id").val();
	var title2=$("#title2").val();
	var pic=$("#content").val();
	var type=$("#type").val();
	var order_num=$("#order_num").val();
	var description=$("#description").val();
	var img_type=$("#img_type").val();
	var bg_weight=$("#bg_weight").val();
	var bg_height=$("#bg_height").val();
	if(title1 == ''){
		alert('主标题不能为空！');
		return false;
	}else if(type == 0){
		alert('类型不能为空！');
		return false;
		
	}else if(img_type == 'bg_img'){
		if(bg_weight == '' || bg_height == ''){
			alert('背景图宽或者高不能为空');
			return false;
		}
	}
	var data={
		id:id,
		title1:title1,
		title2:title2,
		pic:pic,
		order_num:order_num,
		description:description,
		img_type:img_type,
		bg_weight:bg_weight,
		bg_height:bg_height,
		type:type
	}
		document.getElementById('zhuan').style.display="inline";
	 $.ajax({
		url: './set_index_edit.php',
		type:"POST",
		data:data,
		success:function(msg)
		{
			alert(msg);
				location.href="./set_index_temp_list.php";
		}
	})
		return false;
}
</script>
<script type="text/javascript">
<!--
	function bg_wh(){
		var img_type=$("#img_type").val();
		if(img_type == "img"){
			document.getElementById("wh").style.display='none';
		}else if(img_type == "bg_img"){
			document.getElementById("wh").style.display='inline';
		}
		
	}
//-->
</script>