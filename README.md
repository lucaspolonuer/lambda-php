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
$arr_result = map(Lambda::_("element -> element *2"), $arr);

print_r($arr_result);
```
```sh
>[4, 4, 4, 4]
```
### Filter
```php
$lam = Lambda::_("a, b -> a == b");
$arr = [[2,2], [3,3], [1,7], [6,6]];
$arr_filtered = filter($lam, $arr);

print_r($arr_result);
```
```sh
>[[2,2], [3,3], [6, 6]]
```

### Times
```php
$lambda = Lambda::_("element -> element *2");
$num = 5;
$result = times($lambda, 3, $num);

echo $result;
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
$arr = map(Lambda::_("str -> echo str . '. '"), ["Onions", "Eggs", "Just stuff"]);

print_r($arr);
```
```sh
>Onions. Eggs. Just stuff.
```

```php
$arr = map(Lambda::_("a, b -> a + b"), [[1,1], [2,2], [3,3], [7,3]]);

print_r($arr);
```
```sh
>[2, 4, 6, 10]
```



