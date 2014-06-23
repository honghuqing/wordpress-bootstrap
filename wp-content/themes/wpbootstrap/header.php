<html>
<head>
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
<script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
  <?php wp_enqueue_script("jquery"); ?>
 
</head>
<style>
	body{font-family:"Helvetica Neue",Arial,"Hiragino Sans GB","Microsoft Yahei",Helvetica,sans-serif,Lato}
</style>
<body>


<div class="container">
	<div class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			
			<a class="navbar-brand" href="<?php echo site_url(); ?>">HOME</a>
		</div>
		<div class="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
			<?php wp_list_pages(array('title_li' => '')); ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>