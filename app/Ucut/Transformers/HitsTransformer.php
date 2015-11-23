<?php
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/21/2015
 * Time: 3:49 PM
 */

namespace Ucut\Transformers;


class HitsTransformer extends Transformer
{
    public function transform($hits)
    {
        return [

            'Day' => $hits['date'],
            'Hits'=> $hits['hits'],
        ];
    }

}