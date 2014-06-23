<div class="container bs-header" style="margin-top:100px;<?php if($row->img_type == 'bg_img'){?>background:url('<?php echo $row->pic;?>') no-repeat center top;width:<?php echo $row->bg_weight;?>px;height:<?php echo $row->bg_height;?>px;<?php }?>">
	<div class="col-lg-7" style="text-align:center">
	<?php if($row->img_type == 'img'){?>	
		<img src="<?php echo $row->pic;?>" class="img-responsive" alt="Responsive image" style="display:inline" />
	<?php }?>
	</div>
	<div class="col-lg-5">
		<h1><?php echo $row->title1;?></h1>
		<?php 
			if($row->title2){
				echo '<h2 style="color:#aaa">'.$row->title2.'</h2>';
			}
		?>
		<p class="description"><?php echo $row->description;?></p>
	</div>
</div>
