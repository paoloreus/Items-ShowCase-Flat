<?php
include '../login/header.php';
if(isset($_GET['act'])){
    $cag = file('../../app/categories/categories.csv');
    $id = $_GET['id'];
    $cag_to_update = '';

    foreach($cag as $index => $cg){
        $fields = explode(',', $cg);
        if($fields[0] == $id){
         $cag_to_update = $fields;
        }
    }

    if(is_array($cag_to_update)) { ?>
        <form action="../categories/doUpdate.php" method="post">
        <h1>Update Category</h1>
        Title: <input type="text" name="title" value="<?php echo $cag_to_update[1]; ?>">
        Description: <input type="text" name="description" value="<?php echo $cag_to_update[2]; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $cag_to_update[0]; ?>"><br>
        <input type="submit">


    <?php } ?>
    </form>

    <?php if(is_array($cag_to_update) == false) { ?>
        <h1>Cannot find the car</h1>
    <?php }
}
?>
</main></body><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>