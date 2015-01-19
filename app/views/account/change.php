<section class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <form action="<?php echo URL ?>update/password" method="post">

        <label for="password">New password</label>
        <input type="password" 
               name="password" 
               id="password" />

        <label for="check">New password check</label>
        <input type="password" 
               name="check" 
               id="check" />

        <input type="submit" value="Update" />
    </form>
</section>