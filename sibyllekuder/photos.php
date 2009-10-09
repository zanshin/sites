<?php
require_once('includes/simplepie.inc');
$feed = new Simplepie('http://api.flickr.com/services/feeds/photoset.gne?set=72157614491723890&nsid=19985007@N00&lang=en-us&format=atom');
$feed->handle_content_type();

function image_from_description($data) {
    preg_match_all('/<img src="([^"]*)"([^>]*)>/i', $data, $matches);
    return $matches[1][0];
}

function select_image($img, $size) {
    $img = explode('/', $img);
    $filename = array_pop($img);
    
    $s = array(
        '_s.', // square
        '_t.', // thumb
        '_m.', // small
        '.',   // medium
        '_b.'  // large
    );
    
    $img[] = preg_replace('/(_(s|t|m|b))?\./i', $s[$size], $filename);
    return implode('/', $img);
}
?>
<!DOCTYPE html PUBLIC
	"-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Elfenbein Klaviermusik - Piano Instruction for the Dedicated Student</title>
	<meta name="keywords" content="piano, piano teaching, piano instruction, private piano instruction, piano performance, Manhattan, Junction City, Wamego, Riley, Ogden" />
	<meta name="description" content="Private piano studio in Manhattan Kansas for dedicated students of all ages." />
	<meta name="author" content="sibylle kuder" />
	<meta name="copyright" content="Copyright 2007-2009 Sibylle Kuder" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="revisit-after" content="3 days" />
	<meta name="robots" content="all" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/ico" />
	
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="thickbox.css" /> 

	<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
	<script type="text/javascript" src="js/thickbox-compressed.js"></script>
<!--	<script type="text/javascript" src="js/script.js"></script> -->
	<script src="/mint/?js" type="text/javascript"></script>

</head>

<body>
    <div id="container">
		<div id="header">
			<?php include("header.php")?>
		</div>

		<div id="navcontainer">
			<?php include("navigation.php")?>
		</div>
		<div id="content">
			<h1>Photographs from the Studio, travels, and elsewhere.</h1>
			<div id="album-wrapper">
	            <?php foreach ($feed->get_items() as $item): ?>
	                <div id="photo">
	                    <?php
	                        if ($enclosure = $item->get_enclosure()) {
	                            // echo '<h2>' . $enclosure->get_title() . '</h2>'."\n";
	                            $img = image_from_description($item->get_description());
								
	                            $full_url = select_image($img, 4);
	                            $thumb_url = select_image($img, 0);
								$not_available = "http://l.yimg.com/g/images/photo_unavailable.gif";
								
								// make sure the full size image exists
								$timeout = 2;
								$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL, $full_url);			// set the URL we are interested in
								curl_setopt($ch, CURLOPT_HEADER, 1);  				// bring back the HEADER
								curl_setopt($ch, CURLOPT_NOBODY, 1);				// and just the HEADER please
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        // don't show results in browswer
								curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // time out after the value set above
								$output = curl_exec($ch);
								curl_close($ch);
								// test the result
								if (strpos($output,$not_available) > 0) {
									$full_url = select_image($img, 3);
								}
	                            echo '<a href="' . $full_url . '" class="thickbox" title="' . $enclosure->get_title() . '">
									  <img id="photo_' . $i . '" src="' . $thumb_url . '" /></a>'."\n";
	                        }
	                    ?>
						<p><small><?php echo $item->get_title(); ?></small></p>
						<!--
	                    <p><small><?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
					-->
	                </div>
	            <?php endforeach; ?>
			</div>
			<br /><br />
			<div id="navfooter">
				<?php include("navigation.php")?>
			</div>
        </div>
		<div id="footer">
			<?php include("footer.php")?>
		</div>
		</div>
		<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
		</script>
		<script type="text/javascript">
			_uacct = "UA-373283-1";


			urchinTracker();
		</script>
    </div>
</body>
