<?php

declare(strict_types=1);
/**
 * Class for instances representing array(s) as object 
 * 
 * - OOP API for array operations
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

    public function __construct(private array $content = [])
    {

    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function getAsArray(): array
    {
        return $this->content;
    }


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

    public function trimAll(): self
    {
        $this->walk(function(&$item) {
            $item = trim($item);
        });
        return $this;
    }

    public function quoteAll(): self
    {
        $this->walk(function(&$item) {
            $item = (string) (new StringClass($item))->quote();
        });
        return $this;
    }


    public function quoteByType()
    {
        // @todo implement me!!!
    }

    public static function createFromJsonFile(string $filename): self
    {
        if(!\file_exists($filename)) {
            throw new FileError($filename, 404);
        }
        return new self(\json_decode(\file_get_contents($filename), true));
    }

    public function count(): int 
    {
        return count($this->content);
    }

    public function join(string $glue = ' '): StringClass
    {
        return new StringClass((string) \implode($glue, $this->content));
    }
    
    public function push(mixed $value): self
    {
        array_push($this->content, $value);
        return $this;
    }


    public function pop(): mixed
    {
        return array_pop($this->content);
    }

    public function shift(): mixed
    {
        return array_shift($this->content);
    }

    public function unshift(mixed $value): self
    {
        array_unshift($this->content, $value);
        return $this;
    }



    public function walk(callable $callback): self
    {
        array_walk($this->content, $callback);
        return $this;
    }

    public function getRandomKey(int $num = 1): self
    {
        $r =  new \Random\Randomizer();
            return new self(
                $r->pickArrayKeys($this->content, $num)
            );
    }



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

    public function filterBy(string $subject): ListFilter
    {
        return new ListFilter($this, $subject);
    }

    
    

}