# Usage

## Singleton

Blue is implemented as singleton:

	Blue::instance()->some_method();

## Configuration Loading

To load a configturation key of the currently logged user:

	// $key should be lower case without any special characters for simplicity.
	Blue::instance()->load($key);
	
	// If the configuration key is not found in the database the default value NULL is returned.
	// An alternaitve default value can be specified with the second parameter:
	$value = Blue::instance($key, $default);
	if ($value == $default)
	{
		// Key could not be found in the database for the current user.
	}
	
	$array = Blue::instance()->load($key, array());
	// The foreach loop will not throw any exception:
	foreach ($array as $value)
	{
		// Do some awesome stuff ...
	}

## Configuration Saving

To save a configuration value to a given key for the current logged in user:

	// Saves $value to $key for the current user:
	Blue::instance()->set($key, $value);
