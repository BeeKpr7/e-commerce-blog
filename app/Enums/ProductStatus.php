<?php
namespace App\Enums;

enum ProductStatus : string
{
    case ACTIVE="active";
    case OUT_OF_STOCK="out_of_stock";
    case INACTIVE="inactive";
}