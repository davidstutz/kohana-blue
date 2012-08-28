<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Blue - User config implementation.
 * 
 * @package		Blue
 * @author		David Stutz
 * @since		1.0.0
 * @copyright	(c) 2012 David Stutz
 */
class Kohana_Blue
{

	/**
	 * @var	object	instance
	 */
	protected static $_instance = FALSE;

	/**
	 * @var	array 	config
	 */
	protected $_config;

	/**
	 * Singleton.
	 *
	 * @return	object	Blue
	 */
	public static function instance()
	{
		if (Blue::$_instance === FALSE
			OR !is_object(Blue::$_instance))
		{
			Blue::$_instance = new Blue();
		}

		return Blue::$_instance;
	}

	/**
	 * Loads Session and configuration options.
	 */
	public function __construct()
	{
		$this->_config = Kohana::$config->load('blue');
	}
	
	/**
	 * Load config value of current user.
	 * 
	 * @param	string	key
	 * @param	string	default
	 */
	public function load($key, $default = NULL)
	{
		$config = ORM::factory('user_config', array('user_id' => Red::instance()->get_user()->id, 'key' => $key));
		
		if (!$config->loaded())
		{
			return $default;
		}
		
		if (FALSE !== ($value = unserialize($config->value)))
		{
			return $value;
		}
		else {
			return $default;
		}
	}
	
	/**
	 * Set config calue.
	 * 
	 * @param	string	key
	 * @param	mixed	value
	 */
	public function set($key, $value)
	{
		$config = ORM::factory('user_config', array('user_id' => Red::instance()->get_user()->id, 'key' => $key));
		
		if (!$config->loaded())
		{
			$config->user = Red::instance()->get_user();
			$config->key = $key;
		}
		
		$config->value = serialize($value);
		
		return $config->save();
	}
}
