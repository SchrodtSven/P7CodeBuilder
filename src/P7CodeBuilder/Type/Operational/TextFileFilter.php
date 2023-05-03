<?php

declare(strict_types=1);
/**
 * Class for filtering operations files with text content
 * operating on:
 * 
 *  - each line (sep. by default with PHP_EOL)
 *  - (sub) strings per line
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-03
 */

namespace P7CodeBuilder\Type\Operational;
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\FilterMode;
use P7CodeBuilder\File\FileError;

class TextFileFilter 
{
    public ListClass $filtered;

    public function __construct(private ListClass $content)
    {

    }

    /**
     * Creating new instance by reading content of $filename splitting each line (sep. by PHP_EOL by default) to
     * an element of internal content array -> trimming data by default
     * 
     * @param string filename
     * @param bool autoTrim
     * @return self
     
     */
    public static function createFromFile(string $filename, bool $autoTrim = true): self
    {
        if(!\file_exists($filename)) {
            throw new FileError($filename, 404);
        }
        return new self(
                        (new ListClass(file($filename))
                        )->trimAll()
        );
        
    }

        
   /**
    *  Applying text filter /equals/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function equals(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_EQ)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /not equals/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function notEquals(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_NE)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /contains/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function contains(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_CONT)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /not contains/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function notContains(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_NOT_CONT)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /starts with/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function startsWith(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_STARTS)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /not starts with/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function notStartsWith(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_NOT_STARTS)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /not ends with/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function notEndsWith(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_ENDS)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /ends with/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function endsWith(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_NOT_ENDS)->getFiltered();
    }
 
     
   /**
    *  Applying text filter /matches regular expression pattern/ - returning instance of ListClass
    * 
    * @param string value
    * @return ListClass
    */
    public function matchesRegularExpressionPattern(string $value): ListClass
    {
        return $this->genericTextFilter($value, FilterMode::TEXT_FILTER_REGEX)->getFiltered();
    }
 
 
     
    /**
      * Generic function for basic text filtering 
      *
      * @param string $value
      * @param int $mode
      * @return self
      */
    public function genericTextFilter(string $value, int $mode = FilterMode::TEXT_FILTER_EQ): self
    {

        
        $this->filtered = new ListClass(
                array_filter( 
                    $this->content->getAsArray(), 
                    function($item) use($value, $mode): bool {
                        return match($mode) {
                            FilterMode::TEXT_FILTER_EQ => ($item === $value),
                            FilterMode::TEXT_FILTER_NE => ($item !== $value),
                            FilterMode::TEXT_FILTER_STARTS => str_starts_with($item, $value),
                            FilterMode::TEXT_FILTER_NOT_STARTS => !str_starts_with($item, $value),
                            FilterMode::TEXT_FILTER_ENDS => str_ends_with($item, $value),
                            FilterMode::TEXT_FILTER_NOT_ENDS => !str_ends_with($item, $value),
                            FilterMode::TEXT_FILTER_CONT => str_contains($item, $value),
                            FilterMode::TEXT_FILTER_NOT_CONT => !str_contains($item, $value),
                            // @FIXME -> implement for self::matchesRegularExpressionPattern() /  FilterMode::TEXT_FILTER_REGEX
                            default => $value
                        };
                    }
        ));
        return $this;
    }
    


    /**
     * Set the value of filtered
     *
     * @param ListFilter $filtered
     *
     * @return self
     */
    public function setFiltered(ListFilter $filtered): self
    {
        $this->filtered = $filtered;

        return $this;
    }

    /**
     * Get the value of filtered list as *new* instance
     *
     * @return ListFilter
     */
    public function getFiltered(): ListClass
    {
        return $this->filtered;
    }

    
}