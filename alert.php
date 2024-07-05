<?php
if ($update == true) {
  print "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong> Note!</strong> has been updated successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}
if ($delete == true) {
  print "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong> Note!</strong> has been deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}
if ($insert == true) {
  print "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong> Note!</strong> has been added successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}
if ($restore == true) {
  print "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong> Note!</strong> has been restore successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}
if ($error == true) {
  print "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong> Fill!</strong> proper details.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}
if ($history == true) {
  print "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong> History!</strong> has been deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}
?>