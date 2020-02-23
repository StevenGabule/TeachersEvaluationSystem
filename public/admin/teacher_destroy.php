<?php
require '../../include/init.php';
$id = $_GET['id'];
$teacher = Teacher::find_by_id($id);
$teacher->delete();
$session->message('<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Successfully deleted a teacher info.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
redirect_to('teachers.php');
