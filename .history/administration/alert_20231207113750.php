<?php 
if (isset($success_msg)) {
   foreach ($success_msg as $success_msg ) {
   echo '<script>swal("'.$success_msg.'","","succes");</script>';
   }
}
if (isset($warning_msg)) {
    foreach ($warning_msg as $warning_msg ) {
    echo '<script>swal("'.$warning_msg.'","","succes");</script>';
    }
 }
 if (isset($info_msg)) {
    foreach ($info_msg as $info_msg ) {
    echo '<script>swal("'.$info_msg.'","","succes");</script>';
    }
 }
 if (isset($warning_msg)) {
    foreach ($warning_msg as $warning_msg ) {
    echo '<script>swal("'.$warning_msg.'","","succes");</script>';
    }
 }
 
?>