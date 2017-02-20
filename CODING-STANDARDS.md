# Coding Standards

This document outlines technical and style guidelines. Contributors should also follow these guidelines.

## PHP

These PHP guidelines are influenced by :

* [MediaWiki](https://www.mediawiki.org/wiki/Coding_standards)
* [Phabricator](https://secure.phabricator.com/book/phabcontrib/article/php_coding_standards/)
* [WordPress](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php)

### Spaces, Linebreaks and Indentation

* Use tabs for indentation.
* Use Unix linebreaks ("\n"), not MSDOS ("\r\n") or OS9 ("\r").
* Put a space after control keywords like `if` and `for`.
* Put a space after commas in argument lists.
* Put a space around operators like `=`, `<`, etc.
* Don't put spaces after function names.
* Put spaces next to parentheses on the inside, except where the parentheses are empty.
* Warapping code after a specific number of columns is not enforced. But if you want to, then prefer to wrap code at 100 columns.

### Case and Capitalization

* Name variables and functions using `lowercase_with_underscores`.
* Name classes using `UpperCamelCase`.
* Name methods and properties using `lowerCamelCase`.
* Use uppercase for common acronyms like ID and HTML.
* Name constants using `UPPERCASE`.
* Write `true`, `false` and `null` in lowercase.

### Comments

* Do not use "#" (shell-style) comments.
* Prefer "//" comments inside function and method bodies.
* Use [PHPDoc](https://www.phpdoc.org) documentation style

It is essential that your code be well documented so that other developers and bug fixers can easily navigate the logic of your code.

New classes, methods, and member variables should include comments providing brief descriptions of their functionality (unless it is obvious), even if private. In addition, all new methods should document their parameters and return values.

### PHP Language Style

* Use "<?php", not the "<?" short form. Omit the closing "?>" tag.
* Prefer casts like `(string)` to casting functions like `strval()`.
* Prefer type checks like `$v === null` to type functions like
	`is_null()`.
* Avoid all crazy alternate forms of language constructs like "endwhile"
	and "<>".
* Always put braces around conditional and loop blocks.

### PHP Language Features

* Use PHP as a programming language, not a templating language.
* Avoid globals.
* Avoid extract().
* Avoid eval().
* Avoid variable variables.
* Prefer classes over functions.
* Prefer class constants over defines.
* Avoid naked class properties; instead, define accessors.
* Use exceptions for error conditions.
* Use type hints, use `assert_instances_of()` for arrays holding objects.

### Examples

**if/else:**

```php
if ( $some_variable > 3 ) {
	// ...
} else if ( $some_variable === null ) {
	// ...
} else {
	// ...
}
```

You should always put braces around the body of an if clause, even if it is only one line long. Note spaces around operators and after control statements.

Do not use the `endif` construct, and write `else if` as two words.

**for:**

```php
for ( $ii = 0; $ii < 10; $ii++ ) {
	// ...
}
```

Prefer $ii, $jj, $kk, etc., as iterators, since they're easier to pick out
visually and react better to "Find Next..." in editors.

**foreach:**

```php
foreach ( $map as $key => $value ) {
	// ...
}
```

**switch:**

```php
switch ($value) {
	case 1:
		// ...
		break;
	case 2:
		if ($flag) {
			// ...
			break;
		}
		break;
	default:
		// ...
		break;
}
```

`break` statements should be indented to block level.

**array literals:**

```php
$junk = array(
	'nuts',
	'bolts',
	'refuse',
);
```

Use a trailing comma and put the closing parenthesis on a separate line so that diffs which add elements to the array affect only one line.

**operators:**

```php
$a + $b;            // Put spaces around operators.
$omg . $lol;
$arr[] = $element;  // Couple [] with the array when appending.
$obj = new Thing(); // Always use parenthesis.
```

**function/method calls:**

```php
// One line
eject( $cargo );
eject( $cargo1, $cargo2, $cargo3 );

// Multiline
AbstractFireFactoryFactoryEngine::promulgateConflagrationInstance(
	$fuel,
	$ignition_source
);
```

**function/method definitions:**

```php
function exampleFunction( $base_value, $additional_value ) {
	return $base_value + $additional_value;
}

// Use multiline for passing callbacks
callFunctionThatNeedsCallback(
	function() {
		// ...
	}
);

class C {

	// One line
	public static function promulgateConflagrationInstance( IFuel $fuel, IgnitionSource $source ) {
		// ...
	}

	// Multiline
	public static function promulgateConflagrationInstance2(
		IFuel $fuel,
		IgnitionSource $source
	) {
		// ...
	}

}
```

**class:**

```php
class Dog extends Animal {

	const CIRCLES_REQUIRED_TO_LIE_DOWN = 3;

	private $favoriteFood = 'dirt';

	public function getFavoriteFood() {
		return $this->favoriteFood;
	}

}
```


## HTML

### Spaces, Linebreaks and Indentation

* Use tabs for indentation.
* Use Unix linebreaks ("\n"), not MSDOS ("\r\n") or OS9 ("\r").
* When mixing PHP and HTML together, indent PHP blocks to match the surrounding HTML code.

	```php
	<?php
	if ( $condition ) {
	?>
		<div id='example1'></div>
		<div>
			<?php
			echo 'a';
			?>
		</div>
	<?php
	}
	?>
	```
