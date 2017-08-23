# acf-helpers
Simple ACF helpers we are using daily

## options.class.php
Copy and include this class in your current WordPress theme. This class supports WPML for loading different language options. 

**Usage:**

*1. Get option value from current language*
```
Options::get('your_options_key');
```

*2. Get option value from different (not current) language*
```
Options::get('your_options_key', 'language_code');
```

*3. Get option value from default (primary) language*
```
Options::get_default('your_options_key');
```

## fields.php
Load specific field values at onces (with one function call). Ideal when you don`t want to load all fields using get_fields() function.

**Usage:**
*1. Get values for specific set of custom fields*
```
$fields = get_custom_fields(['field1', 'field2']);
```