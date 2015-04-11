<?php
/**
 * Search Form
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */
?>

<form method="get"  id="searchform" class="navbar-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="text" class="search-query input-medium" name="s" placeholder="<?php esc_attr_e( 'search term', 'cyberchimps' ); ?>" />
</form>
<div class="clear"></div>