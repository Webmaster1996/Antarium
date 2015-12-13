<?php

/**
 * Projet : Antarium
 * Copyright (C) 2015 Danter14
 *
 * Ce projet est totalement en open source il peux donc être
 * modifier et redistribuer gratuitement.
 *
 * @package Antarium
 * @author Danter14
 * @copyright 2015 Danter14
 * @license GNU GENERAL PUBLIC LICENSE
 * @version 1.0 (12/12/2015)
 * @info Fichier: class.Theme.php
 */
 
class Theme
{
	static public $Themes;
	private $THEMESETTINGS;
	
	function __construct()
	{	
		$this->skininfo = array();
		$this->skin		= isset($_SESSION['dpath']) ? $_SESSION['dpath'] : DEFAULT_THEME;
		$this->setUserTheme($this->skin);
	}
	
	function isHome() {
		$this->template		= ROOT_PATH.'public/home/';
		$this->customtpls	= array();
	}
	
	function setUserTheme($Theme) {
		if(!file_exists(ROOT_PATH.'public/'.$Theme.'/configTheme/style.cfg'))
			return false;
			
		$this->skin		= $Theme;
		$this->parseStyleCFG();
		$this->setStyleSettings();
	}
		
	function getTheme() {
		return './public/'.$this->skin.'/';
	}
	
	function getThemeName() {
		return $this->skin;
	}
	
	function getTemplatePath() {
		return ROOT_PATH.'/public/'.$this->skin.'/templates/';
	}
		
	function isCustomTPL($tpl) {
		if(!isset($this->customtpls))
			return false;
			
		return in_array($tpl, $this->customtpls);
	}
	
	function parseStyleCFG() {
		require(ROOT_PATH.'public/'.$this->skin.'/configTheme/style.cfg');
		$this->skininfo		= $Skin;
		$this->customtpls	= (array) $Skin['templates'];	
	}
	
	function setStyleSettings() {
		if(file_exists(ROOT_PATH.'public/'.$this->skin.'/configTheme/settings.cfg')) {
			require(ROOT_PATH.'public/'.$this->skin.'/configTheme/settings.cfg');
		}
		
		$this->THEMESETTINGS	= array_merge(array(
			'PLANET_ROWS_ON_OVERVIEW' => 2,
			'SHORTCUT_ROWS_ON_FLEET1' => 2,
			'COLONY_ROWS_ON_FLEET1' => 2,
			'ACS_ROWS_ON_FLEET1' => 1,
			'TOPNAV_SHORTLY_NUMBER' => 0,
		), $THEMESETTINGS);
	}
	
	function getStyleSettings() {
		return $this->THEMESETTINGS;
	}
	
	static function getAvalibleSkins() {
		if(!isset(self::$Themes))
		{
			if(file_exists(ROOT_PATH.'cache/cache.themes.php'))
			{
				self::$Themes	= unserialize(file_get_contents(ROOT_PATH.'cache/cache.themes.php'));
			} else {
				$Skins	= array_diff(scandir(ROOT_PATH.'public/'), array('..', '.', '.svn', '.htaccess', 'index.htm'));
				$Themes	= array();
				foreach($Skins as $Theme) {
					if(!file_exists(ROOT_PATH.'public/'.$Theme.'/configTheme/style.cfg'))
						continue;
						
					require(ROOT_PATH.'public/'.$Theme.'/configTheme/style.cfg');
					$Themes[$Theme]	= $Skin['name'];
				}
				file_put_contents(ROOT_PATH.'cache/cache.themes.php', serialize($Themes));
				self::$Themes	= $Themes;
			}
		}
		return self::$Themes;
	}
}
