<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    private $pagination;
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        if ($this->resource != null) {
            return [
                'code' => '200',
                'message' => 'success',
                'data' => $this->resource,
            ];
        } else {
            return [
                'code' => '404',
                'message' => 'not found',
                'data' => [],
            ];
        }
    }
}
