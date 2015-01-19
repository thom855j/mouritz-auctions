<div class="container">
    <?php
    $Username = USER_USERNAME;
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <p>Hello admin <a href="<?php echo URL; ?>account/profile"><?php echo Input::escape($data->user->data()->$Username); ?></a>!</p>

    <ul>
        <li><a href = "<?php echo URL; ?>controlpanel/users">Users</a></li>
        <li><a href = "<?php echo URL; ?>controlpanel/comments">Comments</a></li>
    </ul>
</div>