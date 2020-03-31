<footer itemscope itemtype="http://schema.org/WPFooter">
	<div class="footer-wrapper">
		

			<div class="footer-content footer-logo">
				<a href="<?php echo site_url(); ?>" class="logo-link">
					<?php if(get_field('config-logo-sec','option')) {
						?> <img src="<?php the_field('config-logo-sec', 'option'); ?>" alt="<?php the_field('config-name', 'option'); ?>" /> <?php
					} else {
						?> <img src="<?php the_field('config-logo', 'option'); ?>" alt="<?php the_field('config-name', 'option'); ?>" /> <?php
					}; ?>
				</a>
			</div>
			<div class="footer-content footer-naw">
				
				<!-- CONTACT BLOK -->
				<div itemscope itemtype="http://schema.org/LocalBusiness" class="contact">
					<?php if(get_naw('name')) { ?><span itemprop="name"><strong><?php naw('name') ?></strong></span><br><?php }; ?>
					<?php if(get_naw('street') && get_naw('number')) { ?><div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						<span itemprop="streetAddress" data-icon="&#xf27d;"><?php naw('street');?> <?php naw('number'); ?></span><br>
						<span itemprop="postalCode"><?php naw('zipcode'); ?></span>
						<span itemprop="addressLocality"><?php naw('city'); ?></span><br>
						<?php }; ?>
					<?php if(get_naw('telephone')) { ?><span itemprop="telephone" data-icon="&#xf293;"><a href="tel:<?php $tel = str_replace(" ","",get_naw('telephone')); $tel = str_replace("-","",$tel); echo $tel; ?>" class="telephone">
						<?php naw('telephone'); ?></a></span><br><?php }; ?>
					<?php if(get_naw('email')) { ?><span itemprop="email" data-icon="&#xf1c6;"><?php naw('email'); ?></span><br><?php }; ?>
				</div>
					<!-- // CONTACT BLOK -->
				</div>
			</div>
		
		
			<?php


			wp_nav_menu( array( 
				'theme_location' => 'main-nav', 
				'container_class' => 'nav-wrap' ) ); 

			//Footer link block
			// check if the repeater field has rows of data
			if( have_rows('config-footer-link-block', 'option') ): ?>
			<div class="footer-content footer-link-block">
			<span><strong>Links</strong></span>
			<?php
				// loop through the rows of data
			    while ( have_rows('config-footer-link-block', 'option') ) : the_row();
			        // display a sub field value
			        ?><a href="<?php the_sub_field('config-footer-link', 'option'); ?>" class="footer-link"><?php the_sub_field('config-footer-link-text'); ?></a>
			    <?php
				endwhile;
			?></div> <?php
			else :		
			    // no rows found
			endif;
			?>
						
			<?php
			//Footer opening hours
			// check if the repeater field has rows of data
			if( get_field('config-open-hours-footer', 'option')):
				if( have_rows('config-open-hours', 'option') ): ?>
					<div class="footer-content footer-open-hours-block">
					<span><strong>Openingstijden</strong></span>
					<?php
						// loop through the rows of data
						while ( have_rows('config-open-hours', 'option') ) : the_row();
							// display a sub field value
							?><div class="open-hours-wrap"><span class="open-hour-period"><?php the_sub_field('opening-hours-period', 'option'); ?></span><span class="open-hour-time"><?php the_sub_field('open-hours-time', 'option'); ?></span></div>
						<?php
						endwhile;
					?></div> <?php
				endif;
			endif;
			?>
			
			<?php
			// check if there are any social media links set
			$fac_url = get_field('config-facebook-link', 'option');
			$twi_url = get_field('config-twitter-link', 'option');
			$ins_url = get_field('config-instagram-link', 'option');
			$lin_url = get_field('config-linkedin-link', 'option');
			
			if($fac_url || $twi_url || $ins_url || $lin_url ) {
				echo '<div class="footer-content footer-social-block">';
			};
				if($fac_url) { ?>
					<a href="<?php echo $fac_url; ?>" class="footer-social-link facebook-link" target="new_windows" data-icon="&#xf1d8;"></a>
				<?php }
				
				if($twi_url) { ?>
					<a href="<?php echo $twi_url; ?>" class="footer-social-link twitter-link" target="new_windows" data-icon="&#xf359;"></a>
				<?php }
				
				if($ins_url) { ?>
					<a href="<?php echo $ins_url; ?>" class="footer-social-link instagram-link" target="new_windows" data-icon="&#xf24d;"></a>
				<?php }
				
				if($lin_url) { ?>
					<a href="<?php echo $lin_url; ?>" class="footer-social-link linkedin-link" target="new_windows" data-icon="&#xf269;"></a>
				<?php }
			
			if($fac_url || $twi_url || $ins_url || $lin_url ) {
				echo '</div>';
			}; ?>

		<div class="envisic">Een website van <a href="http://www.envisic.nl">envisic.</a></div>
	</div>
	
</footer>




<?php 
	
	// All JavaScripts for bottom of page
	get_template_part('scripts');
	
?>
	
	
<div class="support-warning"><div class="support-inner"><img src="<?php echo get_template_directory_uri(); ?>/img/support-error-icon.png" class="support-error-image" alt="Browser niet ondersteund"/><span class="h1">Uw browser is verouderd</span>Hierdoor kan de website die u wilt bezoeken niet (goed) worden weergegeven. Ook is werkt uw huidige browser niet meer volgens de laatste veiligheidseisen. 
Update uw browser of ga naar <a href="https://www.whatbrowser.org">whatbrowser.org</a> voor meer informatie of om een andere browser te downloaden. Heeft u al een andere browser zoals Chrome of Firefox geïnstalleerd? Gebruik dan uw andere browser om deze website te bezoeken.</div>
</div></div>	
</body>
</html>