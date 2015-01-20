<?php

/**
 * Description of delete
 *
 * @author ThomasElvin
 */
class Delete {

    public function index() {
        if (Input::exists()) {
            
        }
        Redirect::to(URL . 'error/404');
    }

    public function comment($ID) {
        if (Input::exists()) {
            $model = $this->loadModel('CommentModel');

            $model->delete($ID);

            Session::flash('errors', '<p style="color: green;">Comment removed successfully!</p>');
            Redirect::to(URL . 'controlpanel/comments');
        } else {
            require_once TEMPLATES . 'backend/header.php';
            ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
                <p>Are you sure you want to delete comment <?php echo $ID; ?>?</p>
                <form method="post" action=""> 
                    <input class="btn btn-danger" type="submit" name="submit" value="Yes"> 
                </form> 
                <a class="btn btn-success" href="<?php echo URL; ?>controlpanel/comments">Nej</a> 
            </div>
            <?php
            require_once TEMPLATES . 'backend/footer.php';
        }
        Redirect::to(URL . 'error/404');
    }

    public function user($ID) {
        if (Input::exists()) {
            $model = $this->loadModel('UserModel');

            $model->delete($ID);

            Session::flash('errors', '<p style="color: green;">Comment removed successfully!</p>');
            Redirect::to(URL . 'controlpanel/users');
        } else {
            require_once TEMPLATES . 'backend/header.php';
            ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
                <p>Are you sure you want to delete this user <?php echo $ID; ?>?</p>
                <form method="post" action=""> 
                    <input class="btn btn-danger" type="submit" name="submit" value="Yes"> 
                </form> 
                <a class="btn btn-success" href="<?php echo URL; ?>controlpanel/users">Nej</a> 
            </div>
            <?php
            require_once TEMPLATES . 'backend/footer.php';            
        }
        Redirect::to(URL . 'error/404');
    }

}
