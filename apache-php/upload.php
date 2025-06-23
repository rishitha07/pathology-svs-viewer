<?php
if ($_FILES['svsFile']['error'] === UPLOAD_ERR_OK) {
  $uploadDir = 'uploads/';
  $tmpName = $_FILES['svsFile']['tmp_name'];
  $name = basename($_FILES['svsFile']['name']);

  if (preg_match('/\.svs$/', $name)) {
    move_uploaded_file($tmpName, "$uploadDir/$name");
    echo "Upload success!";
  } else {
    echo "Invalid file type.";
  }
} else {
  echo "Upload error.";
}
?>
