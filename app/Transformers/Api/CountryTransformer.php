<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 12/10/16
 * Time: 3:28 PM
 */

namespace App\Transformers\Api;


use App\Transformers\ApiTransformerAbstract;

class CountryTransformer extends ApiTransformerAbstract
{

    protected $availableIncludes = [
        'createdBy',
        'updatedBy'
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
            'code2' => $entity->code2,
            'code3' => $entity->code3,
        ];
    }

    /**
     * @param $entity
     * @return \League\Fractal\Resource\Item
     */
    public function includeCreatedBy($entity){
        $user = $entity->user;
        if (!$user) {
            return $entity->user;
        }

        return $this->item($user, new UserTransformer());
    }

    /**
     * @param $entity
     * @return \League\Fractal\Resource\Item
     */
    public function includeUpdatedBy($entity){
        $user = $entity->user;
        if (!$user) {
            return $entity->user;
        }

        return $this->item($user, new UserTransformer());
    }
}