<?php
/**
 *
 * Twitter Bootstrap CakePHP Default Layout
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012 Trey Reynolds
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php
$cssFiles = array('bootstrap.min','bootstrap-responsive.min','fonts/fontawesome/font-awesome','main');
$jsFiles = array('vendor/jquery-1.8.3.min','vendor/bootstrap.min','plugins','main');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <meta name="description" content="">
    <meta name="author" content="hardik shah">
    <meta name="viewport" content="width=device-width">
    <!-- icons -->
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->meta(array('rel' => 'apple-touch-icon','href'=>$this->webroot.'theme/TwitterBootstrap/apple-touch-icon.png'));
    echo $this->Html->meta(array('rel' => 'apple-touch-icon','href'=>$this->webroot.'theme/TwitterBootstrap/apple-touch-icon-72x72-precomposed.png',  'sizes'=>'72x72'));
    echo $this->Html->meta(array('rel' => 'apple-touch-icon','href'=>$this->webroot.'theme/TwitterBootstrap/apple-touch-icon-114x114-precomposed.png',  'sizes'=>'114x114'));
    echo $this->Html->meta(array('rel' => 'apple-touch-icon','href'=>$this->webroot.'theme/TwitterBootstrap/apple-touch-icon-144x144-precomposed.png',  'sizes'=>'144x144'));
    ?>

    <?php
    echo $this->fetch('meta');
    if(configure::read('App.settings.asset.compression')=='1'){
        $this->Combinator->add_libs('css',$cssFiles);
        echo $this->Combinator->scripts('css');
    }else{
        echo $this->Html->css($cssFiles);
    }
    ?>
    <!--[if IE 7]>
    <?php
    echo $this->Html->css('fonts/fontawesome/font-awesome-ie7');
    ?>
    <![endif]-->
    <!--[if lt IE 9]>
    <?php
    echo $this->Html->css('pie-ie');
    ?>
    <![endif]-->
    <?php

    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <?php
    echo $this->Html->script('vendor/modernizr-2.6.2-respond-1.1.0.min');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <style>
body {
	padding-left: 20px;
	padding-top: 10px;
	padding-right: 20px;
}
</style>
    
</head>
<body>
	<header>
		<?php 
			echo $this->element('home/header'); 
		?>
	</header>

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	<footer>
		<?php 
			echo $this->element('home/footer');			
		?>
	</footer>


<?php echo $this->Html->script(array('libs/bootstrap/bootstrap.min','plugins','script')); ?>
<?php echo $this->fetch('script'); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo Configure::read('ga');?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>