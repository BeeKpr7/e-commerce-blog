<?php
namespace App\Enums;

enum OrderStatus : string
{
    case PENDING = "pending";
    case VALIDATED = "validated";
    case PROCESSING = "processing";
    case COMPLETED = "completed";
    case CANCELLED = "cancelled";
}