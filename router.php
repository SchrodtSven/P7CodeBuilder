<?php

declare(strict_types=1);
/**
 *  router.php - to be used with PHP Development Server for local development/testing purposes
 * 
 * - Routing to public/index.php if requested resource does not exist as file resource 
 *   in document root ($PROJECTNAME/public)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-21
 */

 
   // if requested resource does not exist as file in document root:
   if (!file_exists($_SERVER['DOCUMENT_ROOT'] . parse_url($_SERVER['REQUEST_URI'], \PHP_URL_PATH))) { 
       // set current script name in super global &
       $_SERVER['SCRIPT_NAME'] = 'index.php'; 
       // route to public/index.php   
       require_once 'public/index.php'; 
       // or just deliver resource
    } else {
            return false;
    }
