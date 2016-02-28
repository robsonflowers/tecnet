<?php 
include_once('app/default.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR" xmlns:og="http://opengraphprotocol.org/schema/">
    <head>
        <link rel="icon" href="<?php echo BASE_URL; ?>files/images/icons/favicon.png" size="16x16">
        <meta name="robots" content="index, follow"/>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="author" content="Robson Flores"/>
        
        <title><?php echo $title;?></title>
        
        <link href="<?php echo BASE_URL; ?>files/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/css/botoes.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/bootstrap-datepicker-1.5.0-dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>files/bootstrap-datepicker-1.5.0-dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css"/>
        
        
        <script src="<?php echo BASE_URL; ?>files/js/jquery.js"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap-datepicker-1.5.0-dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap-select-1.9.4/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>files/js/jquery.maskedinput.js"></script>
        <script src="<?php echo BASE_URL; ?>files/bootstrap-checkbox-master/js/bootstrap-checkbox.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>files/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js"></script>
        <script src="<?php echo BASE_URL; ?>files/js/functions.js"></script>
        <script src="<?php echo BASE_URL; ?>files/js/ajax.js"></script>
        
    </head>
    <body>
        <?php include_once('app/components/navbar.php');?>
        <div class="container-fluid">
            <?php include_once('app/components/sidebar.php');?>
            <div class="row">
                <div role="main" class="main">
                    <h2 class="sub-header text-left"><!--Section title--></h2>
                    <?php include_once(BASE_PATH . 'pages/' . $page . '.php');?>
                </div>
            </div>
           
        </div>
                
    </body>
</html>
