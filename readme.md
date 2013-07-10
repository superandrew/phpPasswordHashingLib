# phpPasswordLib

## PHP 5.5-like password functions for PHP 5.3 and 5.4

PHP 5.5.0 introduced the new password_hash() and password_verify() functions
which simpify the creation of password hashes that are suitable for storing
passwords at rest.

I don't want to go into a discussion about why BCrypt is the way to go instead
of using MD5() or SHA1() here, but if you're interested then I recommend that
you read the defacto online guide here:

http://codahale.com/how-to-safely-store-a-password/

## About phpPasswordLib

PHP 5.5.0 password_hash() supports two algorithm definitions:

**PASSWORD_DEFAULT** and **PASSWORD_BCRYPT**

PASSWORD_DEFAULT is currently assigned to PASSWORD_BCRYPT, but in future it may
switch to another that is considered more secure. It is recommended that you
leave this value as PASSWORD_DEFAULT so that your code automatically selects the
prefered algorithm. If you want to force Blowfish, simply use PASSWORD_BCRYPT

phpPasswordLib supports a further two algorithm definitions:

**PASSWORD_SHA256** and **PASSWORD_SHA512**

I do not recommend that you use either of these, as it may result in problems
if/when you port your code to PHP >= 5.5. The exception would be if you were to
use the Antnee\PhpPasswordLib\PhpPasswordLib class directly, instead of using
the password_hash() and password_verify() wrappers.

_Note:_ If you use this code on PHP < 5.5.0 and then port your code to PHP >=
5.5.0 you should automatically begin using the built in functions, instead of
this libraries functions. Your password verification will continue to work as it
did, but only if you used the PASSWORD_DEFAULT or PASSWORD_BCRYPT algorithms. I
cannot stress enough that **PASSWORD_SHA256 and PASSWORD_SHA512 are NOT
supported in the native PHP 5.5 password_hash() or password_verify() functions**

## Demo

I've created a very basic demo GUI for you to try it out. Simply open demo.php
in your browser and try setting some values yourself for the password,
algorithm, salt and rounds. You can also try the password_verify() method to
check that your passwords and hashes verify properly after being hashed.

## Feedback

This is the very first iteration. There will be improvements, I'm sure. I'm more
than happy to receive feedback. I'm also happy to explain any questions you may
have about why BCrypt is the recommended algorith. I don't want to get into any
philosophical debates about the subject however.

Thanks
