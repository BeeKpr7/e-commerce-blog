<?php
namespace App\Enums;

enum ProductStatus : string
{
    case ACTIVE="active";
    case OUT_OF_STOCK="out_of_stock";
    case INACTIVE="inactive";

    public function label()
    {
        return match ($this) {
            self::ACTIVE => __('product.status.active'),
            self::OUT_OF_STOCK => __('product.status.out_of_stock'),
            self::INACTIVE => __('product.status.inactive'),
        };
    }

    public function color()
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::OUT_OF_STOCK => 'danger',
            self::INACTIVE => 'warning',
        };
    }
}