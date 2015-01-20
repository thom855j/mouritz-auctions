<div class="container">

    <p>Welcome <a href="<?php echo URL; ?>account/profile"><?php echo Input::escape($data->user->data()->username); ?></a>!</p>
    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?>
    <?php if ($user->role('Admin')) { ?>
        <p><a href = "<?php echo URL; ?>controlpanel">CONTROLPANEL</a></p>
        <?php
    }
    ?>
    <p><a href="<?php echo URL; ?>account/profile">Profile</a><p>
    <p><a href="<?php echo URL; ?>account/my-auctions">My Auctions</a><p>

</div>