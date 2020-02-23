<?php
require '../../include/init.php';
$id = $_GET['id'];
$user = Users::find_by_id($id);
$user->delete();
$session->message('<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Successfully deleted a user info.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
redirect_to('accounts.php');
