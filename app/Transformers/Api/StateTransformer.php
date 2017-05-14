<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 12/10/16
 * Time: 3:30 PM
 */

namespace App\Transformers\Api;


use App\Transformers\ApiTransformerAbstract;

class StateTransformer extends ApiTransformerAbstract
{
    protected $defaultIncludes = [
        'country'
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
    public function includeCountry($entity){
        $country = $entity->country;
        if (!$country) {
            return $entity->country;
        }

        return $this->item($country, new CountryTransformer());
    }
}