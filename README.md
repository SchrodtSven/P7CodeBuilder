# P7CodeBuilder
Library for dynamic creation of source code (files, parts, projects) in several languages (PHP, XML, HTML, rust, Java, Javascript, SQL ...)
P7CodeBuilder requires PHP 8.2+


## Design & Architecture

### Types 

Usage of _scalar_ native PHP types (<code>int</code>, <code>float</code>, <code>bool, </code>, <code>string</code>) and _compound_ types like lists (array *indexed per <code>int</code>*) or hash maps
(*array keyed per <code>string</code>*) are wrapped by classes in the sub namespace <code>P7CodeBuilder\Type</code> named <code>{$Type}Class</code > -> like <code>\stdClass</code>.

<code>P7CodeBuilder\Type\ListClass</code> and <code>P7CodeBuilder\Type\HashpMap</code> implement 
- <code>\ArrayAccess</code> interface allowing accessing properties via <code>[int] | ['string']</code>
- <code>\Iterator</code> interface allowing iteration via <code>foreach</code>
- <code>\Countable</code> interface allowing usage of <code>count</code>

Within method signatures native scalar types are used to guarantee short hand usage.
In closures or other non public accessible code PHP native functions are used.

Every <code>{$Type}Class</code > has a method <code>getContent()</code> to retrieve current content as native PHP type.

### Dont repeat yourself - DRY 

To avoid redundancy sub namespaces have a <code>Dry</code> part containing _traits_ used within several classes.

### Sub namespaces

#### Language\Html

- This classes are using \DOMDocument, \DOMElement, \DOMText and \DOMNode internally


## Appendix

### Development environment 

 Chronicler's duty: 

 - Box: MacBookAir M1 /2020 (PHP Development)
 - Box: iMac21,2 M1/2020 (PHP Development)
 - Box: Raspberry Pi 4 Model B Rev 1.1 (RDBMS, CI/CD)
 - OS: Darwin Kernel Version 22.3.0; RELEASE_ARM64_T8103 arm64
 - OS: Linux 5.10.17-v7l+ #1403 SMP Mon Feb 22 11:33:35 GMT 2021 armv7l GNU/Linux
 - IDE: Visual Studio Code; version: 1.70.2 (Universal)
 - PHP: 8.2.4 (NTS); with Zend OPcache v8.2.0
 - Java: openjdk version "11.0.18" 2023-01-17; OpenJDK Runtime Environment  & OpenJDK Server VM
 - RDBMS: Sqlite version 3.39.5
 - CI/CD Pipeline: Jenkins 

## Outlook / Todos
 
- Adding documentation 
- Adding comments 
- Adding unit tests for PHPUnit 
- Adding support for testing via <a href="https://github.com/SchrodtSven/P8Unitcheck">P8UnitCheck</a>
- Ensuring further PSR* compatibility
- Ensuring it to be shippable via <code>composer</code>


 Glück auf! 
 Sven <sven@schrodt.club>