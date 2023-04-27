<?php

//@deprecated

class Func
{
    public string $DOC ='';
    public string $PARAM ='';
    public string $RETURN ='';
    public string $VISI ='';
    public string $FUNCNAME ='';
    public string $SIG ='';
    public string $RTYPE ='';
    public string $CODE ='';
    public string $RVALUE ='';
    
    private array $find = [
                            '{{DOC}}',
                            '{{PARAM}}',
                            '{{RETURN}}',
                            '{{VISI}}',
                            '{{FUNCNAME}}',
                            '{{SIG}}',
                            '{{RTYPE}}',
                            '{{CODE}}',
                            '{{RVALUE}}'
    ];

    private array $replace;

    public function __construct(private string $tplName)
    {
      //  echo trim($this->tplName;die;

      $this->VISI = 'public';
      $this->RETURN = 'self';
    }

    public function render(): string
    {
        $this->replace = [
                            trim($this->DOC),
                            trim($this->PARAM),
                            trim($this->RETURN),
                            trim($this->VISI),
                            trim($this->FUNCNAME),
                            trim($this->SIG),
                            trim($this->RTYPE),
                            trim($this->CODE),
                            trim($this->RVALUE)

        ];        

        return str_replace(
            $this->find,
            $this->replace,
            file_get_contents($this->tplName)
        );
    }

    public function __toString(): string
    {
        return $this->render();
    }
}