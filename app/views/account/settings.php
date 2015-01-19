<section class="container">
    <?php
    $Username = USER_USERNAME;
    $Firstname = USER_FIRSTNAME;
    $Lastname = USER_LASTNAME;
    $Email = USER_EMAIL;

    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>
    <form action="<?php echo URL ?>update/profile" method="POST">

        <label for="Firstname">Firstname</label>
        <input type="text" 
               name="firstname" 
               id="Firstname" 
               value="<?php echo Input::escape($data->user->data()->$Firstname); ?>" />

        <label for="Lastname">Lastname</label>
        <input type="text" 
               name="lastname" 
               id="Lastname" 
               value="<?php echo Input::escape($data->user->data()->$Lastname); ?>" />

        <label for="Email">Email</label>
        <input type="email" 
               name="email" 
               id="Email" 
               value="<?php echo Input::escape($data->user->data()->$Email); ?>" />


        <input type="submit" value="Update" />
    </form>
</section>