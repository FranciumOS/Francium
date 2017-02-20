<?php
/**
.---------------------------------------------------------------------------.
| The Francium Project                                                      |
| ------------------------------------------------------------------------- |
| This software `software` is a part of the Francium (Fr) project.          |
| http://subinsb.com/the-francium-project                                   |
| ------------------------------------------------------------------------- |
|     Author: Subin Siby                                                    |
| Copyright (c) 2014 - 2015, Subin Siby. All Rights Reserved.               |
| ------------------------------------------------------------------------- |
|   License: Distributed under the Apache License, Version 2.0              |
|            http://www.apache.org/licenses/LICENSE-2.0                     |
| This program is distributed in the hope that it will be useful - WITHOUT  |
| ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or     |
| FITNESS FOR A PARTICULAR PURPOSE.                                         |
'---------------------------------------------------------------------------'
*/

/**
.---------------------------------------------------------------------------.
|  Software:      The Name of Software                                      |
|  Version:       main.sub                                                  |
|  Contribute:    Git URL                                                   |
|  Documentation: Doc URL                                                   |
|  Support:       Support URL                                               |
'---------------------------------------------------------------------------'
*/

namespace Fr;

// use Fr\MyClass

class MyClass {

	/**
	 * @var array Default configuration
	 */
	public static $default_config = array(
		/**
		 * Information about who uses logSys
		 */
		"info" => array(
			"company" => "My Site",
			"email" => "mail@subinsb.com"
		),

		/**
		 * Database Configuration
		 */
		"db" => array(
			"host" => "",
			"port" => 3306,
			"username" => "",
			"password" => "",
			"name" => "",
			"table" => "Fr_star"
		)
	);

	/**
	 * @var array
	 */
	private $config = array();

	/**
	 * Config
	 *
	 * @param  array  $config [description]
	 * @return [type]         [description]
	 */
	public function config($config = array()){
		$this->config = array_replace_recursive(self::$default_config, $config);

		if( $this->config["debug"]["enable"] ){
			ini_set("display_errors", "on");
		}
	}

	/**
	 * Add messages to log file
	 *
	 * @param  string  $msg Message
	 * @return boolean      Whether message was written
	 */
	public function log($msg = ""){
		if( $this->config["debug"]["enable"] ){
			$log_file = $this->config["debug"]["log_file"];

			if( $log_file === "" )
				$log_file = __DIR__ . "/Francium.log";

			if( $msg !== "" ){
				$message = "[" . date("Y-m-d H:i:s") . "] $msg";
				$fh = fopen($log_file, 'a');
				fwrite($fh, $message . "\n");
				fclose($fh);
				return true;
			}
		}
		return false;
	}

	/**
	 * Intialize
	 *
	 * @param array $config Configuration
	 */
	public function __construct($config){
		$this->config( $config );

		// Continue constructing...
	}

}
