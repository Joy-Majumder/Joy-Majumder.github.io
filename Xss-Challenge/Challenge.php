<html><head><title>XSS Challenge</title></head><body>

<?php

$payload = strtoupper($_GET['payload']);

if (strlen($payload)>17) {
    echo "Too long. 17 characters max.";
} else {
?>

<script type='text/javascript'>hakluke('test=<?php echo strtoupper($_GET['payload']) ?>');</script>

<?php } ?>

</body></html>
