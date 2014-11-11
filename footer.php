
  <footer class="pageFooter">
  	
<?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
	<div class="footerWidgets" role="complementary">
		<?php dynamic_sidebar( 'footer_widgets' ); ?>
	</div>
<?php endif; ?>
	<ul class="socialLinks footerMenu">
		<li><a href="https://twitter.com/PolicyRecon"><img src="<?php echo(get_template_directory_uri() . '/images/social-twitter.png');?>"></a></li>
		<li><a href="https://www.facebook.com/PolicyRecon"><img src="<?php echo(get_template_directory_uri() . '/images/social-facebook.png');?>"></a></li>
		<li><a href="http://www.policyrecon.com/"><img src="<?php echo(get_template_directory_uri() . '/images/social-linkedin.png');?>"></a></li>
		<li><a href="http://www.policyrecon.com/feed/"><img src="<?php echo(get_template_directory_uri() . '/images/social-rss.png');?>"></a></li>
	</ul>
	<p class="copyright">Copyright &copy; 2014 PolicyRecon and Alpha Politics Group 2014 - All Rights Reserved</p>
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>