<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Layout CV</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="/MVCPHP/CV/MVC/public/css/css_layouts/pageLayout.css">        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-...." crossorigin="anonymous">
    </head>
    <body>

        <?php 
            require_once("./MVC/views/layouts/navbar.php");
        ?>

        <div id="right_space">
            <?php 
                require_once("./MVC/views/".$view.".php");
            ?>
        </div> 

    </body>
</html>