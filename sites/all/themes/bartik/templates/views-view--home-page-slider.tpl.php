<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">

<?php 
$content = $view->style_plugin->rendered_fields;
$counter = 1;


?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<span id="prev-btn">
	<a href="#" class="prev-icon"></a>
</span>
<div class="slider-wrapper">
<?php foreach($content as $item){?>
	<div class="screen <?php echo ($item['field_hero_video'] ? 'hasVideo' : '');?>" id="screen-<?php echo $counter?>" style=" <?php echo ($item['field_hero_video'] ? 'background-image:url(' .trim(strip_tags($item['field_video_poster'])) . ')' : 'background-image:url(' .trim(strip_tags($item['field_image'])) . ')');?>">
		<?php if($item['field_hero_video'] && $item['field_video_poster']){
			echo '<div class="poster"><img src="' .trim(strip_tags($item['field_video_poster'])) . '" class="big-image"></div>';
			echo $item['field_hero_video'];
            echo '<div class="blk-overlay"></div>';
			
		 }else{
		 	echo '<div class="blk-overlay"></div>';
			echo '<img src="/sites/default/files/transparent-bg.png" class="big-image transparent">';
		 }// end if?>
		 <div class="slider-text-wrap <?php echo ($item['field_pop_up_video'] ? 'hasPop' : '')?>">
			<h1 class="video-title"><?php echo trim(strip_tags($item['title']));?></h1>
			<?php if($item['field_pop_up_video']){
				echo '<a href="'.trim(strip_tags($item['field_pop_up_video'])).'" data-slider="slider-'.$counter.'" class="pop-up-video-button"><span class="btn-title">Play Video</span></a>';
			}
			?>
			<a href="/academic-departments" class="button brows-program"><span class="btn-title">browse our programs</span></a>
			<a href="http://www.youvisit.com/njcu?pl=v" class="button take-tour"><span class="btn-title">take a tour</span></a>
		</div>	<!-- slider text wrap -->
	</div>	<!-- screen -->
	<?php if($item['field_pop_up_video']){
			/*echo '
			<div class="videoContainer" id="slider-'.$counter.'" style="display:none;">
			<div class="close-video"><span>close</span></div>
			  <video controls id="video-'.$counter.'" style="width:100%; height:auto; ">
				<source src="'.trim(strip_tags($item['field_pop_up_video'])).'" type="video/mp4">
				Video not supported.
			  </video>
			</div>
			';			*/	
	}
	?>
	<?php if($item['field_hero_video']){?>
	<style>
		.hasTouch .hasVideo#screen-<?php echo $counter?>{background-image:url(' <?php echo trim(strip_tags($item['field_image'])) ?> ')!important; }
	</style>
	<?php }?>
<?php $counter++;?>	
<?php }// loop end ?>	
</div> <!-- Slider wrapper --> 

<span id="next-btn">
	<a href="#" class="next-icon"></a>
</span>

<div class="apply-button-bg"><a href="/admissions/apply" class="button apply"><span class="btn-title">Apply Now</span></a></div>


    <script>
        jQuery(function($) {

            // Use Modernizr to detect for touch devices, 
            // which don't support autoplay and may have less bandwidth, 
            // so just give them the poster images instead
            var screenIndex = 1,
                numScreens = $('.screen').length,
                isTransitioning = true,
                transitionDur = 2000,
                BV,
                videoPlayer,
                isTouch = Modernizr.touch,
                $bigImage = $('.big-image'),
                $window = $(window);

			  $(".slider-wrapper").css("width",(numScreens+'00%'));
			  $screen_width = (100/numScreens);
			  $screen_width = $screen_width.toFixed(2);
			 // $(".slider-wrapper .screen").css("width", $(window).width());
			 jQuery("#main-wrapper").css("margin-top",(jQuery(window).height() + 50));
            
            if (!isTouch) {
                // initialize BigVideo
               // BV = new $.BigVideo({forceAutoplay:isTouch});
               // BV.init();
               // showVideo();
                onVideoLoaded();
               /* BV.getPlayer().addEvent('loadeddata', function() {
                    onVideoLoaded();
                });*/
				
				

                // adjust image positioning so it lines up with video
               // $bigImage
                //    .css('position','relative')
                //    .imagesLoaded(adjustImagePositioning);
                // and on window resize
               // $window.on('resize', adjustImagePositioning);
            }
			
			if(numScreens < 2){
				$('#next-btn, #prev-btn').hide();
			}
            
            // Next button click goes to next div
            $('#next-btn').on('click', function(e) {
                e.preventDefault();
                if (!isTransitioning) {
                    next();
                }
            });
			
			 // Next button click goes to next div
            $('#prev-btn').on('click', function(e) {
                e.preventDefault();
                if (!isTransitioning) {
                    prev();
                }
            });

            function showVideo() {
				//if($('#screen-'+screenIndex).attr('data-video') != ''){
                	BV.show($('#screen-'+screenIndex).attr('data-video'),{useFlashForFirefox:false,ambient:true, eleM:$('#screen-'+screenIndex)});
				//}
            }

            function next() {
                isTransitioning = true;
                
                // update video index, reset image opacity if starting over
                if (screenIndex === numScreens) {
                    $bigImage.css('opacity',1);
                    screenIndex = 1;
                } else {
                    screenIndex++;
                }
                
                if (!isTouch) {
                    $('#big-video-wrap').transit({'left':'-100%'},transitionDur)
                }
                    
                (Modernizr.csstransitions)?
                    $('.slider-wrapper').transit(
                        {'left':'-'+(100*(screenIndex-1))+'%'},
                        transitionDur,
                        onTransitionComplete):
                    onTransitionComplete();
            }
			
            function prev() {
                isTransitioning = true;
                
                // update video index, reset image opacity if starting over
                if (screenIndex === 1) {
                    $bigImage.css('opacity',1);
                    screenIndex = numScreens;
                } else {
                    screenIndex--;
                }
                
               if (!isTouch) {
				  $('#big-video-wrap').transit({
					'left': '100%'
				  }, transitionDur,'linear');
				}
                    
                (Modernizr.csstransitions)?
                    $('.slider-wrapper').transit(
                        {'left':'-'+(100*(screenIndex - 1))+'%'},
                        transitionDur,
                        onTransitionComplete):
                    onTransitionComplete();
            }
			

            function onVideoLoaded() {
                //$('#screen-'+screenIndex).find('.big-image').transit({'opacity':0},500)
				//BV.getPlayer().play();
				setTimeout(function(){
				  //BV.getPlayer().play();
				  $('#screen-' + screenIndex).find('.big-image').transit({
				  'opacity': 0,
				  'display': 'none'
				  }, 0,'linear');
				  
				  $('#screen-' + screenIndex).find('video').css('visibility','visible');
				},2000);
            }

            function onTransitionComplete() {
                isTransitioning = false;
                if (!isTouch) {
                    $('#big-video-wrap').css('left',0);
                    //showVideo();
                }
            }

            function adjustImagePositioning() {
                $bigImage.each(function(){
                    var $img = $(this),
                        img = new Image();

                    img.src = $img.attr('src');

                    var windowWidth = $window.width(),
                        windowHeight = $window.height(),
                        r_w = windowHeight / windowWidth,
                        i_w = img.width,
                        i_h = img.height,
                        r_i = i_h / i_w,
                        new_w, new_h, new_left, new_top;

                    if( r_w > r_i ) {
                        new_h   = windowHeight;
                        new_w   = windowHeight / r_i;
                    }
                    else {
                        new_h   = windowWidth * r_i;
                        new_w   = windowWidth;
                    }

                    $img.css({
                        width   : new_w,
                        height  : new_h,
                        left    : ( windowWidth - new_w ) / 2,
                        top     : ( windowHeight - new_h ) / 2
                    })

                });

            }
        });
		
var min_w = 300; // minimum video width allowed
var vid_w_orig;  // original video dimensions
var vid_h_orig;

jQuery(function($) { // runs after DOM has loaded
    
    vid_w_orig = parseInt(jQuery('.screen.hasVideo video').attr('width'));
    vid_h_orig = parseInt(jQuery('.screen.hasVideo video').attr('height'));
    $('#debug').append("<p>DOM loaded</p>");
    
    jQuery(window).resize(function () { resizeToCover(); });
    jQuery(window).trigger('resize');
});

function resizeToCover() {
    
    // set the video viewport to the window size
    jQuery('.screen').width(jQuery(window).width());
    jQuery('.screen').height(jQuery(window).height());

    // use largest scale factor of horizontal/vertical
    var scale_h = jQuery(window).width() / vid_w_orig;
    var scale_v = jQuery(window).height() / vid_h_orig;
    var scale = scale_h > scale_v ? scale_h : scale_v;

    // don't allow scaled width < minimum video width
    if (scale * vid_w_orig < min_w) {scale = min_w / vid_w_orig;};

	jQuery("#main-wrapper").css("margin-top",(jQuery(window).height() + 50));
    if(jQuery(window).width() < 769){
        jQuery("#main-wrapper").css("margin-top",(jQuery(window).height() + 50));
    }
	
    // now scale the video
    jQuery('.screen.hasVideo video').width(scale * vid_w_orig);
    jQuery('.screen.hasVideo video').height(scale * vid_h_orig);
    // and center it by scrolling the video viewport
    jQuery('.screen.hasVideo video').animate({marginLeft:'-' + (jQuery('.screen.hasVideo video').width() - jQuery(window).width()) / 2}, 0);
    jQuery('.screen.hasVideo video').animate({marginTop:'-' + (jQuery('.screen.hasVideo video').height() - jQuery(window).height()) / 2}, 0);
};


window.addEventListener('load', function() {
    var video = document.querySelector('.screen:first-child video');
    var preloader = document.querySelector('.screen:first-child .poster');

    function checkLoad() {
	//jQuery()
        if (video.readyState === 4) {
            preloader.parentNode.removeChild(preloader);
        } else {
            setTimeout(checkLoad, 100);
        }
    }

    checkLoad();
}, false);
</script>
<script>
    //jQuery('a.pop-up-video-button').colorbox();
	//jQuery("a.youtube.cboxElement").colorbox({iframe:true, innerWidth:640, innerHeight:390});
</script>	  
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>