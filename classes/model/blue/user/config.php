<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Default user config model.
 *
 * @package     Blue
 * @author      David Stutz
 * @copyright   (c) 2013 - 2016 David Stutz
 * @license     http://opensource.org/licenses/bsd-3-clause
 */
class Model_Blue_User_Config extends ORM {

    /**
     * @var    string    table
     */
    protected $_table_name = 'user_config';

    /**
     * @var    array     belongs to user
     */
    protected $_belongs_to = array(
        'user' => array(
            'model' => 'user',
            'foreign_key' => 'user_id',
        ),
    );
}
