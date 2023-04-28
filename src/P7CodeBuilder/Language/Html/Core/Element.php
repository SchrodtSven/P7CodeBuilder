<?php 

declare(strict_types=1);
/**
 * Entity class for HTML elements
 * 
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 */

namespace P7CodeBuilder\Language\Html\Core;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Xml\Core\Syntax as XmlSyntax;

class Element
{
    /**
     * Internally used instance of \DOMDocument
     */
    private \DOMDocument $document;

    /**
     * Internally used instance of \DOMElement
     */
    private \DOMElement $element;

    /**
     * Constructor function
     */
    public function __construct(private string $name, private array $attributes = [], private mixed $content = null)
    {
       
        
        // We just do that, because DOM*-API forces us to do so 
        // - otherwise \DOMNode instances will be read only
        $this->document = new \DOMDocument();
        $this->element = new \DOMElement($name);
        $this->document->appendChild($this->element);

        // Setting up given attributes, if not empty
        if(count($this->attributes))
            $this->setAttributes($this->attributes);
        
        // No content, no problem and vice versa!
        if (! is_null($content)) {
            $this->element->appendChild($this->ensureDomNode($content));
        }


    }

    /**
     * Ensuring, that given content will be converted to an instance of \DomNode (or children)
     *
     * @FIXME!!!!
     * @param mixed $content
     * @return \DOMElement|\DOMText|\DOMNode
     */
    protected function ensureDomNode($content): \DOMElement|\DOMText|\DOMNode
    {
        switch (true) {

            case $content instanceof Element:
                return $this->element;

            case $content instanceof \DomNode:
                return $content;

            case is_string($content):
                return new \DOMText($content);

            default:
                return new \DOMNode();
        }
    }


    /**
     * (Re-)Setting _all_ attributes of current element
     * 
     * @param array $attributes
     * @return self
     */
    public function setAttributes(array $attributes): self 
    {
        $this->attributes = $attributes;
        foreach ($attributes as $key => $value) {
            $this->element->setAttribute($key, $value);
        }
        return $this;
    }

    /**
     * (Re-)Setting attribute $name of current element to $value 
     * 
     * @param string $name
     * @param string $value
     * @return self
     */
    public function setAttribute(string $name, string $value): self 
    {
        $this->attributes[$name] = $value;
        $this->element->setAttribute($name, $value);

        return $this;
    }

    /**
     * “Magical interceptor” function implementing \Stringable interface return textual representation of current state
     * 
     * @return string
     */
    public function __toString(): string
    {
        return (string) (new StringClass($this->document->saveXML()))
                            ->replace(XmlSyntax::SIMPLE_PROLOGUE)
                            ->trim();
    }
}