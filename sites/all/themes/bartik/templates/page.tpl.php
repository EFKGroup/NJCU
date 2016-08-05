<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>
<?php if ($page['popup_header']): ?>
	 <div id="popup_header"><div class="section clearfix">
		<?php print render($page['popup_header']); ?>
	 </div></div> <!-- /.section, /#header_top -->
<?php endif; ?>

<div id="page-wrapper"><div id="page">
 <?php if ($page['header_top']): ?>
    <div id="header_top"><div class="section clearfix">
       <?php print render($page['header_top']); ?>
    </div></div> <!-- /.section, /#header_top -->
  <?php endif; ?>

  <div id="header"><div class="section clearfix">
	<div class="header-logo">
    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>
	</div>
	<?php print render($page['header']); ?>
	
  </div></div> <!-- /.section, /#header -->
 <?php if ($page['slider_hero']): ?>
    <div id="slider_hero">
       <?php print render($page['slider_hero']); ?>
    </div><!-- /#Slider OR Heros -->
  <?php endif; ?>
  

  
  <?php if ($dept_page) : ?>
    <?php print render($page['content']); ?>
  <?php else :?>
   <?php print render($page['content_top']); ?>    
  <?php endif;?>
   
  <div id="main-wrapper" class="clearfix">
    <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>
  <?php if (isset($node) && $dept_page) : ?>
     <?php print render($page['content_top']); ?>    
  <?php endif;?>

  <div id="main" class="clearfix">
    <div id="content" class="column"><div class="section">
	  <?php if ($breadcrumb): ?>
		 <div id="breadcrumb"><?php print $breadcrumb; ?></div>
	  <?php endif; ?>
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php if (!$dept_page) : ?>
        <?php print render($page['content']); ?>
      <?php endif;?>
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->
  </div><!-- /#main -->
  	<div class="black-overlay"></div>
  </div> <!-- /#main-wrapper -->
<?php print render($page['content_bottom']); ?>

  <div id="social_row">
  <h1 class="header-title">Getting Connected</h1>
   <?php if ($page['social_col1']): ?>
    <div id="social_col1" class="social-col">
       <?php print render($page['social_col1']); ?>
    </div><!--  /#social_col1-->
  <?php endif; ?>
   <?php if ($page['social_col2']): ?>
    <div id="social_col2" class="social-col">
       <?php print render($page['social_col2']); ?>
    </div><!--  /#social_col2-->
  <?php endif; ?>
   <?php if ($page['social_col3']): ?>
    <div id="social_col3" class="social-col">
       <?php print render($page['social_col3']); ?>
    </div><!--  /#social_col3-->
  <?php endif; ?>
   <?php if ($page['social_col4']): ?>
    <div id="social_col4" class="social-col">
       <?php print render($page['social_col4']); ?>
    </div><!--  /#social_col4-->
  <?php endif; ?>
   <?php if ($page['social_col5']): ?>
    <div id="social_col5" class="social-col">
       <?php print render($page['social_col5']); ?>
    </div><!--  /#social_col5-->
  <?php endif; ?>
   <?php if ($page['social_col6']): ?>
    <div id="social_col6" class="social-col">
       <?php print render($page['social_col6']); ?>
    </div><!--  /#social_col6-->
  <?php endif; ?>
   <?php if ($page['social_col7']): ?>
    <div id="social_col7" class="social-col">
       <?php print render($page['social_col7']); ?>
    </div><!--  /#social_col7-->
  <?php endif; ?>
   <?php if ($page['social_col8']): ?>
    <div id="social_col8" class="social-col">
       <?php print render($page['social_col8']); ?>
    </div><!--  /#social_col8-->
  <?php endif; ?>
  </div>
  <div class="clearfix"></div>
 <?php if ($page['content_builder']): ?>
    <div id="content_builder">
       <?php print render($page['content_builder']); ?>
    </div><!--  /#content_builder-->
  <?php endif; ?>
<div class="clearfix"></div>
  <div id="footer-wrapper"><div class="section">


    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
<a href="#" class="off" id="totop">Top</a>
<div class="videoContainer"  style="display:none;">
<div class="close-video"><span>close</span></div>
  <video  src="" height="360" width="640" id="popVideo">
	Video not supported.
  </video>
</div>
