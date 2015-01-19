<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PHP MVC skeleton</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- header -->
        <div class="container">
            <div class="navigation">
                <ul>
                    <!-- same like "home" or "home/index" -->
                    <li><a href="<?php echo URL; ?>">Home</a></li>
                    <li><a href="<?php echo URL; ?>account">Account</a></li>
                    <li><a href="<?php echo URL; ?>account/login">Login</a></li>
                    <li><a href="<?php echo URL; ?>account/register">Register</a></li>
                    <li><a href="<?php echo URL; ?>controlpanel">Controlpanel</a></li>
                    <?php
                    $user = $this->loadModel('UserModel');
                    if ($user->isLoggedIn()) {
                        ?>
                        <li><a href="<?php echo URL; ?>account/profile">Profile</a></li>
                        <li><a href="<?php echo URL; ?>account/settings">Settings</a></li>
                        <li><a href="<?php echo URL; ?>users/logout">Log out</a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
