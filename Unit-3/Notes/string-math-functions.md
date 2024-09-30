
 String Conversion and Math Functions in  PHP

 String Conversion Functions

1. strtolower(): Converts a string to lowercase.
   
   $text = "HELLO WORLD!";
   echo strtolower($text); // Output: hello world!
   

2. strtoupper(): Converts a string to uppercase.
   
   $text = "hello world!";
   echo strtoupper($text); // Output: HELLO WORLD!
   

3. ucfirst(): Converts the first character of a string to uppercase.
   
   $text = "hello world!";
   echo ucfirst($text); // Output: Hello world!
   

4. ucwords(): Converts the first character of each word to uppercase.
   
   $text = "hello world!";
   echo ucwords($text); // Output: Hello World!
   

5. strrev(): Reverses a string.
   
   $text = "hello";
   echo strrev($text); // Output: olleh
   

6. intval(): Converts a string to an integer.
   
   $number = "123abc";
   echo intval($number); // Output: 123
   

7. floatval(): Converts a string to a floatingpoint number.
   
   $number = "123.45abc";
   echo floatval($number); // Output: 123.45
   

8. strval(): Converts a number to a string.
   $number = 123;
   echo strval($number); // Output: "123" as a string
   


 Math Functions in PHP

1. abs(): Returns the absolute value of a number.
   
   echo abs(10); // Output: 10
   

2. round(): Rounds a floatingpoint number to the nearest integer.
   
   echo round(4.6); // Output: 5
   

3. ceil(): Rounds a floatingpoint number up to the next highest integer.
   
   echo ceil(4.2); // Output: 5
   

4. floor(): Rounds a floatingpoint number down to the next lowest integer.
   
   echo floor(4.9); // Output: 4
   

5. pow(): Calculates the power of a number (exponentiation).
   
   echo pow(2, 3); // Output: 8 (2^3)
   

6. sqrt(): Returns the square root of a number.
   
   echo sqrt(16); // Output: 4
   

7. max(): Returns the highest value from a list of numbers.
   
   echo max(1, 5, 9, 3); // Output: 9
   

8. min(): Returns the lowest value from a list of numbers.
   
   echo min(1, 5, 9, 3); // Output: 1
   

9. rand(): Generates a random integer.
   
   echo rand(); // Output: Random number (e.g., 158384)
   echo rand(1, 100); // Output: Random number between 1 and 100
   

10. number_format(): Formats a number with grouped thousands.
    
    $number = 1234567.89;
    echo number_format($number, 2); // Output: 1,234,567.89

Built in Functions

String Functions

Objective:
 Understand and utilize 's builtin string functions for handling and manipulating string data effectively.

Importance:
 String functions allow developers to process, manipulate, and handle textual data efficiently, which is crucial for tasks like formatting, searching, and replacing content in web applications.

 Key String Functions and Their RealTime Examples

 1. strlen()  String Length
 Returns the length of a given string.

Example:
```
$text = "Hello, World!";
echo strlen($text); // Output: 13


 2. strtoupper()  Convert to Uppercase
 Converts all characters in a string to uppercase.

Example:
```
$text = "hello world";
echo strtoupper($text); // Output: HELLO WORLD


 3. strtolower()  Convert to Lowercase
 Converts all characters in a string to lowercase.

Example:
```
$text = "HELLO WORLD";
echo strtolower($text); // Output: hello world


 4. ucfirst()  Capitalize First Character
 Converts the first character of a string to uppercase.

Example:
```
$text = "hello world";
echo ucfirst($text); // Output: Hello world


 5. lcfirst()  Lowercase First Character
 Converts the first character of a string to lowercase.

Example:
```
$text = "Hello World";
echo lcfirst($text); // Output: hello World


 6. ucwords()  Capitalize the First Character of Each Word
 Converts the first character of each word in a string to uppercase.

Example:
```
$text = "hello world from ";
echo ucwords($text); // Output: Hello World From 


 7. strrev()  Reverse a String
 Reverses the given string.

Example:
```
$text = "Hello";
echo strrev($text); // Output: olleH


 8. strpos()  Find Position of First Occurrence
 Finds the position of the first occurrence of a substring within a string. Returns false if not found.

Example:
```
$text = "I love  programming";
$position = strpos($text, "");
echo $position; // Output: 7


 9. str_replace()  Replace Substring
 Replaces all occurrences of a search string with a replacement string.

Example:
```
$text = "I love ";
$newText = str_replace("", "JavaScript", $text);
echo $newText; // Output: I love JavaScript


 10. substr()  Extract Substring
 Extracts a portion of a string based on a starting position and optional length.

Example:
```
$text = "Hello, World!";
echo substr($text, 7, 5); // Output: World


 11. trim()  Remove Whitespace
 Removes whitespace (or other characters) from the beginning and end of a string.

Example:
```
$text = "   Hello World!   ";
echo trim($text); // Output: "Hello World!"


 12. str_split()  Split String into Array
 Splits a string into an array of smaller chunks.

Example:
```
$text = "Hello";
$array = str_split($text, 2); 
print_r($array); // Output: Array ( [0] => He [1] => ll [2] => o )


 13. strcmp()  Compare Two Strings
 Compares two strings. Returns 0 if they are equal, 1 if the first string is less, and 1 if the first string is greater.

Example:
```
$string1 = "Hello";
$string2 = "hello";
echo strcmp($string1, $string2); // Output: 1 (casesensitive comparison)


 14. number_format()  Format a Number as a String
 Formats a number with grouped thousands.

Example:
```
$number = 1234567.8910;
echo number_format($number, 2); // Output: 1,234,567.89


 15. explode()  Split a String by a Delimiter
 Splits a string into an array based on a specified delimiter.

Example:
```
$text = "apple,orange,banana";
$array = explode(",", $text);
print_r($array); // Output: Array ( [0] => apple [1] => orange [2] => banana )


 16. implode()  Join Array Elements into a String
 Joins array elements into a single string with a specified delimiter.

Example:
```
$array = ["apple", "orange", "banana"];
$text = implode(", ", $array);
echo $text; // Output: apple, orange, banana


 Difference Between str_replace() and substr_replace()
 str_replace()                                  
 Replaces all occurrences of a substring with another string in the entire input string.  
Example: str_replace("a", "e", "banana") → Output: "benene"  

substr_replace()  
Replaces a part of a string, starting from a specified position for a specific length.  
 Example: substr_replace("banana", "apple", 0, 3) → Output: "appleana" 
    



