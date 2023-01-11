# Totara Code Sniffer Standard

This project contains a Code Sniffer Standard for Totara Learn.

## Prerequisites

 * PHP 7.4 or higher
 * Composer (https://getcomposer.org/)

***
Please note that the minimum PHP requirement has changed. You can now only install and run Codesniffer on PHP 7.4 or higher.

You can still analyse versions of Totara compatible only to version 5.6, as long as you run Codesniffer on 7.4 or higher.
***

## Installation

Clone this repository into a folder of your choice. 

In the root of the project run:
 
```
# Install composer packages (--dev is only required for running phpunit)
# If needed, change "composer" to the composer executable on your machine.
composer install --no-dev

# Now check what standards PHPCS can use
# The new Totara coding standard is automatically set after composer install
vendor/bin/phpcs -i

# should output something like
The installed coding standards are PEAR, Zend, PSR2, MySource, Squiz, PSR1, PSR12, Totara and PHPCompatibility
```
 
Optionally you can add phpcs to your path:

```
# Add this to your ~/.bash_profile or ~/.profile
# (Replace /path/to/this/project/ with the actual one on your machine)
export PATH="$PATH:/path/to/this/project/vendor/bin"

# don't forget to either do
source ~/.bash_profile
# or 
source ~/.profile

# or start a new shell
```

## Usage

### Console

To run Code Sniffer using the Totara Standard on the console 

```
vendor/bin/phpcs --standard=Totara [--extensions=php,js] [folder_or_file_to_check]

# Example:
vendor/bin/phpcs --standard=Totara --extensions=php /path/to/your/project/classes/[MyClassToCheck.php]

# or if you've added phpcs to your path
phpcs --standard=Totara --extensions=php classes/[MyClassToCheck.php]
```

As some Sniffs can also check JavaScript files you might want to limit the extensions to one of the two.

### Default phpcs.xml file

If your project includes a phpcs.xml or phpcs.xml.dist file you can run Code Sniffer from within your project without specifying the standard or any other configuration set in that file.

```
/path/to/phpcs filesorfoldertocheck
```

See [PHP Code Sniffer's Advanced Usage docs](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage#using-a-default-configuration-file) for more details.

### PHPStorm

To set up PHPStorm to automatically check your files and highlight coding style violations directly in the code 

 1. Open "Preferences"
 2. Go to "Languages & Framework" => "PHP" => "Quality Tools" => "Code Sniffer"
 3. Make sure that in the Configuration the "PHP Code Snifffer path" points to the "vendor/bin/phpcs" file within this project
 4. "Validate" the selection and click "Apply"
 4. Go to "Editor" => "Inspections"
 5. In the big tree of Inspections find "PHP" => "Quality Tools" => "PHP Code Sniffer Validation"
 6. Activate the inspection
 7. In the right panel under "Options" choose "Custom" as Standard and click on the "..." button next to it
 8. Choose the ruleset.xml file from this project (`src/Standards/Totara/ruleset.xml`)
 9. Click "OK"
 
That's it. Now all violations should be marked directly within your code view.

### PHPCompatibility

The Totara standard does include the PHPCompatibility standard as well to check for problems on specific versions.

By default the PHPCompatibility rules will check only the PHP version you are running the phpcs command on. To choose a specific version to check either set the version on the console 

```
# to run all the checks for PHP 7.1, PHP 7.2 and PHP 7.3
/path/to/phpcs --runtime-set testVersion 7.1-7.3 ...
```
or have a "testVersion" configuration option in your phpcs.xml file.

See [PHPCompatibility](https://github.com/PHPCompatibility/PHPCompatibility) for more details.

**IMPORTANT NOTICE:**

Originally the Totara Standard included the **PHPCompatibility** standard. As PHPCompatibility is not compatible with PHP 8+ it got removed from the Totara Standard. It can still be executed directly via the phpcs command.


## Development

### Sniffs

In the xml file `src/Standards/Totara/ruleset.xml` you find all rules used for this Coding Standard. It is a mixture of Sniffs from other Standards and our own Sniffs.

If you create or modify Sniffs within this project make sure you stick to the PSR-2 Coding Standard (to match the style of the original Code Sniffer library) and PSR-4 autoloading.

### Testing

If you create or modify Sniffs within this project make sure you create or update unit tests for it.

**NOTE:** The PHPUnit version included is currently not compatible with PHP 8. You need to run the following on PHP 7.4.

To run the unit tests:

```
# If you haven't done it before, run
composer install

# Then run all tests with:
vendor/bin/phpunit
```

## Git Hook

There is also a pre-commit hook for git to run Code Sniffer on commit.

Check out the [instructions](git-hook) on how to use it.