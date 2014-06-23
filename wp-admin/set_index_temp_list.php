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
$sql='select * from wp_index_temp where 1=1 order by `order_num` asc';
$content=$wpdb->get_results($sql);
?>
<h2>设置首页模板</h2>
<div class="wrap">
<form action="set_index_temp_all.php" method="post" onsubmit="return isdelete()">
	<table border="0" class="wp-list-table widefat fixed posts">
		<tr style="background:#f9f9f9">
			<th style="text-align:center">主标题</th>
			<th style="text-align:center">副标题</th>
			<th style="text-align:center">图片</th>
			<th style="text-align:center">图片类型</th>
			<th style="text-align:center">排序</th>
			<th style="text-align:center">模板格式</th>
			<th style="text-align:center">操作</th>
		</tr>
		<?php foreach($content as $row){?>
		<tr align="center" style="background:#ffffff;">
			<td align="center" style="border-bottom:1px solid #dddddd;border-right:1px solid #dddddd"><?php echo $row->title1;?></td>
			<td align="center" style="border-bottom:1px solid #dddddd;border-right:1px solid #dddddd"><?php echo $row->title2;?></td>

			<td align="center" style="border-bottom:1px solid #dddddd"><img onmouseover="showbigimg(this)" src="<?php echo $row->pic;?>" height="60" /></td>

			<td align="center" style="border-bottom:1px solid #dddddd"><?php if($row->img_type == 'img'){echo '图片';}?><?php if($row->img_type == 'bg_img'){?><br />背景图<br><span>W:<?php echo $row->bg_weight;?>px</span><br /><span>H:<?php echo $row->bg_height;?>px</span><?php }?></td>

			<td align="center" style="border-bottom:1px solid #dddddd"><input type="text" value="<?php echo $row->order_num;?>" name="order_num[]" onblur="edit_order_num(this,<?php echo $row->order_num;?>,<?php echo $row->id;?>)" style="width:30px;text-align:center" /><img src="./images/loading.gif" id="zhuan<?php echo $row->id;?>" style="display:none" />
			</td>

			<td align="center" style="border-bottom:1px solid #dddddd">
			<?php $type=$row->type;?>
			<select name="type[]">
				<option <?php if($type==1){echo "selected";}?> value='1'> 图上文下</option>
				<option <?php if($type==2){echo "selected";}?> value='2'> 图下文上</option>
				<option <?php if($type==3){echo "selected";}?> value='3'> 图左文右</option>
				<option <?php if($type==4){echo "selected";}?> value='4'> 图右文左</option>
			</select>
			<?php if($type==1){echo "<option value='1' selected>图上问下";}?>
			
			</td>

			<td align="center" style="border-bottom:1px solid #dddddd">
				<a href="set_index_temp_delete.php?id=<?php echo $row->id;?>" onclick="return confirm('删除');">删除</a> | <a href="set_index_temp_edit.php?id=<?php echo $row->id;?>">编辑</a>
			</td>
		</tr>
		<?php }?>
		<?php if(count($content) == 0){?>
			<tr align="center" style="background:#ffffff;">
				<td colspan="7" align="center">首页暂无模块</td>
			</tr>
		<?php }?>
	</table>
	</form>
</div>
<?php  

include( ABSPATH . 'wp-admin/admin-footer.php' );
?>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript">
	function edit_order_num(msg,old,id){
		if(msg.value == ''){
			alert('值不能为空');
			return false;
		}
		if(msg.value == old){
			return false;
		}
		var data={
			id:id,
			value:msg.value
		}
		var img_id='zhuan'+id; 
		document.getElementById(img_id).style.display="inline";
		$.ajax({
			url: './edit_order_num.php',
			type:"POST",
			data:data,
			success:function(msg)
			{
				alert(msg);
				location.href="./set_index_temp_list.php";
			}
		})
	}
	function isdelete(){
		var action=$("#action").val();
		if(action == "edit"){
			return true;
		}
		if(action == "delete"){
			return confirm("确定删除所选项吗？")
		}
	}
</script>