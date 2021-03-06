<?php

namespace yii2tech\tests\unit\embedded\data;

use yii\base\Object;
use yii2tech\embedded\ContainerInterface;
use yii2tech\embedded\ContainerTrait;

/**
 * @property \stdClass $model
 * @property \stdClass[] $list
 * @property Container $self
 * @property \stdClass[] $null
 * @property \stdClass[] $nullAutoCreate
 */
class Container extends Object implements ContainerInterface
{
    use ContainerTrait;

    public $modelData = [];
    public $listData = [];
    public $selfData = [];
    public $nullData;

    public function embedModel()
    {
        return $this->mapEmbedded('modelData', 'stdClass');
    }

    public function embedList()
    {
        return $this->mapEmbeddedList('listData', 'stdClass');
    }

    public function embedSelf()
    {
        return $this->mapEmbedded('selfData', __CLASS__);
    }

    public function embedNull()
    {
        return $this->mapEmbedded('nullData', 'stdClass', ['createFromNull' => false, 'unsetSource' => false]);
    }

    public function embedNullAutoCreate()
    {
        return $this->mapEmbedded('nullData', 'stdClass');
    }
}