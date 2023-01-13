<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    private $pagination;
    private $code;
    private $message;
    public function __construct($resource)
    {
        $this->pagination = [
            'total' => $resource->total(),
            'page_size' => $resource->perPage(),
            'current' => $resource->currentPage(),
            'total_pages' => $resource->lastPage(),
        ];
        $this->code = '200';
        $this->message = 'success';
        $resource = $resource->getCollection(); // Necessary to remove meta and links

        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->collection,
            'pagination' => $this->pagination,
        ];
    }
}
