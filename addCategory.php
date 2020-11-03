<?php
include '../login/header.php';
?>
<h1>Add Category</h1>

<form action="../categories/doAdd.php" method="post">
    Title: <input type="text" name="title"> <br>
    Description: <input type="text" name="description"> <br>
    <input type="hidden" name="id"> <br>
    <input type="submit">


</form>

</main></body><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>