<div class="container">
    <?php
    if (!empty($data->errors)) {
        foreach ($data->errors as $error) {
            echo $error;
        }
    }
    ?>

    <div class="grid grid-pad">
    <div class="col-3-12">
        <div class="content">
            <h3 class="heading">Settings</h3>
            <ul class="noLi">
                <li><a href="<?php echo URL; ?>account/settings">Settings</a></li>
                <li><a href="<?php echo URL; ?>account/change" >Change Password</a></li>
            </ul>
        </div>
    </div>

    <div class="col-9-12">
        <div class="content">
        <h2 class="heading">Change Password</h2>
                <form action="<?php echo URL ?>update/password" method="post">

        <label for="password">New password</label>
        <input type="password" 
               name="password" 
               id="password" />
    <br><br>
        <label for="check">New password check</label>
        <input type="password" 
               name="check" 
               id="check" />
    <br><br>
        <input type="submit" value="Update" />
    </form>
        </div>
    </div>
</div>

</div>