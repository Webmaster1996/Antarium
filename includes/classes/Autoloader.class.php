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
 * @version 1.0 (11/12/2015)
 * @info Fichier: Autoloader.class.php
 */

class Autoloader
{
    /**
     * Rapporter les class pour le bon fonctionnement de l'application
     **/
    public static function applicationAutoload()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function applicationAutoloadConnect()
    {
        spl_autoload_register([__CLASS__, 'connect']);
    }

    public static function applicationAutoloadJeux()
    {
        spl_autoload_register([__CLASS__, 'jeux']);
    }

    public static function autoload($class)
    {
        if(file_exists("./includes/classes/" . ucfirst($class) . ".class.php")) {
            require "./includes/classes/" . ucfirst($class) . ".class.php";
        }

        if(file_exists("./includes/classes/class." . ucfirst($class) . ".php")) {
            require "./includes/classes/class." . ucfirst($class) . ".php";
        }

    }

    public static function connect($class)
    {
    	global $LNG;

        if(file_exists("includes/pages/login/" . ucfirst($class) . ".class.php")) {
            require "includes/pages/login/" . ucfirst($class) . ".class.php";
        }

		else if(!file_exists($class) && DEBUG_CLASS == false) {
			ShowErrorPage::printError($LNG['page_doesnt_exist']);
		}
    }

    public static function jeux($class)
    {
    	global $LNG;

        if(file_exists("includes/pages/game/" . ucfirst($class) . ".class.php")) {
            require "includes/pages/game/" . ucfirst($class) . ".class.php";
        }

		else if(!file_exists($class) && DEBUG_CLASS == false) {
			ShowErrorPage::printError($LNG['page_doesnt_exist']);
		}
    }

}