<div id="footer" data-role="footer" data-theme="a" data-position="fixed" data-tap-toggle="false" class="source-org vcard copyright" role="contentinfo">
<nav role="navigation" class="row">
    <?php if (is_mobile()) {
    post_navigation_mobile(); //mobile NAV
     } else {
    post_navigation(); //NAV
     } ?>
</nav>
<footer class="row" role="contentinfo">
<small>&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?>: <em>a service of: <a href="http://astrophysics.gsfc.nasa.gov/">ASD</a> at <a href="http://www.nasa.gov/">NASA</a> <a href="http://www.nasa.gov/centers/goddard/">GSFC</a> &amp; <a href="http://www.mtu.edu/">MTU</a></em></small>
</footer>
</div>
<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>
</div><!-- /close wrapper/page -->
</body>
</html>
