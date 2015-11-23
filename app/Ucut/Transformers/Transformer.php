<?php namespace Ucut\Transformers;

/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/18/2015
 * Time: 6:00 PM
 */
abstract class Transformer
{

    public function transformCollection(array $items)
    {
        return array_map([$this,'transform'],$items);
    }

    public abstract function transform($item);
}