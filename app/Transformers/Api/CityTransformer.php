<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 12/10/16
 * Time: 3:28 PM
 */

namespace App\Transformers\Api;


use App\Transformers\ApiTransformerAbstract;

class CityTransformer extends ApiTransformerAbstract
{
    protected $defaultIncludes = [
        'state'
    ];

    /**
     * Get the fields to be transformed.
     *
     * @param $entity
     *
     * @return mixed
     */
    public function getTransformableFields($entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name,
        ];
    }

    /**
     * @param $entity
     * @return \League\Fractal\Resource\Item
     */
    public function includeState($entity){
        $state = $entity->state;
        if (!$state) {
            return $entity->state;
        }

        return $this->item($state, new StateTransformer());
    }
}