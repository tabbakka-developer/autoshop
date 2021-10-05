<?php

namespace App\Interfaces;

class OnlyDTOAbstract implements OnlyDTOInterface
{

    public function toArray(): array
    {
        return [];
    }

    public function toJson(): string
    {
       return json_encode([], JSON_THROW_ON_ERROR);
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
