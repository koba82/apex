<?php

//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Text
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	if( (get_row_layout() == 'flex-text') ):
	
	if(validateFlexItem(get_sub_field('flex-options'))) {
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	$id = rand (9999, 99999);

		//Text without image
		if(get_sub_field('flex-text-add-image') == 'false') : ?>
			<section class="content-wrap c-flex-text <?=$has_bgc; ?>">
				<div class="content">
					<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
						<div class="flex-paragraph <?php the_sub_field('flex-text-spotlight'); ?>">
						
							<?php
							if(get_sub_field('flex-text-header')): ?> <h2 itemprop="description"> <?php the_sub_field('flex-text-header'); ?> </h2> <?php endif; 
							
							if(get_sub_field('flex-text-block')): the_sub_field('flex-text-block'); endif;
							?>
							
						</div>
					</div>
				</div>
			</section>
		
		<?php endif;
	
		//Text WITH image	
		if(get_sub_field('flex-text-add-image') == 'true' ) :
		
			$image = get_sub_field('flex-text-image'); ?>
			 
			<section class="content-wrap c-flex-text <?=$has_bgc; ?>" >
				<div class="content <?php the_sub_field('flex-text-image-position'); ?>" >
					<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
						<div class="flex-text-image-column <?php the_sub_field('flex-text-spotlight'); ?> text-col" >
							<div class="flex-paragraph">	
							<?php
							if(get_sub_field('flex-text-header')): ?> 
								<h2 itemprop="description"><?php the_sub_field('flex-text-header'); ?></h2>
								<?php endif; the_sub_field('flex-text-block'); ?>
							</div>
						</div>
						
						<div class="flex-text-image-column image-col">							
							<div class="content-image-wrap">
								<a href="<?php echo $image['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>" class="content-image"> 
									<img src="<?=$image['sizes']['main-image-size'];?>" alt="<?=$image['alt'];?>" />
									<div class="img-as-background" style="background: url(<?=$image['sizes']['main-image-size'];?>); background-position: center center; background-size: cover;"></div>
									<div class="content-image-overlay">	
										<div class="content-image-enlarge-icon">
											<div class="icon-plus"></div>
										</div>
									</div>
								</a>
								<?php
								$image_caption = $image['caption'];	
								if($image_caption): ?>
									<div class="content-image-text">
										<span data-icon='&#xf1e4;'><?php echo $image_caption; ?></span>
									</div>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
				
				<script>
				$(document).ready(function() {
					$('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();
					$('.slider-<?=$id; ?>').flickity({
						cellAlign: 'left',
						contain: false,
						percentPosition: false,
						freeScroll: true,
						wrapAround: false,
						autoPlay: false,
						pageDots: false,
						prevNextButtons: true,
						groupCells: 3,
						arrowShape: { 
							x0: 10,
							x1: 60, y1: 50,
							x2: 60, y2: 50,
							x3: 60
							  }
					});

				});
				</script>
			</section>

		<?php endif; 
	
	}; //End the options if statement

//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Image
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-image' ):

	if(validateFlexItem(get_sub_field('flex-options'))) :
	
		$bgc = get_sub_field('flex-options');
		$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
		$image_array = get_sub_field('flex-image-array'); 
		$id = rand (9999, 99999); ?>
		
		
		<section class="content-wrap c-flex-image <?=$has_bgc; ?>" >
			<div class="content" >
				<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
					<?php if(get_sub_field('flex-title')) : ?>
						<h2><?php the_sub_field('flex-title'); ?></h2>
					<?php endif; ?>
					<div class="content-image-group-wrap">
						<?php if($image_array) :
							foreach($image_array as $single_image) : ?>
								<div class="content-image-wrap">
									<a href="<?=$single_image['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>" class="content-image" style="background: url(<?=$single_image['sizes']['main-image-size']; ?>); background-size: cover; background-position: center center;" title="<?=$single_image['alt']; ?>"> 
										<img src="<?=$single_image['sizes']['main-image-size']; ?>" alt="<?=$single_image['alt']; ?>" />
										<div class="content-image-overlay">	
											<div class="content-image-enlarge-icon">
												<div class="icon-plus"></div>
											</div>
										</div>
									</a>
							
									<?php 
									if($image['caption']): ?>
										<div class="content-image-text">
											<span data-icon="&#xf16a;"><?=$image['caption']; ?></span>
										</div>
									<?php
									endif;?>
								</div>
							<?php
							endforeach;
						endif;
						?>
					</div>
				</div>
			</div>
			
			<script>
				$(document).ready(function() {
					
					jQuery("a[data-lightbox-id=<? echo $id; ?>] > img").each(function() {
						let imageHeight = $(this).height();
						let imageWidth = $(this).width();
						
						let imageMode = (imageHeight > imageWidth) ? 'portrait' : 'landscape';
						
						$(this).parent().parent().addClass(imageMode);
					});
					
					$('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();
					$('.slider-<?=$id; ?>').flickity({
						cellAlign: 'left',
						contain: false,
						percentPosition: false,
						freeScroll: true,
						wrapAround: false,
						autoPlay: false,
						pageDots: false,
						prevNextButtons: true,
						groupCells: 3,
						arrowShape: { 
							x0: 10,
							x1: 60, y1: 50,
							x2: 60, y2: 50,
							x3: 60
							  }
					});
				});
			</script>
		</section>

	<?php endif;

//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Image Gallery
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-gallery' ): 
	
	if(validateFlexItem(get_sub_field('flex-options'))) {
		
		$bgc = get_sub_field('flex-options');
		$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
		$gallery_type = get_sub_field('flex-gallery-type');
		?>	

		<section class="content-wrap c-flex-gallery <?=$has_bgc; ?>" >
			<div class="content" >
				<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
					<?php
					
					if( get_sub_field('flex-gallery-title') ) :
						echo "<h2>";
						the_sub_field('flex-gallery-title');
						echo "</h2>";
					endif;
					
					$id = rand (9999, 99999);
					
					$gallery_images = get_sub_field('flex-gallery-images');
					if( $gallery_images && $gallery_type == 'slider' ): ?>
						<div class="flex-gallery slider-<?=$id; ?>">
						<?php
							foreach( $gallery_images as $img ): ?>
								<div class="flex-gallery-image">
									<a class="content-image" href="<?php echo $img['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>">
										<img src="<?php echo $img['sizes']['front-end-thumb']; ?>" alt="<?php echo $img['alt']; ?>" />
										<div class="content-image-overlay"></div>
									</a>
								</div>
							<?php endforeach; ?>
							<span class="stretch"></span>
						</div>
						<?php
					endif;
					
					if( $gallery_images && $gallery_type == 'gallery' ): ?>
						<div class="flex-gallery-album">
						<?php
							foreach( $gallery_images as $img ): ?>
								<div class="flex-gallery-image content-image-wrap">
									<a href="<?php echo $img['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>" class="content-image">
										<img src="<?php echo $img['sizes']['front-end-thumb']; ?>" alt="<?php echo $img['alt']; ?>" />
										<div class="content-image-overlay">	
											<div class="content-image-enlarge-icon">
												<div class="icon-plus"></div>
											</div>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
							<span class="stretch"></span>
						</div>
						<?php
					endif;?>
				</div>
			</div>
			<script>
				$(document).ready(function() {
					$('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();
					$('.slider-<?=$id; ?>').flickity({
						cellAlign: 'left',
						contain: false,
						percentPosition: false,
						freeScroll: true,
						wrapAround: false,
						autoPlay: false,
						pageDots: false,
						prevNextButtons: true,
						groupCells: 3,
						arrowShape: { 
							x0: 10,
							x1: 60, y1: 50,
							x2: 60, y2: 50,
							x3: 60
							  }
					});
				});
			</script>
		</section>
			
	<?php };
		
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Slider
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-slider' ): 
	
	if(validateFlexItem(get_sub_field('flex-options'))) :
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	
		$slider_id = rand (9999, 99999);
		$id = rand (9999, 99999);
		$slider_autoplay = get_sub_field('slider-autoplay');
			if($slider_autoplay): $slider_autoplay_string = 'true'; else: $slider_autoplay_string = 'false'; endif;
		$slider_interval = get_sub_field('slider-interval') * 100;
		?>
	
	
		<?php
		//Text slider
		if(get_sub_field('flex-slider-type') == 'text') { ?>
		
			<section class="content-wrap c-flex-slider <?=$has_bgc; ?>" >
				<div class="content" >
					<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
					<?php if(get_sub_field('flex-slider-header')) : ?>
						<h2><?php the_sub_field('flex-slider-header'); ?></h2>
					<?php endif; ?>
						<div class="flex-content-slider flex-slider flex-slider-<?php echo $slider_id; ?>">
						
							<?php	
							if ( have_rows( 'flex-slider-slides' ) ) :
								while ( have_rows( 'flex-slider-slides' ) ) : the_row();	
									if( get_row_layout() == 'the-slides' ): ?>
										<div class="flex-slider-slide">
											<div class="flex-slider-content">
												<q><?php the_sub_field( 'the-slide-text' ); ?></q>
												<br><strong><?php the_sub_field( 'the-slide-text2'); ?></strong>
											</div>
										</div>	
									<?php endif;
								endwhile;
							endif;
							?>
							
						</div>
					</div>
				</div>
			</section>
		
			<?php } 
			
		//Image slider	
		elseif(get_sub_field('flex-slider-type') == 'image' ) { ?>
			

			<section class="content-wrap c-flex-image-slider <?=$has_bgc; ?>" >
				<div class="content" >
					<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
					<?php if(get_sub_field('flex-slider-header')) : ?>
						<h2><?php the_sub_field('flex-slider-header'); ?></h2>
					<?php endif; ?>
						<div class="flex-image-slider">
							<div class="flex-slider flex-slider-<?=$slider_id;?>">
							
							<?php
							$gallery_images = get_sub_field('flex-gallery-images');
							if( $gallery_images ): 
								
								foreach( $gallery_images as $gallery_single_image ): ?>
									<div class="flex-slider-slide">
									
										<img src="<?=$gallery_single_image['sizes']['main-image-size']; ?>" alt="<?=$gallery_single_image['alt']; ?>" />
										<a href="<?=$gallery_single_image['sizes']['main-image-size']; ?>" data-lightbox-id="<? echo $id; ?>">
											<div class="content-image-overlay">	
												<div class="content-image-enlarge-icon">
													<div class="icon-plus"></div>
												</div>
											</div>
										</a>
									</div>
								<?php endforeach;
							endif; ?>
							</div>
						</div>
					</div>	
				</div>
			</section>	
					
			<?php }
			
			//Text and image slider
			
			else {
				echo 'text and image slider';
			}; ?>
			
			
		<script>
			
			$(document).ready(function() {

				growToTallestElement('.flex-slider-<?=$slider_id; ?> .flex-slide-content','.flex-slider-<?=$slider_id; ?> .flickity-slider');
				
				$('.flex-slider-<?=$slider_id; ?>').flickity({
					cellAlign: 'center',
					contain: true,
					freeScroll: false,
					wrapAround: true,
					autoPlay: true,
					pageDots: true,
					prevNextButtons: false,
					arrowShape: { 
						x0: 10,
						x1: 60, y1: 50,
						x2: 60, y2: 50,
						x3: 60
					      }
				});
			
				$(document).ready(function() {
					$('a[data-lightbox-id="<?php echo $id; ?>"]').simpleLightbox();
				});
			
			});
		</script>
			
	<?php endif;
		
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	YouTube video
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-youtube' ):
	
	if(validateFlexItem(get_sub_field('flex-options'))) : 
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	?>
	
	<section class="content-wrap c-flex-youtube <?=$has_bgc; ?>" >
		<div class="content">
			<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
				<div class="flex-youtube-wrapper">
					<?php the_sub_field('flex-youtube-iframe'); ?>
				</div>
			</div>
		</div>
	</section>

	<?php endif;
		
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Call to Action
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-cta' ):
	
	if(validateFlexItem(get_sub_field('flex-options'))) : 
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	
		$flex_cta_item = get_sub_field('flex-cta-object');
			
		//Count buttons and decide for 1, 2 or 3 buttons per row. 
		$buts = count($flex_cta_item);
		( $buts == 1 ) ? $data_row_items = 1 : ( ( in_array($buts, array(2,4,8,10,14)) ) ? $data_row_items = 2 : $data_row_items = 3 ); 
				
		//See if any of the buttons contain an image. If so, add 'large-button' class so all buttons are the same size.
		$no_of_large_buttons = 0;
		foreach($flex_cta_item as $item) :
			if($item['flex-cta-image-option']) :
				$no_of_large_buttons++;
			endif;
		endforeach;
		
		$xl_but = ($no_of_large_buttons > 0) ? 'large-button' : ''; ?>
		
		<section class="content-wrap c-flex-cta <?=$has_bgc; ?> <?php echo ($xl_but) ? 'has-large-buttons' : ''; ?>" >
			<div class="content" >
				<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
					
					<?php if(get_sub_field('flex-title')) : ?>
						<h2><?php the_sub_field('flex-title'); ?></h2>
					<?php endif; ?>
					<?php if(get_sub_field('flex-text')) : ?>
						<div class="cta-text-intro"><?php the_sub_field('flex-text'); ?></div>
					<?php endif; ?>
					
					<div class="flex-cta" data-row-items="<?=$data_row_items; ?>">	
			
			<?php		
			//creating the buttons
			if( $flex_cta_item ): 
				foreach( $flex_cta_item as $item ):
					$is_link = true;
					
					//Determine CTA type
					switch($item['flex-cta-type']) {
						case "internal" :
							$cta_link = $item['flex-cta-link'];
							$open_new_window = false;
							break;
						case "file" :
							$cta_link = $item['flex-cta-file']['url'] ;
							$open_new_window = true;
							break;
						case "external" :
							$cta_link = $item['flex-cta-external-link'];
							$open_new_window = true;
							break;
						default:
							$cta_link = '#' ;
							$is_link = false;
					}; ?>

							<div class="flex-cta-button-wrap">
							<?php 
							//If link, build a link, else create a div
							if($is_link) : ?>
								<a href="<?=$cta_link; ?>" <?php if($open_new_window): ?>target="new_window" <?php endif; ?>
								class="button flex-cta-button <?=$xl_but; ?> <?php if($item['flex-cta-image-option']) : echo "has-image"; else : echo "has-no-image"; endif; ?>"><?php 
							else : ?>
								<div class="flex-cta-button <?=$xl_but; ?>"> <?php
							endif; ?>										
								<?php if($item['flex-cta-image-option']) : ?>
									<div class="flex-cta-image">
										<img src="<?=$item['flex-cta-image']['sizes']['front-end-thumb']; ?>" alt="<?=$item['flex-cta-image']['alt']; ?>" />
									</div>
								<?php endif; ?>
							<?php if($item['flex-cta-icon'] !== '-') { echo '<div class="cta-icon" data-icon="&#' . $item['flex-cta-icon'] . ';"></div>'; }; ?>
							<span class="cta-text"><?=$item['flex-cta-text']; ?></span>
							<?php 
							//Close link or div	
							if($is_link) : ?></a><?php else : ?></div> <?php endif; ?>
						</div>
							
						<?php 
					endforeach;
					endif; ?>
						
					</div>
				</div>
			</div>
		</section>
	<?php endif;
		
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	USP List
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-usp' ): 
	
	if(validateFlexItem(get_sub_field('flex-options'))) {
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	
	$usp_header = get_sub_field('flex-usp-header'); 
	$usp_cta_link = get_sub_field('flex-usp-cta-link'); ?>
	
	<section class="content-wrap c-flex-usp <?=$has_bgc; ?>" >
		<div class="content">
			<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
				<div class="usp-content-wrap">
					<div class="usp-header">
						<h2><?php echo $usp_header; ?></h2>
					</div>
					<?php	
					if( have_rows('flex-usp-list')): ?>
						<ul class="usp-list">
							<?php
							while( have_rows('flex-usp-list') ): the_row(); ?>
								<li data-icon="&#xf17d;"><?php the_sub_field('flex-usp-list-item'); ?></li>
							<?php
							endwhile; ?>
						</ul>
					<?php 
					endif; ?>
				</div>
				
				
				<?
				if($usp_cta_link) :	?>
					<div class="flex-usp-button-wrap">
						<a href="<?php echo $usp_cta_link; ?>" <?php if($open_new_window): ?>target="newwindow" <?php endif; ?>class="button flex-usp-button">
							<span class="usp-text icon-calendar"><?php the_sub_field('flex-usp-cta-text'); ?></span>
						</a>
					</div>
				<?php
				endif;?>
			</div>
		</div>
	</section>
	
	<?php };
	
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	HTML Block
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-html' ):
	
		the_sub_field('flex-html-block'); 

	
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	PHP Include
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-php-include' ):
	
		$php_include = get_sub_field('flex-php-include-this');
		get_template_part($php_include); 

	
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Table
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-table' ):
	
	if(validateFlexItem(get_sub_field('flex-options'))) {
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	?>
	
	<section class="content-wrap c-flex-table <?=$has_bgc; ?>" >
		<div class="content">
			<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
				
				<?php if(get_sub_field('flex-title')) : ?>
					<h2><?php the_sub_field('flex-title'); ?></h2>
				<?php endif; ?>
				<div class="flex-table-wrap">
				<?php
					$table = get_sub_field( 'flex-table-content' );
						if ( $table ) {
							echo '<table border="0">';
							if ( $table['header'] ) {
						    echo '<thead>';
								echo '<tr>';
					    
					    foreach ( $table['header'] as $th ) {
						echo '<th>';
						    echo $th['c'];
						echo '</th>';
					    }
					    
								echo '</tr>';
								echo '</thead>';
						}
						
							echo '<tbody>';
								foreach ( $table['body'] as $tr ) {
									echo '<tr>';
									foreach ( $tr as $td ) {
										echo '<td>';
						    echo $td['c'];
										echo '</td>';
						}
								echo '</tr>';
						}
							echo '</tbody>';
						echo '</table>';
						} ?>
				</div>
			</div>
		</div>
	</section>

	<?php };
	
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Display Child pages
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-child-pages' ):
	
	if(validateFlexItem(get_sub_field('flex-options'))) {
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	?>
	
	<section class="content-wrap c-flex-child-pages <?=$has_bgc; ?>" >
		<div class="content" >
			<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
			
				<?php if(get_sub_field('flex-title')) : ?>
					<h2><?php the_sub_field('flex-title'); ?></h2>
				<?php endif; ?>
				<?php if(get_sub_field('flex-text')) : ?>
					<div class="child-pages-intro"><?php the_sub_field('flex-text'); ?></div>
				<?php endif; ?>
				
				<div class="flex-cta flex-child-pages">
					<?php
					$childPages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'desc' ) );
					
					foreach( $childPages as $page ) :
					
						$content = $page->post_content;
						$content = apply_filters( 'the_content', $content ); 	?>
						
						<div class="flex-cta-button-wrap child-page-wrap">
							
							<a href="<?php echo get_page_link( $page->ID ); ?>" class="button flex-cta-button large-button">
							<?php echo $page->post_title; ?>
							</a>
							
						</div>

					<?php
					endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<?php };		
	
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Form
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-form' ):
		
		if(validateFlexItem(get_sub_field('flex-options'))) :
		
		$bgc = get_sub_field('flex-options');
		$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
		
		$form_source = get_sub_field('form-source');
		
		//Create some variables
		$field_counter = 1; $field_type = array(); $field_label = array(); $body = array(); $form_id = rand (9999, 99999); ?>
		
			<section class="content-wrap c-flex-form <?=$has_bgc; ?>" id="form-id" >
				<div class="content">
					<div class="content-animation" <?php if ( get_field('aos-element', 'option') == 'content' ) : echo 'data-aos="' . get_field('aos-animation', 'option') . '"'; endif; ?>>
						<div class="flex-form-wrap">
							<h2><?php the_sub_field('flex-form-title'); ?></h2>
							<form id="form-<?=$form_id;?>" method="post" action="<?php echo the_permalink(); ?>#form-id">
							
							<?php
							if ( have_rows( 'flex-form-fields' ) ) :
							
								while ( have_rows( 'flex-form-fields' ) ) : the_row(); 
								
									$req_field = (get_sub_field('flex-form-field-required')) ? "required" : ""; ?>
									
									<?php 
									if(get_sub_field('flex-form-field-type') == "select") : ?>
										
										<div class="flex-field-wrap">
											<label for="field-<?=$field_counter;?>" class="field-<?=$field_counter;?> <?php the_sub_field('flex-form-field-type'); ?>-field<?php if($req_field) : ?> required-field <?php endif; ?>"><?php the_sub_field('flex-form-field-label'); ?></label>
											<select id="field-<?=$field_counter;?>" name="field-<?=$field_counter;?>" <?=$req_field;?>>
												<?php
												if(get_sub_field('select-options')):
													$options = get_sub_field('select-options');
													foreach($options as $single_option): ?>
														<option>
															<?=$single_option['select-option']; ?>
														</option>
													<?php
													endforeach;
												endif; ?>
											</select>								
											<div class="clear"></div>
										</div>
										<?php
										//Add current field type to field_type array
										$field_type[$field_counter] = get_sub_field('flex-form-field-type');
										
										//Add current label to field_label array
										$field_label[$field_counter] = get_sub_field('flex-form-field-label');
										
										$field_counter++ ;
									
									elseif(get_sub_field('flex-form-field-type') == "textarea") : ?>
										<div class="flex-field-wrap">
											<label for="field-<?=$field_counter;?>" class="field-<?=$field_counter;?> <?php the_sub_field('flex-form-field-type'); ?>-field<?php if($req_field) { ?> required-field <?php }; ?>"><?php the_sub_field('flex-form-field-label'); ?></label>
											<textarea id="field-<?=$field_counter;?>" name="field-<?=$field_counter;?>" <?=$req_field;?> rows="4"></textarea>
										</div>
									<?php
										$field_counter++ ;
									
									else : ?>
										<div class="flex-field-wrap">
											<label for="field-<?=$field_counter;?>" class="field-<?=$field_counter;?> <?php the_sub_field('flex-form-field-type'); ?>-field<?php if($req_field) { ?> required-field <?php }; ?>"><?php the_sub_field('flex-form-field-label'); ?></label>
											<input id="field-<?=$field_counter;?>" name="field-<?=$field_counter;?>" type="<?php the_sub_field('flex-form-field-type'); ?>" <?=$req_field;?>>
											<div class="clear"></div>
				
										</div>
										<?php
										//Add current field type to field_type array
										$field_type[$field_counter] = get_sub_field('flex-form-field-type');
										
										//Add current label to field_label array
										$field_label[$field_counter] = get_sub_field('flex-form-field-label');
										
										$field_counter++ ;
									endif;
								
								endwhile;
							endif; ?>
							
							<?php
							//Custom send button text
							if(get_sub_field('flex-form-alt-send')) {
								$send_text = get_sub_field('flex-form-alt-send');	
							} else {
								$send_text = 'Verzenden';
							} ?>
			
								<div class="g-recaptcha" data-sitekey="<?php the_field("recaptcha_site_key", "options"); ?>"></div>
								<input type="submit" name="submit" id="recaptcha-submit" value="<?=$send_text;?>" class="button" >
							
							</form>
						</div>
					</div>
				</div>
			</section>
		
		<?php	
		
			if ($_SERVER['REQUEST_METHOD'] == 'POST') :
				
				// your secret key
				$secret_key = get_field("recaptcha_secret_key", "options");
				$remote_ip = $_SERVER['REMOTE_ADDR'];
				$captcha;
				
				// get captcha response
				if(isset($_POST['g-recaptcha-response'])){
					$captcha=$_POST['g-recaptcha-response'];
				};
				
				// Error message: if captcha response is empty
				if(!$captcha){
					echo '<div class="flex-form-success-wrap flex-form-success-show">
						<div class="flex-form-success">
							<div class="flex-form-success-icon" data-icon="&#xf191;"></div>
							<h2>Vink het reCaptcha vinkje aan</h2>
							<div class="flex-form-close-button">Sluiten</div>
						</div>
					</div>';
				};
					
				$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha."&remoteip=".$ip);
				$responseKeys = json_decode($response,true);
				
				// Error message: if captcha response is not success
				if(intval($responseKeys["success"]) !== 1) :
					echo '<div class="flex-form-success-wrap flex-form-success-show">
						<div class="flex-form-success">
							<div class="flex-form-success-icon" data-icon="&#xf191;"></div>
							<h2>Er is een fout opgetreden: vink het reCaptcha vinkje aan.</h2>
							<div class="flex-form-close-button">Sluiten</div>
						</div>
					</div>';
				
				// If captach response is success, we construct the mail
				else :
				
					//Get mailto from the flex item, if not set we get the mailto from options page
					$email_to = (get_sub_field('flex-form-alt-email')) ? get_sub_field('flex-form-alt-email') : get_field('config-email', 'option');
					
					$reply_to = $email_to;
					$body_item = array();
					
					//Loop through all fields and store the label + user input in body array
					for ($i = 1; $i <= $field_counter; $i++) {
						
					    $body_item[$i] = $_POST['field-' . $i];
					    $body[$i] = $field_label[$i] . ' :' . $body_item[$i];
					    
						$reply_to = ($field_type[$i] == 'email') ? $body_item[$i] : $email_to;
					}	
					
					$subject = 'E-mail van website:' . get_field('config-name', 'option');
					
					//Convert body array to text and add the permalink of the current page		
					$body = implode("\r",$body) . "\r\r Verzonden vanaf:" . get_permalink();
					
					//Create mail header
					$organisation_naw = get_field('config-naw', 'option');
					$organisation_name = $organisation_naw['name'];
					$organisation_mail = $organisation_naw['email'];
					
					$headers = 'From: ' . $organisation_name . ' <'. $organisation_mail . '>' . "\r\n" . 'Reply-To: ' . $organisation_mail . "\r\n";
					$headers .= "Organization: " . $organisation_name . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
					$headers .= "X-Priority: 3\r\n";
					$headers .= "X-Mailer: PHP". phpversion() ."\r\n"; 

					//Send the mail
					wp_mail($email_to, $subject, $body, $headers);
					$emailSent = true;
					
					//Show success message
					echo '<div class="flex-form-success-wrap flex-form-success-show"><div class="flex-form-success"><div class="flex-form-success-icon" data-icon="&#xf17f;"></div><h2>' . get_sub_field('flex-form-success-message') . '</h2><div class="flex-form-close-button">Sluiten</div></div></div>';
				endif;
			endif;
			
		 ?>
		 
		 <script>
			 $(document).ready(function() {
				 $(".flex-form-close-button").click(function() {
					 $(".flex-form-success-wrap").removeClass('flex-form-success-show');
				 });
				 
			 });
		</script>
		<?php
		endif;
		
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Module: Occasion overview
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-mod-occasions' ):
	
	if(validateFlexItem(get_sub_field('flex-options'))) {
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	?>
	<div class="content-block <?=$has_bgc; ?>" >
		<div class="content c-flex-mod-occ-overview" >
			
			<?php $loop = new WP_Query( array( 'post_type' => 'occasions' ) ); ?>

			<?php while ( $loop->have_posts() ) : $loop->the_post(); 
				
				$mod_occ_img_gallery = get_field('mod-occ-img');
				$mod_occ_img = $mod_occ_img_gallery[1];
				?>
				<a href="<?php the_permalink(); ?>">
					<div class="mod-occ-overview-block">
						<div class="mod-occ-overview-img">
							<img src="<?=$mod_occ_img['sizes']['image-gallery-thumbnail-size']; ?>">
						</div>
						<div class="mod-occ-overview-title">
							<?php the_field('mod-occ-brand'); ?> <?php the_field('mod-occ-type'); ?>
						</div>
					</div>
				</a>
				
				
				
			<?php endwhile; ?>
				
		</div>
	</div>

	<?php };
			
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//	Google Maps
//----------------------------------------------------------------------------------------------------------------------------------------------------------
	elseif( get_row_layout() == 'flex-maps' ):
	
	if(validateFlexItem(get_sub_field('flex-options'))) {
	$bgc = get_sub_field('flex-options');
	$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
	
	
	$marker_address = get_sub_field('flex-maps-address');
	$maps_width = get_sub_field('flex-maps-width');
	$maps_height = get_sub_field('flex-maps-height');
	$background_color =  get_sub_field('flex-bgc');
	?>
	
	<section class="content-wrap c-google-maps <?php the_sub_Field('flex-bgc'); ?> <?php if($maps_width == 'full') : echo 'full-width bgc'; endif;?>"  style="height:<?=$maps_height; ?>px">
		<div class="google-maps-wrap">
	
	
	<div id="map"></div>
	
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=<?php the_field('google_maps_api_key', 'option'); ?>&callback=initMap&language=nl">
	</script>
	
	<script>
		function initMap() {

			let lat = "";
			let lng = "";
			let x = new XMLHttpRequest();
			
			//Get address from user and convert it to url friendly format, then construct the URL
			let addressString = "<?php echo $marker_address; ?>";
			addressString = encodeURIComponent(addressString.trim());
			let geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/xml?address=" + addressString;
			
			x.open("GET", geocodeUrl, true);
			x.onreadystatechange = function () {
				if (x.readyState == 4 && x.status == 200) {
					//Get the latitude and longitude from the XML file
					var doc = x.responseXML;
					lat = doc.getElementsByTagName("lat")[0].textContent;
					lng = doc.getElementsByTagName("lng")[0].textContent;
							
					//Put the map otions in an array
					let mapOptions = {
						center: new google.maps.LatLng(lat,lng),
						zoom: <?php the_sub_field('flex-maps-zoom'); ?>,
						scrollWheel: false,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
					}	
					//Create the map 
					let map = new google.maps.Map(document.getElementById("map"), mapOptions);   
					let image = {
						url : '<?php echo get_template_directory_uri(); ?>/img/maps-marker.svg',
						size: new google.maps.Size(42, 54),
					};
					map.setOptions({'scrollwheel': false});
					let myLatLng = new google.maps.LatLng(lat,lng);
					let mapsMarker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						icon: image
					});
				};
			};
			x.send(null);
		}   
		initMap();
		
	</script>


		</div>
	</section>

	<?php };
	
	elseif(get_row_layout() != '' ):
	
		get_template_part('acf-flex-loop-addition');
			
	endif;
	