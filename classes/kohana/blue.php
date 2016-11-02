<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Blue - User config implementation.
 *
 * @package     Blue
 * @author      David Stutz
 * @copyright   (c) 2013 - 2016 David Stutz
 * @license     http://opensource.org/licenses/bsd-3-clause
 */
class Kohana_Blue {

    /**
     * @var    object    instance
     */
    protected static $_instance = FALSE;

    /**
     * @var    array     config
     */
    protected $_config;

    /**
     * Singleton.
     *
     * @return    object    Blue
     */
    public static function instance() {
        if (Blue::$_instance === FALSE OR !is_object(Blue::$_instance)) {
            Blue::$_instance = new Blue();
        }

        return Blue::$_instance;
    }

    /**
     * Loads Session and configuration options.
     */
    public function __construct() {
        $this->_config = Kohana::$config->load('blue');
    }

    /**
     * Load config value of current user.
     *
     * @param    string    key
     * @param    string    default
     */
    public function load($group, $key, $default = NULL) {
        $config = ORM::factory('user_config')->where('user_id', '=', Red::instance()->get_user()->id)->and_where('group', '=', $group)->and_where('key', '=', $key)->find();

        if (!$config->loaded()) {
            return $default;
        }
        
        try {
            return unserialize($config->value);
        }
        catch (ErrorException $e) {
            return $default;
        }
    }

    /**
     * Set config calue.
     *
     * @param    string    key
     * @param    mixed    value
     */
    public function write($group, $key, $value) {
        $config = ORM::factory('user_config')->where('user_id', '=', Red::instance()->get_user()->id)->and_where('group', '=', $group)->and_where('key', '=', $key)->find();

        if (!$config->loaded()) {
            $config->user = Red::instance()->get_user();
            $config->group = $group;
            $config->key = $key;
        }

        $config->value = serialize($value);

        return $config->save();
    }

}
