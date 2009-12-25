<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lt IE 7]><style type="text/css">
.sidebars li {display:inline-block;padding-top:1px;}
</style><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div class="wrapper">

    <div class="header"><!--alternate-header-nav-
    <ul class="topnav">  
        <li><a href="<//?php echo get_settings('home'); ?>">Home</a></li>
        <//?php wp_list_pages('title_li=&depth=1'); ?>
    </ul>-->
    <div class="blogname"><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name');?></a></div>
    <div class="tagline">
        <?php bloginfo('description'); ?>
    </div>
    <div class="searchline">
        <div class="alignright">
            <form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="s" id="s" size="25" />
                <input name="submit" type="submit" value="Search" />
            </form>
            &nbsp;
         </div>
    </div>
    
    <ul class="nav clr">
        <?php wp_list_pages('title_li=&depth=1'); ?>
        <!-- removed 10.10.2009
        <li class="searchbox"><form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>"><input type="text" name="s" id="s" size="25" /><input name="submit" type="submit" value="Search" /></form></li> -->
    </ul> 
    </div>