<?php

namespace App;

enum StatusEnum : string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
    case DELETED = 'deleted';
    case SUSPENDED = 'suspended';

    public function color() : string
    {
        return match($this) {
            StatusEnum::ACTIVE => 'green',
            StatusEnum::INACTIVE => 'gray',
            StatusEnum::PENDING => 'orange',
            StatusEnum::DELETED => 'red',
            StatusEnum::SUSPENDED => 'zinc',
        };
    }

    public function cssTextColor() : string
    {
        return match($this) {
            StatusEnum::ACTIVE => 'text-green-600',
            StatusEnum::INACTIVE => 'text-gray-500',
            StatusEnum::PENDING => 'text-orange-500',
            StatusEnum::DELETED => 'text-red-600',
            StatusEnum::SUSPENDED => 'text-zinc-500',
        };
    }
}
