<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    protected $success;
    protected $message;

    public function __construct($resource, $success = null, $message = null)
    {
        parent::__construct($resource);
        $this->success = $success;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
