<?php

/**
 * BaseTemplate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $label
 * @property clob $content
 * 
 * @method string   getLabel()   Returns the current record's "label" value
 * @method clob     getContent() Returns the current record's "content" value
 * @method Template setLabel()   Sets the current record's "label" value
 * @method Template setContent() Sets the current record's "content" value
 * 
 * @package    .
 * @subpackage model
 * @author     Carlos E. Caballero B.
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTemplate extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('template');
        $this->hasColumn('label', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('content', 'clob', null, array(
             'type' => 'clob',
             'default' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}