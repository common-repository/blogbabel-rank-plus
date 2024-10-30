<?php
/*
Plugin Name: BlogBabel Rank Plus
Plugin URI: http://www.dreamsworld.it/emanuele/2007-07-23/wordpress-plugin-blogbabel-rank-plus/
Description: Visualizza il rank di BlogBabel sul tuo blog.
Version: 1.8.4
Author: Emanuele (aka P|xeL)
Author URI: http://www.dreamsworld.it/emanuele/
*/

/*
Per utilizzare questo plugin inserire nel proprio template la seguente stringa:
<?php if(function_exists(wp_blogbabelrankplus)) { wp_blogbabelrankplus("slug-url"); } ?>
Sostituire in "slug-url" il nome assegnato da BlogBabel nell'url delle statistiche per il vostro blog .
Ad esempio:
<?php if(function_exists(wp_blogbabelrankplus)) { wp_blogbabelrankplus("time-is-what-you-make-of-it"); } ?>
---
Per utilizzare la forma testuale, inserite sul vostro blog il seguente codice:
<?php wp_blogbabelrankplus_text("slug-url"); ?>
Sostituendo in "slug-url" il nome assegnato da BlogBabel nell'url delle statistiche per il vostro blog.
Ad esempio:
<?php wp_blogbabelrankplus_text("time-is-what-you-make-of-it"); ?>
Il risultato sara' un numero con un link verso la pagina del vostro rank su BlogBabel.
Tramite CSS e' possibile personalizzare graficamente il testo, usando le seguenti classi: "babel-green" e "babel-red".
Ad esempio, per visualizzare il risultato verde o rosso in base all'incremento o decremento di posizioni su BlogBabel, bastera' aggiungere il seguente codice al vostro foglio di stile:
.babel-green { color: #00FF00; }
.babel-red { color: #ff0000; }
---

Ringrazio Undolog (http://www.undolog.com/) per l'idea, Matteo (http://www.ilmatte81.eu/) per il paziente betatesting e neon (http://io.facciocose.it/) per i consigli sul codice.
Per rispetto del mio e del loro lavoro, vi sarei grato se i credits rimanessero intatti ;-)

Emanuele (aka P|xeL)
- http://www.dreamsworld.it/emanuele/ -
*/

@define("BB_API_URL", "http://it.blogbabel.com/api/v1/blog/");
@define("LINK_URL",		"http://it.blogbabel.com/classifica-blog/blog/");
@define('BLOG_URL',	get_bloginfo('url'));


function bbrp_getRank($blog) {
	$host = BB_API_URL.$blog.';f=txt';
	$contents = file_get_contents($host);
	if($contents != "") {
		$a = explode("rank: ",$contents);
		$b = explode("\n",$a[1]);
		$c = explode(" ",$b[1]);
	}
	return array("$b[0]","$c[1]");
}


function bbrp_createImage($pos,$blog) {
	$uploadpath = get_option('upload_path');
	if (!$saveFile) $saveFile = ABSPATH . $uploadpath . '/bbrplus.png';
	$im = @ImageCreate (80, 15)
		or die ('Cannot create a new GD image.');
	$white	= ImageColorAllocate ($im, 255,255,255);
	$grey		= ImageColorAllocate ($im, 51,51,51);
	$red		= ImageColorAllocate ($im, 255,0,0);
	$green	= ImageColorAllocate ($im,0,153,0);
	$back_color = $grey; # colore contorno
	$box_color_right = $red;
	if ($pos[1] >= 0 ) { $box_color_right = $green; } # colore sfondo testo BlogBabel
	$text_color = $white; # colore testo
	$r = $pos[0];
	imagefill($im, 0, 0, $back_color);
	imagefilledrectangle($im,1,1,78,13,$box_color);
	imagefilledrectangle($im,30,2,77,12,$box_color_right);
	imagerectangle($im,2,2,28,12,$box_color_right);
	imagestring($im, 0, 33, 4, "BLOGBABEL", $text_color);
	imagestring($im, 0, 6, 4, $pos[0], $back_color);
	ImagePNG ($im,$saveFile);
	echo '<a href="'.LINK_URL.$blog.'/" target="_blank"><img src="'.BLOG_URL.'/'. $uploadpath .'/bbrplus.png" alt="BlogBabel Rank Plus - Realizzato da Emanuele aka P|xeL - http://www.dreamsworld.it/emanuele/" height="15" width="80" /></a>';
}

function bbrp_blobabelrank_text($blog) {
	$rank = bbrp_getRank($blog);
	if ($rank[1] >= 0) {
		echo '<a class="babel-green" href="'.LINK_URL.$blog.'/" title="BlogBabel Rank" target="_blank">' . $rank[0] . '</a>';
	} else {
		echo '<a class="babel-red" href="'.LINK_URL. $blog.'/" title="BlogBabel Rank" target="_blank">' . $rank[0] . '</a>';
	}
}

function wp_blogbabelrank_text($blog) {
	$uploadpath = get_option('upload_path');
	$saveFile = ABSPATH . $uploadpath . '/bbrplus.txt';
	if (!file_exists($saveFile) || (filemtime($saveFile) < time() - 64800 && gmstrftime("%H", time()) <= 21 && gmstrftime("%H", time()) >= 02 )) {
		ob_start();
		bbrp_blobabelrank_text($blog);
		$file = fopen($saveFile, 'w');
		fwrite($file, ob_get_contents());
		fclose($file);
		chmod($saveFile, 0644);
		ob_end_flush();
	} else {
		include($saveFile);
	}
}

function wp_blogbabelrankplus($blog){
	$uploadpath = get_option('upload_path');
	if (!$saveFile) $saveFile = ABSPATH . $uploadpath . '/bbrplus.png';
	if (!file_exists($saveFile) || (filemtime($saveFile) < time() - 64800 && gmstrftime("%H", time()) <= 21 && gmstrftime("%H", time()) >= 02 )) {
		$rank = bbrp_getRank($blog);
		bbrp_createImage($rank,$blog);
	}
	else {
		echo '<a href="'.LINK_URL.$blog.'/" target="_blank"><img src="'.BLOG_URL.'/'. $uploadpath .'/bbrplus.png" alt="BlogBabel Rank Plus - Realizzato da Emanuele aka P|xeL - http://www.dreamsworld.it/emanuele/" height="15" width="80" /></a>';
	}	
}
?>