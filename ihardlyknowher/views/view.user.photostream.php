<? if(isset($photos)): ?>
<div class="regular">
	<div class="title">
		<a href="<?= $userinfo['profileurl' ]?>"><?=
		(!empty($userinfo['realname']) ? $userinfo['realname'] . ' / ' :
		'') . $userinfo['username'] ?></a>
</div>
<div class="photos">
	<? foreach($photos as $photo): ?>
		<?
			$src = $photo->imageURLforSuffix();
			$width = 500;

			if($size === 'large') {
				if ($large = $photo->imageInfoForSize('Large')) {
					$src = $large['source'];
					$width = $large['width'];
					$height = $large['height'];
				} elseif ($orig = $photo->imageInfoForSize('Original')) {
					if($orig['width'] < 1280 && $orig['height'] < 1280) {
						$src = $orig['source'];
						$width = $orig['width'];
						$height = $orig['height'];
					}
				}
			}
		?>
		<div class="photo" id="photo_<?= $photo->id() ?>">
			<a class="photo" href="<?= $userinfo['photosurl'] . $photo->id() ?>/">
				<img src="<?= $src ?>" alt="<?= $photo->id() ?>">
			</a>
		</div>
		<? $height = false ?>
	<? endforeach ?>
	<div class="pagers">
		<a href="/" class="homelink">ihkh</a> / <a href="/<?= $userinfo['urlname' ]?>"><?= $userinfo['urlname' ]?></a>
		<? if ($page > 1): ?>
			<div class="left">
				<a href="/<?= $userinfo['urlname'] ?><?= $page == 2 ? '' : '/'.($page - 1) ?>" class="backlink">&larr; previous</a>
			</div>
		<? endif ?>
		<? if ($page != $pages): ?>
			<div class="right">
				<a href="/<?= $userinfo['urlname'] ?>/<?= $page + 1 ?>">next &rarr;</a>
			</div>
		<? endif ?>
	</div>
	<div class="footer">
		images &copy; <a href="<?= $userinfo['profileurl' ]?>"><?= !empty($userinfo['realname']) ? $userinfo['realname'] : $userinfo['username'] ?></a>
	</div>
</div>
<? if($background != 'white'): ?>
	<style>
		html, body { background: <?= $background ?>; }
		.photos .pagers, .photos .footer { color: #eee; }
		.photos .pagers a { color: #d0d0d0; }
		.photos .footer { color: #222; }
		.photos .footer a { color: #222; }
	</style>
<? endif ?>
<? else: ?>
<div class="regular">
	<p>That user does not exist or has no public photos.</p>
	<p><a href="/">&larr; return</a></p>
</div>
<? endif ?>
