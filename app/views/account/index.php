<div class="container">
    
    <p>Hello <a href="<?php echo URL; ?>account/profile"><?php echo Input::escape($data->user->data()->username); ?></a>!</p>
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
</div>