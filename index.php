<?php 

if( ! empty($_POST)) 
{
    print_r($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form action="" method="post">
    <?php for($x=1;$x<4;$x++){ ?>
    <div class='m-3'>
        
        <input class='seo form-control' type="text"  id="search-<?=$x?>" >
        
        <input type="hidden" id="inputsearch-<?=$x?>" name="search-<?=$x?>">

    </div>
    <?php } ?>
    <button class='btn btn-primary ml-3 btn-sm' type="submit">Submit</button>
    </form>

</body>
<script src="./js/jquery.js"></script>
<script src="./js/typeahead.jquery.min.js"></script>
<script src="./js/bloodhound.min.js"></script>
<script src="./js/search.js"></script>
</html>