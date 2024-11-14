<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'amount' => $this->amount,
            'method' => $this->method,
            'status' => $this->status,
            'payment_date' => $this->payment_date,
            'order' => new OrderResource($this->whenLoaded('order')), // Relasi dengan Order
        ];
    }
}
