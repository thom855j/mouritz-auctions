<?php

/**
 * Configuration for: TABLES
 * Theses tables must be configured for app to work, as they depend on 
 * specific models and classes
 */

// User table
define('USERS_TABLE', 'Users');
define('USER_ID', 'ID');
define('USER_NAME', 'Username');
define('USER_PASSWORD', 'Password');
define('USER_EMAIL', 'Email');
define('USER_SALT', 'Salt');
define('USER_FIRSTNAME', 'Firstname');
define('USER_LASTNAME', 'Lastname');
define('USER_ROLE', 'Role_ID');

// Roles table
define('ROLES_TABLE', 'Roles');
define('ROLE_ID', 'ID');
define('ROLE_NAME', 'Role');

// Comments table
define('COMMENTS_TABLE', 'Comments');
define('COMMENT_ID', 'id');
define('COMMENT_USER_ID', 'user_id');
define('COMMENT_AUCTION_ID', 'auction_id');

// Auctions table
define('AUCTIONS_TABLE', 'Auctions');
define('AUCTION_ID', 'id');
define('AUCTION_USER_ID', 'user_id');

// Sessions table
define('SESSIONS_TABLE', 'Sessions');
define('SESSION_ID', 'ID');
define('SESSION_HASH', 'Hash');
define('SESSION_USER_ID', 'User_ID');