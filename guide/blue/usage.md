# Usage

## Reading

To load a configturation key of the currently logged in user:

	// $group and $key should be lower case without any special characters for simplicity.
	Blue::instance()->load($group, $key);
	
	// If the configuration key is not found in the database the default value NULL is returned.
	// An alternative default value can be specified with the third parameter:
	$value = Blue::instance->load($group, $key, $default);
	if ($value == $default) {
		// Key could not be found in the database for the current user.
	}
	
	$array = Blue::instance()->load($group, $key, array());
	// The foreach loop will not throw any exception:
	foreach ($array as $value) {
		// Do some awesome stuff ...
	}

## Writing

To save a configuration value to a given group and key for the current logged in user:

	Blue::instance()->write($group, $key, $value);
