<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="{$lang}" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="{$lang}" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="{$lang}" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="{$lang}" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="{$lang}" class="no-js"> <!--<![endif]-->
<head>
	<link rel="stylesheet" type="text/css" href="public/{$dpath}/css/login/main.css?v={$REV}">
	<link rel="stylesheet" type="text/css" href="public/{$dpath}/css/base/jquery.fancybox.css?v={$REV}">
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
	<title>{block name="title"} - {$gameName}{/block}</title>
	<meta name="generator" content="Antarium {$VERSION}">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<!--[if lt IE 9]>
	<script src="scripts/base/html5.js"></script>
	<![endif]-->
	<script src="public/{$dpath}/js/base/jquery.js?v={$REV}"></script>
	<script src="public/{$dpath}/js/base/jquery.cookie.js?v={$REV}"></script>
	<script src="public/{$dpath}/js/base/jquery.fancybox.js?v={$REV}"></script>
	<script src="public/{$dpath}/js/login/main.js"></script>
	<script>{if isset($code)}var loginError = {$code|json};{/if}</script>
	{block name="script"}{/block}	
</head>
<body id="{$smarty.get.page|htmlspecialchars|default:'overview'}" class="{$bodyclass}">
	<div id="page">