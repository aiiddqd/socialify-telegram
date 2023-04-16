<?php
header('Content-Type: text/html; charset=UTF-8');

?>
<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title>Telegram Login</title>
    </head>
	<body>
    <?php $adapter->authenticate(); ?>
    </body>
</html>
