<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Default user config model.
 * 
 * @package		Blue
 * @author		David Stutz
 * @since		1.0.0
 * @copyright	(c) 2012 David Stutz
 */
class Model_Blue_User_Config extends ORM {

	/**
	 * @var	string	table
	 */
	protected $_table_name = 'user_config';

	/**
	 * @var	array 	belongs to user
	 */
	protected $_belongs_to = array(
		'user' => array(
			'model' => 'user',
			'foreign_key' => 'user_id',
		),
	);
}