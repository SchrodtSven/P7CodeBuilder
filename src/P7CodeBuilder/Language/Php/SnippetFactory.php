<?php

declare(strict_types=1);
/**
 * Class for creating snippets of PHP code:
 * 
 * - functions / methods
 * - array declaration 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @package P7CodeBuilder
 * @version 0.1
 * @since 2023-05-02
 */


namespace P7CodeBuilder\Language\Php;
use P7CodeBuilder\Language\Dry\SimpleParser;
use P7CodeBuilder\Type\ListClass;
use P7CodeBuilder\Type\Meta\ListFilterMode;
use P7CodeBuilder\Type\Operational\ListFilter;
use P7CodeBuilder\Type\StringClass;
use P7CodeBuilder\Language\Dry\CodeTidy;
class SnippetFactory
{
    private SimpleParser $parser;
    private CodeTidy $tidy;
    private Config $cfg;

    public function __construct()
    {
        $this->tidy = new CodeTidy();
        $this->cfg = new Config();
    }

    public function getAssignmentFromList(ListClass $data, string $varName, string $visibility = Core::VISI_PRIV, string $doc =''): StringClass
    {   
        $this->parser = new SimpleParser(Config::TPL_DIR . Config::ARRAY_DECL);
        $this->parser->VISI = $visibility;
        $this->parser->VAR_NAME = $varName;
        $this->parser->DOC = $doc;
        
        $data = new StringClass(wordwrap((string) $data->join(', '), $this->cfg->maxLengthMultiLineAssignment));
        $this->parser->DATA = (string) $this->tidy->indentLines($data, $this->cfg->indentMultiLineAssignment);
        return $this->parser->render();
    }


    public function getFunctionDeclaration(string $function, string $sig, string $rType, string $rValue, string $doc,
                                          string $code = '', string $visibility = Core::VISI_PRIV, string $param = ''
                                          ): StringClass
    {
        $parser = new SimpleParser(Config::TPL_DIR . Config::FUNC_DECL);
        $parser->FUNC_NAME = $function;
        $parser->SIG = $sig;
        $parser->RVALUE = $rValue;
        $parser->RTYPE = $rType;
        $parser->DOC = $doc;
        $parser->CODE = $code;
        $parser->VISI = $visibility;
        $parser->PARAM = $param;
        return $parser->render();
    }
}