<?php 
/**
 * Plugin Name:  Socialify Telegram
 * Description:  Login via Telegram
 * Plugin URI:   https://github.com/uptimizt/socialify
 * Author:       uptimizt
 * Author URI:   https://github.com/uptimizt
 * Text Domain:  socialify
 * Domain Path:  /languages/
 * GitHub Plugin URI: https://github.com/uptimizt/socialify
 * Requires PHP: 8.0
 * Version:      0.9.230416
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
*/

namespace Socialify;


add_action('init', function(){

    require_once __DIR__ . '/provider/Telegram.php';
    
});

