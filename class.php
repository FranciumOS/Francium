<?php
namespace Fr;

/**
.---------------------------------------------------------------------------.
| The Francium Project                                                      |
| ------------------------------------------------------------------------- |
| This software logSys is a part of the Francium (Fr) project.              |
| http://subinsb.com/the-francium-project                                   |
| ------------------------------------------------------------------------- |
|     Author: Subin Siby                                                    |
| Copyright (c) 2014 - 2015, Subin Siby. All Rights Reserved.               |
| ------------------------------------------------------------------------- |
|   License: Distributed under the General Public License (GPL)             |
|            http://www.gnu.org/licenses/gpl-3.0.html                       |
| This program is distributed in the hope that it will be useful - WITHOUT  |
| ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or     |
| FITNESS FOR A PARTICULAR PURPOSE.                                         |
'---------------------------------------------------------------------------'
*/

/**
.---------------------------------------------------------------------------.
|  Software: The Name of Software                                           |
|   Version: main.sub  (YYYY mm DD)                                         |
|   Contact: http://github.com/subins2000/Project-Name                      |
|   Documentation: https://subinsb.com/Project-Name                         |
|   Support: http://subinsb.com/ask/Project-Name                            |
'---------------------------------------------------------------------------'
*/

ini_set("display_errors", "on");

class LS {

  /**
   * ------------
   * BEGIN CONFIG
   * ------------
   * Edit the configuraion
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
      "table" => ""
    ),
  );
  
  /* ------------
   * END Config.
   * ------------
   * No more editing after this line.
   */
  
  public static $config = array();
  private static $constructed = false;
  
  /**
   * Merge user config and default config
   */
  public static function config(){
    self::$config = array_merge(self::$default_config, self::$config);
  }
  
  /**
   * Log something in the Francium.log file.
   * To enable logging, make a file called "Francium.log" in the directory
   * where "class.logsys.php" file is situated
   */
  public static function log($msg = ""){
    $log_file = __DIR__ . "/Francium.log";
    if(file_exists($log_file)){
      if($msg != ""){
        $message = "[" . date("Y-m-d H:i:s") . "] $msg";
        $fh = fopen($log_file, 'a');
        fwrite($fh, $message . "\n");
        fclose($fh);
      }
    }
  }
  
  public static function construct(){
    self::config();
    // Conitnue Constructing
  }
  
  // The Other class code goes after this
}
