<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreedomRequest extends Model
{

    use HasFactory;

    public $table = 'freedom_requests';
    public $timestamps = true;
    public $fillable = [
        "iin",
        "mobile_phone",
        "verification_sms_code",
        "email",
        "product",
        "period",
        "principal",
        "uuid",
        "is_success"
    ];
}
