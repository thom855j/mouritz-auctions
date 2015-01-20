<?php

/**
 * Configuration for: TABLES
 * Theses tables must be configured for app to work, as they depend on 
 * specific models and classes
 */

// User table
define('USERS_TABLE', 'Users');
define('USER_ID', 'id');
define('USER_USERNAME', 'username');
define('USER_PASSWORD', 'password');
define('USER_EMAIL', 'email');
define('USER_NAME', 'name');
define('USER_FIRSTNAME', 'firstname');
define('USER_LASTNAME', 'lastname');
define('USER_ROLE', 'role_id');

// Roles table
define('ROLES_TABLE', 'Roles');
define('ROLE_ID', 'id');
define('ROLE_NAME', 'role');

// Comments table
define('COMMENTS_TABLE', 'Comments');
define('COMMENT_ID', 'id');
define('COMMENT_USER_ID', 'user_id');
define('COMMENT_AUCTION_ID', 'auction_id');

// Auctions table
define('AUCTIONS_TABLE', 'Auctions');
define('AUCTION_ID', 'id');
define('AUCTION_USER_ID', 'user_id');

// Images table
define('IMAGES_TABLE', 'Auction_Images');
define('IMAGE_ID', 'auction_id');

// Sessions table
define('SESSIONS_TABLE', 'Sessions');
define('SESSION_ID', 'id');
define('SESSION_HASH', 'hash');
define('SESSION_USER_ID', 'user_id');