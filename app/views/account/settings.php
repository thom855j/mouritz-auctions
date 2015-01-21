    <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?>
        <h2 class="heading">Profile</h2>
        <form action="<?php echo URL ?>update/profile" method="POST">

            <label for="Firstname">Firstname</label>
            <input type="text" 
                   name="firstname" 
                   id="Firstname" 
                   value="<?php echo Input::escape($data->user->data()->$Firstname); ?>" />
            <br><br>
            <label for="Lastname">Lastname</label>
            <input type="text" 
                   name="lastname" 
                   id="Lastname" 
                   value="<?php echo Input::escape($data->user->data()->$Lastname); ?>" />
            <br><br>
            <label for="Email">Email</label>
            <input type="text" 
                   name="email" 
                   id="Email" 
                   value="<?php echo Input::escape($data->user->data()->$Email); ?>" />
            <br><br>

            <input class="btn btn-success" type="submit" value="Update" />
        </form>
        <br><br>
        <h2 class="heading">Password</h2>
        <form action="<?php echo URL ?>update/password" method="post">
            <label for="password">Current password</label>
            <input type="password" 
                   name="old" 
                   id="password" />
            <br><br>
            <label for="password">New password</label>
            <input type="password" 
                   name="new" 
                   id="password" />
            <br><br>
            <label for="check">New password again</label>
            <input type="password" 
                   name="check" 
                   id="check" />
            <br><br>
            <input type="submit" value="Update" />
        </form>

