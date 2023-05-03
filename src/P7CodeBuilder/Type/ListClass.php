<?php

declare(strict_types=1);
/**
 * Class for instances representing array(s) as object(s)
 * 
 * - OOP API for array operations
 * -  creating data containers from file contents incl. parsing
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-04-23
 */
namespace P7CodeBuilder\Type;
use P7CodeBuilder\Type\Dry\ArrayAccessTrait;
use P7CodeBuilder\Type\Dry\IteratorTrait;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\File\FileError;

class ListClass implements \ArrayAccess, \Iterator, \Countable
{
    use ArrayAccessTrait;   
    use IteratorTrait;

    /**
     * Constructor function 
     */
    public function __construct(private array $content = [])
    {

    }

    /**
     * Getting current content as native PHP array
     * 
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * Alias for self::getContent()
     * 
     * @return array
     */
    public function getAsArray(): array
    {
        return $this->content;
    }


    /**
     * Creating new instance by reading content of $filename splitting each line to
     * an element of internal content array -> trimming data by default
     * 
     * @param string filename
     * @param bool autoTrim
     * @return self
     * 
     * @FIXME --> trimAll() exists!
     */
    public static function createFromFile(string $filename, bool $autoTrim = true): self
    {
        if(!\file_exists($filename)) {
            throw new FileError($filename, 404);
        }
        $tmp = new self(file($filename));
        if($autoTrim) {
            $tmp->walk(function(&$item) {
                $item = trim($item);
            });
        }
        return $tmp;
    }

    /**
     * Trimming all elements
     * 
     * @return self
     */
    public function trimAll(): self
    {
        $this->walk(function(&$item) {
            $item = trim($item);
        });
        return $this;
    }

    /**
     * Quoting each element with quote sign $mark
     * 
     * @param string $mark
     * @return self
     */
    public function quoteAll(string $mark ="'"): self
    {
        $this->walk(function(&$item) use($mark) {
            $item = (string) (new StringClass((string) $item))->quote($mark);
        });
        return $this;
    }


    /** 
     * Quoting if is_string || stringable
     * 
     * @FIXME!!!!
     * @return self 
     */
    public function quoteByType(): self
    {
        $this->walk(function(&$item) {
            if(!is_numeric($item))
                $item = (string) (new StringClass((string) $item))->quote();
        });
        return $this;
    }

    /**
     * Creating instance from JSON file
     * 
     * @param string $filenname
     * @return self
     */
    public static function createFromJsonFile(string $filename): self
    {
        if(!\file_exists($filename)) {
            throw new FileError($filename, 404);
        }
        return new self(\json_decode(\file_get_contents($filename), true));
    }

    /**
     * Getting current amount of elements - implementing interface \Iterable
     * 
     * @return int 
     */
    public function count(): int 
    {
        return count($this->content);
    }

    /**
     * Imploding every element of current state glued with $glue to instance of StringClass
     * 
     * @param string $glue
     * @return StringClass     
     * */
    public function join(string $glue = ' '): StringClass
    {
        return new StringClass((string) \implode($glue, $this->content));
    }

    /**
     * Adding $value to current array content as newest|last element 
     * 
     * @param mixed $value
     * @return self
     */
    public function push(mixed $value): self
    {
        array_push($this->content, $value);
        return $this;
    }


    /**
     * Popping last element from current array content and retuning it
     * 
     * @return mixed 
     */
    public function pop(): mixed
    {
        return array_pop($this->content);
    }

    /**
     * Shifting first element from current array content and returning it
     * 
     * @return mixed 
     */
    public function shift(): mixed
    {
        return array_shift($this->content);
    }

    /**
     * Adding $value to current array content as first element
     * 
     * @param mixed $value
     * @return self
     */
    public function unshift(mixed $value): self
    {
        array_unshift($this->content, $value);
        return $this;
    }

    public function removeDuplicates(int $mode = \SORT_REGULAR): self
    {
        $this->content = \array_values(\array_unique($this->content, $mode));
        return $this;
    }

    public function splitColumn(int|string $columnKey, int|string|null $indexKey = null): self
    {
        //@FIXME -> error handling
        //);die;
        return new self(\array_column($this->content, $columnKey, $indexKey));
    }

    /**
     * Applying callback on every element
     * 
     * @param callable $callback 
     * @return self
     */
    public function walk(callable $callback): self
    {
        array_walk($this->content, $callback);
        return $this;
    }

    /**
     * Getting $num (existing) key(s) from current content
     * 
     * @param int $num
     * @return self
     */
    public function getRandomKey(int $num = 1): self
    {
        $r =  new \Random\Randomizer();
            return new self(
                $r->pickArrayKeys($this->content, $num)
            );
    }


    /**
     *  Getting random $num (existing) element(s) from current content
     *  
     * @param int $num
     * @reeturn self
     */   
    public function getRandomElement(int $num = 1): self
    {
            $tmp =  new self();
            if($num ===1) {
                return $tmp->push($this->content[$this->getRandomKey()]);
            } else {
                $tmp2 = $this->getRandomKey($num);
                for($i=0; $i < count($tmp2); $i++) {
                    $tmp->push($this->content[$i]);
                }

            return $tmp;
            }
    }

    public function sort(): self
    {
        \natsort($this->content);
        return $this;
    }
    
    /**
     * Getting instance of ListFilter with current content for filtering 
     * by array key named $subject
     * 
     * @param string $subject
     * @return ListFilter
     */
    public function filterBy(string $subject): ListFilter
    {
        return new ListFilter($this, $subject);
    }
}