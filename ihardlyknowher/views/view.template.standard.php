<!doctype html>
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<title><?= $title ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/reset.css">
<link rel="stylesheet" type="text/css" href="/ihkh.css">
<? foreach($css as $src): ?>
<link rel="stylesheet" type="text/css" href="/<?= $src ?>.css">
<? endforeach ?>
<?= $content ?>
<? foreach($js as $src): ?>
<script src="/<?= $src ?>.js"></script>
<? endforeach ?>
