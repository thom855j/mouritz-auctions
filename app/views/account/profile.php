
<h2 class="heading">Username: <?php echo Input::escape($data->user->data()->$Username); ?></h2>
<p>Full name: <?php echo Input::escape($data->user->data()->$Firstname); ?>  <?php echo Input::escape($data->user->data()->$Lastname); ?></p>
<p>Email: <?php echo Input::escape($data->user->data()->$Email); ?> </p>
