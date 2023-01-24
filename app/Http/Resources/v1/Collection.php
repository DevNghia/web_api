<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    private $pagination;
    public function __construct($resource)
    {
        $this->pagination = [
            'total' => $resource->total(),
            'page_size' => $resource->perPage(),
            'current' => $resource->currentPage(),
            'total_pages' => $resource->lastPage(),
        ];
        $resource = $resource->getCollection(); // Necessary to remove meta and links

        parent::__construct($resource);
    }

    public function toArray($request)
    {
        if ($this->collection != null) {
            return [
                'code' => '200',
                'message' => 'success',
                'data' => $this->collection,
                'pagination' => $this->pagination,
            ];
        } else {
            return [
                'code' => '404',
                'message' => 'not found',
                'data' => $this->collection,
            ];
        }
    }
}
