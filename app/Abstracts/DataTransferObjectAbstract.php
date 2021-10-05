<?php

namespace App\Abstracts;

use App\Interfaces\DataTransferObjectInterface;

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
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }

    public function only(array $keys): array
    {
        $data = [];
        foreach ($keys as $key) {
            if (isset($this->{$key})) {
                $data[] = $this->{$key};
            }
        }

        return $data;
    }
}
