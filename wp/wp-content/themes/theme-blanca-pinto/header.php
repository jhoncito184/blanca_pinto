<?php
	$logo = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $logo , 'full' );
	$image_url = $image[0];
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BLANCA PINTO | WEB</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- Theme color (Only Chrome Mobile)-->
	<meta name="theme-color" content="#db5945">
	<!-- Facebook meta tags-->
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:type" content="BLANCA PINTO | WEB">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<!--Favicon-->
	
	<!--Canonical-->
	<link rel="canonical" href="http://localhost">
	<?php wp_head(); ?>

</head>
<body>