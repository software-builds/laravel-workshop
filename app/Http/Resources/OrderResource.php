<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'products' => $this->products->map(fn ($product) => [
                'quantity' => $product->pivot->quantity,
                'product' => new ProductResource($product),
            ]),
            'status' => $this->status,
            'payment_method' => $this->payment_method,
            'total' => $this->products->map(fn ($product) => ($product->rabattPrice ?? $product->price) * $product->pivot->quantity)->sum(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
