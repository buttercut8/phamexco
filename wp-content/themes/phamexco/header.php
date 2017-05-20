<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/images/favicon.png" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700&amp;subset=vietnamese" rel="stylesheet">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<meta property="og:url"           content="https://phamexco.vn/" />
 	<meta property="og:type"          content="website" />
 	<meta property="og:title"         content="Công Ty TNHH Phamexco" />
 	<meta property="og:description"   content="Phamexco is a general exporter based in Ho Chi Minh city, Vietnam. The main business is in processing, adding special value and exporting ingredients for food industry and raw materials constituting the principal input for industrial productions." />
 	<meta property="og:image"         content="https://phamexco.vn/wp-content/uploads/2017/04/logo-2-01.png" />
	<script type="text/javascript">
		var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
		document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
		function url(){
			return '<?php echo get_template_directory_uri(); ?>';
		}
	</script>
	<?php wp_head() ?>
</head>
