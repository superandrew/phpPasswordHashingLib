<?php
/**
 * PHP 5.5-like password hashing functions
 *
 * Provides a password_hash() and password_verify() function as appeared in PHP 5.5.0
 * 
 * See: http://php.net/password_hash and http://php.net/password_verify
 * 
 * @link https://github.com/Antnee/phpPasswordLib
 */



if (!defined('PASSWORD_BCRYPT')) define('PASSWORD_BCRYPT', 1);

// Note that SHA hashes are not implemented in password_hash() or password_verify() in PHP 5.5
// and are not recommended for use. Recommend only the default BCrypt option
if (!defined('PASSWORD_SHA256')) define('PASSWORD_SHA256', -1);
if (!defined('PASSWORD_SHA512')) define('PASSWORD_SHA512', -2);

if (!defined('PASSWORD_DEFAULT')) define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);

require_once('passwordLibClass.php');

if (!function_exists('password_hash')){
    function password_hash($password, $algo=PASSWORD_DEFAULT, $options=array()){
        $crypt = NEW Antnee\PhpPasswordLib\PhpPasswordLib;
        $crypt->setAlgorithm($algo);
        
        if (isset($options['cost'])) $crypt->setCost($options['cost']);
        
        $salt   = isset($options['salt'])
                ? $options['salt']
                : NULL;
        
        $debug  = isset($options['debug'])
                ? $options['debug']
                : NULL;
        
        $password = $crypt->generateCryptPassword($password, $salt, $debug);
        
        return $password;
    }
}

if (!function_exists('password_verify')){
    function password_verify($password, $hash){
        return (crypt($password, $hash) === $hash);
    }
}

if (!function_exists('password_needs_rehash')){
    function password_needs_rehash($hash, $algo, $options=array()){
        $crypt = NEW Antnee\PhpPasswordLib\PhpPasswordLib;
        return $crypt->verifyCryptSetting($hash, $algo, $options);
    }
}

if (!function_exists('password_get_indo')){
    function password_get_info($hash){
        $crypt = NEW Antnee\PhpPasswordLib\PhpPasswordLib;
        return $crypt->getInfo($hash);
    }
}