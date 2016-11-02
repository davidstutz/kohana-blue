# Usage

The module offers two operations through the singleton `Blue::instance()`.

## Writing

To create or update a configuration option given a group and a key, use:

    // $group and $key should be lower case without any special characters for simplicity.
    Blue::instance()->write($group, $key, $value);

where `$group` and `$key` are assumed to be strings and `$value` can be any value that
is serializable. Both `$group` and `$key` should be lower case without any special characters.

## Reading

To load a configuration key given the group and the key:

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
