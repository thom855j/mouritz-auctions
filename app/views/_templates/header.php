<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            <?php
            $url = rtrim($_GET['url'], '/');
            echo $url;
            ?>
            | Mouritz Auktioner
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- header -->
        <div class="page-wrapper">

            <div id="nav-wrapper" class="nav-wrapper">
                <nav class="mainNav">
                    <ul class="nav">
                        <?php
                        $user = $this->loadModel('UserModel');
                        if (!$user->isLoggedIn()) {
                            ?>
                            <li class="navItem"><a href="<?php echo URL; ?>home">Home</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>about">About</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account">Account</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>login">Login</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>register">Register</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account/logout">Log out</a></li>
                        <?php } ?>
                        <?php
                        $user = $this->loadModel('UserModel');
                        if ($user->isLoggedIn()) {
                            ?>
                            <li class="navItem"><a href="<?php echo URL; ?>home">Home</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>about">About</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account">Account</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>controlpanel">Controlpanel</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account/profile">Profile</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account/settings">Settings</a></li>
                            <li class="navItem"><a href="<?php echo URL; ?>account/logout">Log out</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>

        </div>
