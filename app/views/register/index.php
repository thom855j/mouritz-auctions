<div class="page-wrapper" >

    <div class="login-wrap">
     <?php
    if (!empty($data->feedback)) {
        foreach ($data->feedback as $feedback) {
            echo $feedback;
        }
    }
    ?>
    <div class="heading">
        <h2>Register</h2>
    </div>

    <form class="form-signin" role="form" method="post" action="<?php echo URL; ?>register/verify" data-parsley-validate>
        <input type="text" name="username"  class="form-control" placeholder="Brugernavn" required="" autofocus="">
        <input type="password" name="password"  class="form-control" placeholder="Adgangskode" required="">
        
        <input class="btn-log" type="submit" name="submit" value="Register"><br>
        <a href="<?php echo URL; ?>login">Login</a><br>
        <a href="<?php echo URL; ?>home">Back</a><br>
    </form>
    <div> <!-- /login-wrap -->
</div> <!-- /container -->
