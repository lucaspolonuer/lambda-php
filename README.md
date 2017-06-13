# lambda-php
A simple library for creating lambda closures in PHP with a bit of sintax sugar.
```php
$concat = Lambda::_("str1, str2 -> str1.str2");
echo $concat("Hello ", "World!");
```
```sh
>Hello World!
```

# Usage
```php
require('lambda.php');
```

### Creating a lambda function
```php
$lambda = Lambda::_("element -> element *2");
```
or
```php
$lambda = new Lambda("element -> element *2");
```

### Applying it
```php
$lambda(5);
```
or
```php
Lambda::_("element -> element *2") (5);
```

```sh
>10
```

# Higher order functions

### Map
```php
$arr = [2, 2, 2, 2];
map(Lambda::_("element -> element *2"), $arr);
```
```sh
>[4, 4, 4, 4]
```

### Times
```php
$lambda = Lambda::_("element -> element *2");
$num = 5;
times($lambda, 3, $num);
```
```sh
>40
```

# Examples
```php
$lambda = Lambda::_("str -> echo 'Hello '.str.', welcome to Argentina!'");
$lambda("Bill Gates");
```
```sh
>Hello Bill Gates, welcome to Argentina! 
```

```php
$concat = Lambda::_("str1, str2 -> str1.str2");
echo $concat("Hello ", "World!");
```
```sh
>Hello World!
```

```php
$condition = Lambda::_("num1, num2, num3 -> num3 > num1 + num2");
echo $condition(1,2,4);
echo $condition(1,2,3);
```
```sh
>true
>false
```

```php
map(Lambda::_("str -> echo str . '. '"), ["Onions", "Eggs", "Just stuff"]);
```
```sh
>Onions. Eggs. Just stuff.
```



