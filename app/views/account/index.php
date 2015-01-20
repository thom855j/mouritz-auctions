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

</div>