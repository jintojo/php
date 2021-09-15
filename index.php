<?php

use Src\Boot;
use Src\Engine\Dictionary\Dictionary;
use Src\Engine\Scrabble;

require_once 'Src/Boot.php';

$boot = new Boot();

$dictionary = new Dictionary($boot);

$scrabble = new Scrabble($dictionary);

//$rack = "hjkhkaseiwiq";
//$rack = "jinto";
if(isset($_POST['txtTitle']) and $_POST['txtTitle']!==""){
    $title = $_POST['txtTitle'];
    $title_array = (array)($scrabble->matchInDictionary($title));
}    
/**
 * Engine = $scrabble
 *
 * to run a match use the method matchInDictionary
 * this will return an array of words and scores
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Count | Jinto Jose</title>
    <style>
        .tags{
            width:auto !important;
            padding:8px 10px;
            margin: 20px 5px;
            border:1px solid #DEDEDE;
            float:left;
            display:inline-block;
        }
    </style>    
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-6 border ms-1">
                <form id="myForm" name="myForm" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                    <div class="col-12 p-3">Title</div>
                    <div class="col-12 p-3">
                        <input type="text" id="txtTitle" name="txtTitle" value="" />
                        <button type="submit" class="btn btn-primary mbutton" id="" type="button">Run</button>
                    </div>
                </form>
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div>
                    <?php 
                        if(isset($title_array) and is_array($title_array)>0){
                            foreach ($title_array as $key => $value) {
                    ?>
                            <div class="tags"><?php echo "$key - $value" ?></div>
                    <?php        
                            }
                        }
                    ?>    
                </div>
            </div>    
        </div> 
    </div>
</body>
</html>           