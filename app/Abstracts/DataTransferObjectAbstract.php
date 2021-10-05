<?php

namespace App\Abstracts;

use App\Interfaces\DataTransferObjectInterface;
use Illuminate\Support\Facades\Log;

abstract class DataTransferObjectAbstract implements DataTransferObjectInterface
{

    public function toArray(): array
    {
        $properties = get_object_vars($this);
        $data = [];
        foreach ($properties as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }

    /**
     * @throws \JsonException
     */
    public function toJson(): string
    {
        try {
            $json = json_encode($this->toArray(), JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            Log::error($e);
            $json = json_encode([
                'message' => 'Cant serialize data'
            ], JSON_THROW_ON_ERROR);
        }
        return $json;
    }

    public function only(array $keys): array
    {
        $data = [];
        foreach ($keys as $key) {
            if (isset($this->{$key})) {
                $data[$key] = $this->{$key};
            }
        }

        return $data;
    }
}
