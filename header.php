<?php
/*
Theme Name: Bounty Bali
Theme URI: http://www.bountybali.com/
Description: Themes Bounty Bali
Author URI: http://www.bountybali.com/
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	
<title><?php wp_title(''); ?></title>
<?php
    $favicon=get_field('favicon', 'option');
    if($favicon) {
?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $favicon['url']; ?>"> 
<?php } ?>
<?php //echo get_post_meta($post->ID, '_yoast_wpseo_metakeywords', true); ?>
<?php //echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true); ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/custom.css">
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/scrolling-nav.css">


<?php wp_head(); ?>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scrolling-nav.js"></script>
<script async src="https://www.google.com/recaptcha/api.js?render=6LdYl1AaAAAAAJATNEaqKUXRCPFDUhDQ7C6luG9t"></script>
<script>
    $(document).ready(function () {
	/*$('#myform').submit(function(event) {
            event.preventDefault(); // Prevent direct form submission
            $('#alert').text('Processing...').fadeIn(0); // Display "Processing" to let the user know that the form is being submitted
            grecaptcha.ready(function () {
                grecaptcha.execute('6LdYl1AaAAAAAJATNEaqKUXRCPFDUhDQ7C6luG9t', { action: 'submits' }).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                    // Make the Ajax call here
                    $.ajax({
                        url: '',
                        type: 'post',
                        data: $('#myform').serialize(),
                        dataType: 'json',
                        success: function( _response ){
                            // The Ajax request is a success. _response is a JSON object
                            var error = _response.error;
                            var success = _response.success;
                            if(error != "") {
                                // In case of error, display it to user
                                $('#alert').html(error);
                            }
                            else {
                                // In case of success, display it to user and remove the submit button
                                $('#alert').html(success);
                                $('.btn-primary').remove();
                            }
                        },
                        error: function(jqXhr, json, errorThrown){
                            // In case of Ajax error too, display the result
                            var error = jqXhr.responseText;
                            $('#alert').html(error);
                        }
                    });
                });
            });
        });*/
    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.wptb-preview-table tbody tr').hide();
            $('.wptb-preview-table tbody tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));
	$('form #reg_numb').keyup(function() {
		  var v = $(this).val().replace(/\D/g, ''); // Remove non-numerics
		  v = v.replace(/(\d{4})(?=\d)/g, '$1-'); // Add dashes every 4th digit
		  $(this).val(v)
	});
	$("form #reg_numb").attr('maxlength', 9);
	
});
</script>
</head>
<body data-spy="scroll" data-target=".navbar-fixed-top">
<div id="page-top" class="clearfix">
<header>
	
   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	   <!--<div class="container">
		   <div class="row pad-top-20">
			<div class="col-sm-6 col-md-6 text-left">
				<a href="<?php echo site_url(); ?>">
				  <?php
						$logoWhite = get_field('logo_white', 'options');
						$logoBlack = get_field('logo_black', 'options');
						$logoText = get_field('logo_text', 'options');
						if($logoWhite) {
				  ?>
					<img src="<?php echo $logoWhite['url']; ?>" class="hidden-mobile">
					<img src="<?php echo $logoBlack['url']; ?>" class="hidden-desktop">
				  <?php } else{ ?>
					<?php echo $logoText; ?>
				  <?php } ?>
				</a>
			</div>
			<div class="col-sm-6 col-md-6 text-right">
				<a href="/new/travel-agent/"><div class="button-custom btn-purple">
					ДЛЯ АГЕНТОВ
				</div></a>
				<a href="/new/tourist/"><div class="button-custom btn-greens">
					ДЛЯ ТУРИСТОВ
				</div></a>
			</div>
			</div>
			<hr>
	   </div>-->
	   
        <div class="container clearfix">
			
        <div class="navbar-brand">
			<a href="<?php echo site_url(); ?>">
              <?php
                    $logoWhite = get_field('logo_white', 'options');
					$logoBlack = get_field('logo_black', 'options');
                    $logoText = get_field('logo_text', 'options');
                    if($logoWhite) {
              ?>
        		<img src="<?php echo $logoWhite['url']; ?>" class="hidden-mobile">
				<img src="<?php echo $logoBlack['url']; ?>" class="hidden-desktop">
			  <?php } else{ ?>
                <?php echo $logoText; ?>
              <?php } ?>
			</a>
        </div>
       <!-- <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>-->
        <ul class="language">
			<?php //pll_the_languages(array('show_flags'=>1,'show_names'=>0));?>
        </ul>
		<div class="navbar-right text-center">
				<a href="/travel-agent/" style="display:block;margin-bottom:6px;"><div class="button-custom btn-purple">
					ДЛЯ АГЕНТОВ
				</div></a>
				<a href="/tourist/" style="display:block;"><div class="button-custom btn-greens">
					ДЛЯ ТУРИСТОВ
				</div></a>
		</div>
        <div class="navbar-right">
        <?php
             main_menu();
        ?>
			<div class="text-center d-inline-block phone-header" style="margin-top:15px;">
				<div class="row">
					<div class="col-md-6" style="padding-top: 7px;">
						<i class="fa fa-phone"></i> +62 – 81 – 999 717 000
					</div>
					<div class="col-md-6">
						<!--<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
						COVID-19
					</button>-->
						<a href="/covid-19/"><button type="button" class="btn btn-sm btn-warning">COVID-19</button></a>
					</div>
				</div>
				
					
			</div>
			
        </div>
			
        </div>
            
    </nav>
</header>