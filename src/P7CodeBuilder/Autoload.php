<?php

declare(strict_types=1);
/**
 * Auto loading for current project 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-23
 */


namespace P7CodeBuilder;

class Autoload
{

    /**
     * Namespace prefix for project files
     */
    public const VENDOR = 'P7CodeBuilder';

    /**
     * Lib prefix
     */
    public const LIB_PREFIX = 'src/';

    /**
     * Separator for namespaces
     */
    public const NAMESPACE_SEPARATOR ='\\';

    /**
     * Registering AL
     *
     * @return void
     */
    public function registerAutoloader()
    {
        /**
         * Registering project specific auto loading
         */
        spl_autoload_register(function ($className) {

            // Check if namespace of class to be instantiated belongs to us
            if (str_starts_with($className,  self::VENDOR)) {
                
                //replace separator for namespaces with directory separator
                $file = self::LIB_PREFIX . str_replace(
                        self::NAMESPACE_SEPARATOR, 
                        \DIRECTORY_SEPARATOR, 
                        $className
                    ) . '.php';
               
                // Check if destination class file exists  and include it, 
                // if not so - __do not throw__ \E*, because of AL chain!
                // @see https://www.php-fig.org/psr/psr-4/#2-specification : 
                // "4. Autoloader implementations *MUST NOT* throw exceptions,
                // MUST NOT raise errors of any level, and SHOULD NOT return a value."
                
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        });
    }
}

// Running auto loader
(new Autoload())->registerAutoloader();


