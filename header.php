<!DOCTYPE html>
<html>
<head>
  <title><?php echo( get_bloginfo( 'title' ) ); ?></title>
  <?php wp_head(); ?>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58827160-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div class="contentWrap">
  <header class="siteHeader">
    <!--site logo, title, and subtitle-->
    <a href="/"><img class="siteLogo" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" /></a>
    <div class="siteTitleWrap">
	    <h1 class="siteTitle"><a href="/"><?php echo(get_bloginfo('name')); ?></a></h1>
	    <h2 class="siteSubtitle"><?php echo(get_bloginfo('description')); ?></h2>
	</div>
	<div class="headerRight">
		<?php wp_register('<span class="registrationLink">', '</span>'); ?> | 
		<?php if(!is_user_logged_in()): ?>
			<a href="#" class="login">LOGIN</a>
		<?php else: ?>
			<a href="<?php echo wp_logout_url(home_url()); ?>" class="logout">LOGOUT</a>
		<?php endif; ?>

		<div class="loginForm"><?php wp_login_form(); ?></div>
	
		<ul class="socialLinks socialHeader">
			<li><a href="https://twitter.com/PolicyRecon"><img src="<?php echo(get_template_directory_uri() . '/images/social-twitter.png');?>"></a></li>
			<li><a href="https://www.facebook.com/PolicyRecon"><img src="<?php echo(get_template_directory_uri() . '/images/social-facebook.png');?>"></a></li>
			<li><a href="http://www.linkedin.com/company/5252757"><img src="<?php echo(get_template_directory_uri() . '/images/social-linkedin.png');?>"></a></li>
			<li><a href="http://www.policyrecon.com/feed/"><img src="<?php echo(get_template_directory_uri() . '/images/social-rss.png');?>"></a></li>
		</ul>
		<div class="searchForm"><?php get_search_form(); ?></div>
		<h4 class="siteByline"><?php if(get_option('site_byline')): echo(get_option('site_byline')); endif; ?></h4>
	</div>
  </header>  
  	<nav class="mainMenuWrap">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 
								'container' => false,
								'menu_class' => 'mainMenu'
		) ); ?>
	</nav>
