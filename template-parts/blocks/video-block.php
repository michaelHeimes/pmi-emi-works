<?php
if ( have_rows('video_gallery') ){
$videonum = 0;
echo '<div class="video-block grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3 large-up-4 align-center">';
	while ( have_rows('video_gallery') ) { the_row();
	echo '<div class="video-block-item cell">';
		$video = get_sub_field('video');
		$video_title = get_sub_field('video_title');
		$video_url = get_sub_field('video_url');
		$video_thumbnail = get_sub_field('video_thumbnail');
		$thumb_url = "";
		if ($video == "Link") {
			if( $video_url) {
				parse_str( parse_url( $video_url, PHP_URL_QUERY ), $video_key );
				if ($video_key['v']) {
					$thumb_url = 'https://img.youtube.com/vi/' . $video_key['v'] . '/hqdefault.jpg';
				}
			}
		}

		if ($video_thumbnail) {
			$thumb_url = $video_thumbnail['url'];
		}
		
		if ($video == "Link") {
		
	?>
	<a href="<?php echo $video_url; ?>" title="<?php echo $video_title; ?>" class="thumb thumb-video">
		<div class="img-wrap has-object-fit">
			<img src="<?php echo $thumb_url; ?>" class="img-fill" />
		</div>
		<h3 class="video-title h5"><?php echo $video_title;?></h3>
	</a>

	<?php 
	}
	if ($video == "File") {
	$video_url = "#videopopup" . $videonum;
	?>

	<a href="<?php echo $video_url; ?>" title="<?php echo $video_title; ?>" class="thumb thumb-video mfp-inline">
		<div class="img-wrap has-object-fit">
			<img src="<?php echo $thumb_url; ?>" class="img-fill" />
		</div>
		<?php if($video_title):?>
			<h3 class="video-title h5"><?php echo $video_title;?></h3>
		<?php endif;?>
	</a>

	<?php 
	$video_file = get_sub_field('video_file');
	if ($video_file) {
		echo '<div id="videopopup' . $videonum . '" class="inline-popup mfp-hide">';
		echo '<video class="videoslide" controls>
			<source src="' . $video_file['url'] . '" type="video/mp4">
			Your browser does not support the video tag.
			</video>';
			echo '<div class="videopopuptitle">' . $video_title . '</div>';
		echo '</div>';
	}
	$videonum++;
	}
	/*
	if(!empty($video_file)){ ?>
		<a data-you-tube-click-to-play="false" style="background-image: url('https://img.youtube.com/vi/<?php echo $video_file['url']; ?>/hqdefault.jpg'); background-size:cover;" href="#test-popup" title="you-tube video"  type="text/html" data-youtube="<?php echo $video_file['url']; ?>" class="thumb thumb-video thumbinline mfp-inline"></a>
		<div id="test-popup" class="white-popup mfp-hide">
		  Popup content
		</div>
		<?php }
	*/
	
	
	
	echo '</div>';
	}

?>

<?php
echo "</div>";
}

?>