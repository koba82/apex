<?php
		$bgc = get_sub_field('flex-options');
		$has_bgc = ( $bgc['flex-bgc-select'] == 'geen' ) ? 'no-bgc' : 'bgc ' . $bgc['flex-bgc-select'];
		
		$form_source = get_sub_field('form-source');
		
		//Create some variables
		$field_counter = 1; $field_type = array(); $field_label = array(); $body = array(); $form_id = rand (9999, 99999); ?>
		
			<section class="content-wrap c-flex-form <?=$has_bgc; ?>" id="form-id" >
				<div class="content">
					<div class="content-animation">
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
				
				// // your secret key
				// $secret_key = get_field("recaptcha_secret_key", "options");
				// $remote_ip = $_SERVER['REMOTE_ADDR'];
				// $captcha;
				
				// // get captcha response
				// if(isset($_POST['g-recaptcha-response'])){
				// 	$captcha=$_POST['g-recaptcha-response'];
				// };
				
				// // Error message: if captcha response is empty
				// if(!$captcha){
				// 	echo '<div class="flex-form-success-wrap flex-form-success-show">
				// 		<div class="flex-form-success">
				// 			<div class="flex-form-success-icon" data-icon="&#xf191;"></div>
				// 			<h2>Vink het reCaptcha vinkje aan</h2>
				// 			<div class="flex-form-close-button">Sluiten</div>
				// 		</div>
				// 	</div>';
				// };
					
				//$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha."&remoteip=".$ip);
				//$responseKeys = json_decode($response,true);
				
				// Error message: if captcha response is not success
				//if(intval($responseKeys["success"]) !== 1) :
				//	echo '<div class="flex-form-success-wrap flex-form-success-show">
				//		<div class="flex-form-success">
				//			<div class="flex-form-success-icon" data-icon="&#xf191;"></div>
				//			<h2>Er is een fout opgetreden: vink het reCaptcha vinkje aan.</h2>
				//			<div class="flex-form-close-button">Sluiten</div>
				//		</div>
				//	</div>';
				
				// If captach response is success, we construct the mail
				//else :
				
					//Get mailto from the flex item, if not set we get the mailto from options page
					//$email_to = (get_sub_field('flex-form-alt-email')) ? get_sub_field('flex-form-alt-email') : get_field('config-email', 'option');
					
					//$reply_to = $email_to;
					//$body_item = array();
					
					//Loop through all fields and store the label + user input in body array
					// for ($i = 1; $i <= $field_counter; $i++) {
						
					//     $body_item[$i] = $_POST['field-' . $i];
					//     $body[$i] = $field_label[$i] . ' :' . $body_item[$i];
					    
					// 	$reply_to = ($field_type[$i] == 'email') ? $body_item[$i] : $email_to;
					// }	
					
					//$subject = 'E-mail van website:' . get_field('config-name', 'option');
					
					//Convert body array to text and add the permalink of the current page		
					//$body = implode("\r",$body) . "\r\r Verzonden vanaf:" . get_permalink();
					
					//Create mail header
					//$organisation_naw = get_field('config-naw', 'option');
					//$organisation_name = $organisation_naw['name'];
					//$organisation_mail = $organisation_naw['email'];
					
					//$headers = 'From: ' . $organisation_name . ' <'. $organisation_mail . '>' . "\r\n" . 'Reply-To: ' . $organisation_mail . "\r\n";
					//$headers .= "Organization: " . $organisation_name . "\r\n";
					//$headers .= "MIME-Version: 1.0\r\n";
					//$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
					//$headers .= "X-Priority: 3\r\n";
					//$headers .= "X-Mailer: PHP". phpversion() ."\r\n"; 

					//Send the mail
					//wp_mail($email_to, $subject, $body, $headers);
					
					function send_smtp_email( $phpmailer ) {
						$phpmailer->isSMTP();
						$phpmailer->Host       = 'mail.envisichosting.nl';
						$phpmailer->Port       = '26';
						$phpmailer->SMTPAuth   = true;
						$phpmailer->Username   = 'mailer@envisichosting.nl';
						$phpmailer->Password   = 'Digital/Offset';
						$phpmailer->From       = 'mailer@envisichosting.nl';
						$phpmailer->FromName   = 'From Name';
						$phpmailer->addReplyTo('mailer@envisichosting.nl', 'Information');
					}
					
					function set_my_mail_content_type() {
						return "text/html";
					}
					
					function my_function() {
					
						$to = 'test-w1c3svhmd@mail-tester.com';
						$subject = 'Here is the subject';
						$message = 'This is the HTML message body <b>in bold!</b>'; 
					
						add_filter( 'wp_mail_content_type','set_my_mail_content_type' );
						add_action( 'phpmailer_init', 'send_smtp_email' );
					
						wp_mail( $to, $subject, $message );
					
						remove_filter( 'wp_mail_content_type','set_my_mail_content_type' );
						remove_action( 'phpmailer_init', 'send_smtp_email' );
					
					}

					my_function();

					// // Settings
					// $mail->IsSMTP();
					// $mail->CharSet = 'UTF-8';

					// $mail->Host       = "mail.envisichosting.nl"; // SMTP server example
					// $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
					// $mail->SMTPAuth   = true;                  // enable SMTP authentication
					// $mail->Port       = 26;                    // set the SMTP port for the GMAIL server
					// $mail->Username   = "mailer@envisichosting.nl"; // SMTP account username example
					// $mail->Password   = "Digital/Offset";        // SMTP account password example

					// // Content
					// $mail->isHTML(true);                                  // Set email format to HTML
					// $mail->Subject = 'Here is the subject';
					// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
					// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					// $mail->send();

					// $emailSent = true;

					
					//Show success message
					echo '<div class="flex-form-success-wrap flex-form-success-show"><div class="flex-form-success"><div class="flex-form-success-icon" data-icon="&#xf17f;"></div><h2>' . get_sub_field('flex-form-success-message') . '</h2><div class="flex-form-close-button">Sluiten</div></div></div>';
				
				// Recaptcha if/else
				//endif;
			endif;
			
		 ?>
		 
		 <script>
			 window.addEventListener('load', function () {
				 $(".flex-form-close-button").click(function() {
					 $(".flex-form-success-wrap").removeClass('flex-form-success-show');
				 });
				 
			 });
		</script>
