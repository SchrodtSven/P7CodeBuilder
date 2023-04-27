<?php

declare(strict_types=1);
/**
 * Class for filtering operations on instaces of ListClass | HashMap that 
 * have (keyed; assoc.,) arrays as elements
 * 
 * - OOP API for array operations
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-23
 */

namespace P7CodeBuilder\Type\Operational;
use P7CodeBuilder\Type\ListClass;

class ListFilter
{
    public ListClass $filtered;

    public function __construct(private ListClass $content, private string $subject)
    {

    }

    /**
     * Checking if given key of array ($this::$subject) equals to /value
     * 
     * @to re - implement using genericTestFiler() and implement equals, notEquals .... notContains
     * @param string $value
     * @return self 
     */
    public function eq(string $value): self
    {
        $subject = $this->subject;
        $this->filtered = new ListClass(array_filter( 
            $this->content->getAsArray(), 
            function($item) use($subject, $value): bool {
                  return ($item[$subject] === $value) ? true : false;
             }
        ));
        return $this;
    }

    public function genericTextFilter(string $value, int $mode = ListFilterMode::TEXT_FILTER_EQ): self
    {
        $subject = $this->subject;
        $this->filtered = new ListClass(array_filter( 
            $this->content->getAsArray(), 
            function($item) use($subject, $value, $mode): bool {
                  return match($mode) {
                    ListFilterMode::TEXT_FILTER_EQ => ($item[$subject] === $value),
                    ListFilterMode::TEXT_FILTER_NE => ($item[$subject] !== $value),
                    ListFilterMode::TEXT_FILTER_STARTS => str_starts_with($item[$subject], $value),
                    ListFilterMode::TEXT_FILTER_NOT_STARTS => !str_starts_with($item[$subject], $value),
                    ListFilterMode::TEXT_FILTER_ENDS => str_ends_with($item[$subject], $value),
                    ListFilterMode::TEXT_FILTER_NOT_ENDS => !str_ends_with($item[$subject], $value),
                    ListFilterMode::TEXT_FILTER_CONT => str_contains($item[$subject], $value),
                    ListFilterMode::TEXT_FILTER_NOT_CONT => !str_contains($item[$subject], $value),
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
     * Get the value of filtered
     *
     * @return ListFilter
     */
    public function getFiltered(): ListClass
    {
        return $this->filtered;
    }
}