
<section class="container">
        <h1>Contact</h1>
        <?php
        if (!empty($data->errors)) {
            foreach ($data->errors as $error) {
                echo $error;
            }
        }
        ?>
        <form method="POST" action="<?php echo URL ?>contact/message" data-parsley-validate>

            <p> Name: <br> <input type="text" 
                                      name="name" 
                                      id="name"  
                                      placeholder="Name" 
                                      value="<?php
                                  if (!empty($data->input->Name)) {
                                      echo Input::escape($data->input->Name);
                                  }
                                  ?>"/></p>

            <p> Email: <br> <input type="email" 
                                   name="email" 
                                   id="Email" 
                                   placeholder="Email" 
                                   value="<?php
                                   if (!empty($data->input->Email)) {
                                       echo Input::escape($data->input->Email);
                                   }
                                  ?>"/></p>
            
             <p> Message: <br> <input type="text" 
                                      name="Message" 
                                      id="Message"  
                                      placeholder="Message" 
                                      value="<?php
                                  if (!empty($data->input->Name)) {
                                      echo Input::escape($data->input->Name);
                                  }
                                  ?>"/></p>

            <p class="submit"><input type="submit" value="Send"></p>
        </form>
</section>
