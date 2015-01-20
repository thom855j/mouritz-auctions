<div class="page-wrapper">
    <?php
    $Username = USER_USERNAME;
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?>
    <p>Welcome <a href="<?php echo URL; ?>account/profile"><?php echo Input::escape($data->user->data()->$Username); ?></a>!</p>
    <p><a href = "<?php echo URL; ?>account/profile">profile</a></p>
    <?php if ($user->role('Admin')) { ?>
        <p><a href = "<?php echo URL; ?>controlpanel">Controlpanel</a></p>
        <?php
    }
    ?>
</div>