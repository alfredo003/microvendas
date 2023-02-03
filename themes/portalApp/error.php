<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <?=$head;?>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link rel="shortcut icon" href="<?=theme("img/micro_icon.png")?>" type="image/x-icon">
   <link href="<?=theme("assets/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet" />
   <link href="<?=theme("assets/bootstrap/css/bootstrap-responsive.min.css")?>" rel="stylesheet" />
   <link href="<?=theme("assets/font-awesome/css/font-awesome.css")?>" rel="stylesheet" />
   <link href="<?=theme("css/style.css")?>" rel="stylesheet" />
   <link href="<?=theme("css/style-responsive.css")?>" rel="stylesheet" />
   <link href="<?=theme("css/style-default.css")?>" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-500">
    <div class="error-wrap">
        <h1><?= $error->title; ?></h1>
        <h2><?= $error->message; ?></h2>
        <div class="metro green">
           <span> 0</span>
        </div>
        <div class="metro yellow">
            <span> <?= $error->code; ?></span>
        </div>
        <div class="metro purple">
            <span> 0 </span>
        </div>
        <p>  <a title="<?= $error->linkTitle; ?>" href="<?= $error->link; ?>" class="btn error-btn-mg"><?= $error->linkTitle; ?></a></p>
    </div>
</body>
<!-- END BODY -->
</html>