<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cache
 *
 * @author ThomasElvin
 */
class Cache {

    public static function run() {

    // define the path and name of cached file
    $cachefile = CACHE_FOLDER . date('M-d-Y'). '.php';
    // define how long we want to keep the file in seconds. I set mine to 5 hours.
    $cachetime = 18000;
    // Check if the cached file is still fresh. If it is, serve it up and exit.
    if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
        exit;
    }
    // if there is either no file OR the file to too old, render the page and capture the HTML.
    ob_start();
?>
    <html>
        output all your html here.
    </html>
<?php
    // We're done! Save the cached content to a file
    $fp = fopen($cachefile, 'w');
    fwrite($fp, ob_get_contents());
    fclose($fp);
    // finally send browser output
    ob_end_flush();

    }
}
