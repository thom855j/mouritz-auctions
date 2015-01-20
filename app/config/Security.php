<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//SECURITY

/**
 * Configuration for: Cookie 
 * This is the place where you define your database credentials, database type etc.
 */

define('COOKIE_NAME', 'Hash');
define('COOKIE_EXPIRY', 604800);

/**
 * Configuration for: Token and sessions
 * This is the place where you define your database credentials, database type etc.
 */
define('SESSION_NAME', 'User');
define('TOKEN_NAME', 'Token');

//Randoms
define('RANDOM_NAME', md5(mt_srand() . microtime()));