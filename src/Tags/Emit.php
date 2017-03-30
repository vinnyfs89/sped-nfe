<?php

namespace NFePHP\NFe\Tags;

use NFePHP\NFe\Tags\Base;
use NFePHP\NFe\Tags\TagInterface;
use stdClass;

class Emit extends Base implements TagInterface
{
    const TAG_NAME = 'emit';
    
    /**
     * @var string
     */
    public $CNPJ;
    /**
     * @var string
     */
    public $CPF;
    /**
     * @var string
     */
    public $xNome;
    /**
     * @var string
     */
    public $xFant;
    /**
     * @var string
     */
    public $IE;
    /**
     * @var string
     */
    public $IEST;
    /**
     * @var string
     */
    public $IM;
    /**
     * @var string
     */
    public $CNAE;
    /**
     * @var string
     */
    public $CRT;
    /**
     * @var EnderEmit
     */
    public $enderEmit;
    
    public $parameters = [
        'CNPJ'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'CPF'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'xNome'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'xFant'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'IE'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'IEST'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'IM'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'CNAE'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ],
        'CRT'=>[
            'type' => 'string',
            'format'=>'14',
            'required'=>false,
            'force'=>false
        ]
    ];
    
    public function __construct(stdClass $std)
    {
        parent::__construct($std);
        /*
        $this->CNPJ = $this->std->cnpj;
        $this->CPF = $this->std->cpf;
        $this->xNome = $this->std->xnome;
        $this->xFant = $this->std->xfant;
        $this->IE = $this->std->ie;
        $this->IEST = $this->std->iest;
        $this->IM = $this->std->im;
        $this->CNAE = $this->std->cnae;
        $this->CRT = $this->std->crt;
         * 
         */
    }
    
    public function toNode()
    {
        $emitTag = $this->dom->createElement("emit");
        $this->dom->addChild(
            $emitTag,
            "CNPJ",
            self::formatToTag($this->parameters['CNPJ'], $this->CNPJ),
            $this->parameters['CNPJ']['']
        );
        $this->dom->addChild(
            $emitTag,
            "CPF",
            $this->CPF,
            false
        );
        $this->dom->addChild(
            $emitTag,
            "xNome",
            $this->xNome,
            true
        );
        $this->dom->addChild(
            $emitTag,
            "xFant",
            $this->xFant,
            false
        );
        $this->dom->addChild(
            $emitTag,
            "IE",
            $this->IE,
            true
        );
        $this->dom->addChild(
            $emitTag,
            "IEST",
            $this->IEST,
            false
        );
        $this->dom->addChild(
            $emitTag,
            "IM",
            $this->IM,
            false
        );
        $this->dom->addChild(
            $emitTag,
            "CNAE",
            $this->CNAE,
            false
        );
        $this->dom->addChild(
            $emitTag,
            "CRT",
            $this->CRT,
            true
        );
        if (!empty($this->enderEmit)) {
            $this->dom->appExternalChildBefore($emitTag, $this->enderEmit->toNode(), 'IE');
        }
        $this->node = $emitTag;
        return $emitTag;
    }
}