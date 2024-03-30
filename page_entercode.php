<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       #body{
        display: block;
       }
       #content {
        margin: 5% 0px;
        display:flex;
        justify-content: center;
       }
       
        
    </style>
</head>
<body id="body">
    <div id="header">
        <?php
        
        include 'header.php';
        ?>
    </div>

    <div id="content">
        <?php
        include 'enter_encode.php';
        ?>
    </div>
    <div id ="footer">
        <?php
        include 'footer.php';
        ?>
    </div>
</body>
<style>
   
</style>
</html>