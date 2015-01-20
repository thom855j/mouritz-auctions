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
            ?>
            <div> 
                <p>Are you sure you want to delete comment <?php echo $ID; ?>?</p>
                <form method="post" action=""> 
                    <input type="submit" name="submit" value="Yes"> 
                </form> 
                <a href="<?php echo URL; ?>controlpanel/comments">Nej</a> 
            </div>
            <?php
        }
        Redirect::to(URL . 'error/404');
    }

    public function user($ID) {
        if (Input::exists()) {
            $model = $this->loadModel('UserModel');

            $model->delete($ID);

            Session::flash('errors', '<p style="color: green;">User removed successfully!</p>');
            Redirect::to(URL . 'controlpanel/users');
        } else {
            ?>
            <div> 
                <p>Are you sure you want to delete this user <?php echo $ID; ?>?</p>
                <form method="post" action=""> 
                    <input type="submit" name="submit" value="Yes"> 
                </form> 
                <a href="<?php echo URL; ?>controlpanel/users">Nej</a> 
            </div>
            <?php
        }
        Redirect::to(URL . 'error/404');
    }

    public function image($ID) {
        if (Input::exists()) {
            $model = $this->loadModel('ImageModel');

            $model->delete($ID);

            Session::flash('errors', '<p style="color: green;">Image removed successfully!</p>');
            Redirect::to(URL . 'account/auctions');
        } else {
            ?>
            <div> 
                <p>Are you sure you want to delete this user <?php echo $ID; ?>?</p>
                <form method="post" action=""> 
                    <input type="submit" name="submit" value="Yes"> 
                </form> 
                <a href="<?php echo URL; ?>account/auctions">Nej</a> 
            </div>
            <?php
        }
        Redirect::to(URL . 'error/404');
    }

    public function auction($ID){
        if(Input::exists()){
            $model = $this->loadModel('AuctionModel');
            
            $model->delete($ID);
            
            Session::flash('errors', '<p style="color: green;">Auction removed successfully!</p>');
            Redirect::to(URL . 'account/user');
        } else {
            ?>
            <div> 
                <p>Are you sure you want to delete this user <?php echo $ID; ?>?</p>
                <form method="post" action=""> 
                    <input type="submit" name="submit" value="Yes"> 
                </form> 
                <a href="<?php echo URL; ?>account/auctions">Nej</a> 
            </div>
            <?php
        }
        Redirect::to(URL . 'error/404');
    }
}
