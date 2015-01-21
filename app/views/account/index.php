<?php
$Username = USER_USERNAME;
if (!empty($data->feedback)) {
    foreach ($data->feedback as $feedback) {
        echo $feedback;
    }
}
?>
<p>Welcome <a href="<?php echo URL; ?>account/profile"><?php echo Input::escape($data->user->data()->$Username); ?></a>!</p>
<p>Lorem ipsum dolor sit amet, egestas porta placerat quis lorem eu 
    faucibus. Et sociis morbi, nonummy dapibus convallis molestie arcu id,
    justo felis ultrices, eu ut minim dolor. Laoreet ante tempus ultrices,
    sit nascetur fermentum, neque eu vel cursus eleifend vivamus, id enim 
    et augue nulla. Vitae nunc id ac, sit risus etiam, sit malesuada 
    a risus justo vitae, volutpat etiam fermentum sed quis, volutpat 
    suscipit purus molestie. Nonummy porttitor nunc nisl, quam fames neque, 
    libero nec tellus ultricies nec</p>
