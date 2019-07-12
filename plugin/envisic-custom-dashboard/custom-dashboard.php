<?php
 // needed to load some jquery/css for ACF
/**
 * Our custom dashboard page
 */

/** WordPress Administration Bootstrap */
acf_form_head();
require_once( ABSPATH . 'wp-load.php' );
require_once( ABSPATH . 'wp-admin/admin.php' );
require_once( ABSPATH . 'wp-admin/admin-header.php' );
?>
<div class="custom-dashboard">
	<div class="apex-version">
		Apex Versie: <?php echo apex_version('main') . apex_version('sub') . ' | ' . apex_version('date'); ?>
	</div>
<div class="wrap envisic-dashboard-wrap">

	<h1>Hallo <?php $user_info = get_userdata(1); echo $user_info->first_name; ?>,</h1>
	
	<div class="about-text">
		Welkom op je website! Natuurlijk hopen we dat je veel plezier (en goede zaken ;-) ) beleeft aan je website.
	</div>
	
	<hr>
	
	<div class="column-wrap">
	
		<div class="column">
			<h2>Hulp nodig?</h2>
			Op de uitgebreide help site vind je alle informatie die je nodig bent om je site te beheren:<br>
			<a href="http://help.envisic.nl" class="button-primary" target="_new">help.envisic.nl</a>
		
		</div>
		
		<div class="column">
			<h2>Wil je een vraag stellen?</h2>
			Dat kan natuurlijk. Stel je vraag in onderstaand formulier, klik op 'Versturen' en je krijgt zo snel mogelijk antwoord!
			<form id="support-form" method="post" action="admin.php?page=custom-dashboard">
				<textarea id="support-text-field" name="support-text-field" rows="4" placeholder="Stel je vraag"></textarea>
				<input type="hidden" value="<?php the_field('client-number', 'option'); ?>" name="client-number" id="client-number" />
				<input type="submit" name="submit" id="submit" value="Versturen" >
			</form>
			
			<?php	
				
				if ($_SERVER['REQUEST_METHOD'] == 'POST') :	
					//Get mailto from the flex item, if not set we get the mailto from options page
					$email_to = 'info@envisic.nl';
					
					$reply_to = $email_to;	
					
					$subject = 'Supportvraag van' . get_field('config-name', 'option');
					
					//Convert body array to text and add the permalink of the current page		
					$body = $_POST['support-text-field'] . '\r\n';
					$body .= 'Klantnummer: ' . $_POST['client-number'];
					
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
					
					echo '<bold>Je bericht is verstuurd.</bold>';
				endif;
					
				 ?>
		</div>
	
	</div>
	
	<hr>
	
		<div class="about-text">
			<h3>Laatste nieuws</h3>
			<?php
				$xml=simplexml_load_file("http://xml.app.envisic.nl/news.xml") or die("Error: Cannot create object");
				
				if($xml->important->message) :?>
					<div class="important-message">
						<?php echo $xml->important->message; ?><br>
						<?php if($xml->important->link): ?>
							<a href="<?=$xml->important->link; ?>" class="custom-button-link important-link" target="_new"><?=$xml->important->linktext; ?></a>
						<?php endif; ?>
					</div>
				<?php
				endif;
			
				if($xml->newsitem[0]->message) :?>
					<div class="news-message">
						<i><?=$xml->newsitem[0]->date; ?></i><br>
						<?=$xml->newsitem[0]->message; ?>
					</div>
				<?php endif; 
				
				if($xml->newsitem[1]->message) :?>
					<div class="news-message">
						<i><?=$xml->newsitem[1]->date; ?></i><br>
						<?=$xml->newsitem[1]->message; ?>
					</div>
				<?php endif; ?>
		</div>

</div>

</div>

<style>
	
	.apex-version {
		max-width: 1120px;
		padding: 5px;
		text-align: right;
	}
	
	.envisic-dashboard-wrap {
		max-width: 1050px;
		padding: 40px;
		background: white;
		font-size: 16px;
		line-height: 28px;
	}
	
	hr {
		background: rgb(225,225,225);
		height: 1px;
		border: 0px;
		margin: 20px 0;
	}
	
	.column-wrap {
		display:flex;
		justify-content: space-between;
	}
	
	.column {
		flex: 1 1;
		max-width: 46%;
	}
	
	.column-wrap > div:nth-of-type(odd) {
		padding-right: 4%;
		width: 48%;
		border-right: 1px solid rgb(225,225,225);
	}
	
	a.custom-button-link {
		text-decoration: none;
		border: 1px solid rgb(225,225,225);
		border-radius: 3px;
		padding: 1px 3px;
		margin: 0 3px;
	}
	
	.custom-button-link:hover {
		background: rgba(0,0,0,0.05);
	}
	
	.hide-tab {
		display: none;
	}
	.custom-dashboard .about-wrap {
		background: white;
		padding: 50px;
	}
	
	.nav-tab-active {
		background: white;
		border-bottom: 1px solid white;
	}
	
	.icon {
		font-family: IconsFont;
	}
	
	textarea {
		min-width: 100%;
		border-radius: 3px;
		font-size: 16px;
		line-height: 22px;
		margin: 20px 0;
		display: block;
		resize: none;
	}
	
	.important-message {
		margin: 20px auto;
		padding: 15px;
		border: 1px solid rgb(225,225,225);
		border-top: 3px solid rgb(225, 10, 10);
	}
	
	a.important-link {
		display: inline-block;
		padding: 3px 10px;
		margin: 10px 0px;
	}
	
	.news-message {
		margin: 20px auto;
		padding: 15px;
		border: 1px solid rgb(225,225,225);
	}
	
	.news-message i {
		font-size: 0.9em;
	}
	
</style>

<script>
	
	jQuery(document).ready(function() {
		jQuery(".nav-tab").click(function() {
			jQuery(".nav-tab-active").removeClass("nav-tab-active");
			jQuery(this).addClass("nav-tab-active");
		});
		
		jQuery(".nav-tab-1").click(function() {
			jQuery(".tab").addClass("hide-tab");
			jQuery(".tab-1").removeClass("hide-tab");
			jQuery("nav-tab-active").removeClass("nav-tab-active");
			jQuery(this).addClass("nav-tab-active");
		});
		
		jQuery(".nav-tab-2").click(function() {
			jQuery(".tab").addClass("hide-tab");
			jQuery(".tab-2").removeClass("hide-tab");
		});
		
		jQuery(".nav-tab-3").click(function() {
			jQuery(".tab").addClass("hide-tab");
			jQuery(".tab-3").removeClass("hide-tab");
		});
		
		jQuery(".nav-tab-4").click(function() {
			jQuery(".tab").addClass("hide-tab");
			jQuery(".tab-4").removeClass("hide-tab");
		})
		
	});

</script>

