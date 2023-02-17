<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $casts = ['express' => 'json'];

    /**
     * @var string[]
     */
    protected $appends = ['status_text'];

    /**
     * @return string
     */
    public function getStatusTextAttribute()
    {
        // 0 已取消 1 待支付，2 待发货 3 待收货 4 待评价
        return ['已取消', '待支付', '待发货', '待收货', '待评价'][$this->getAttributeValue('status')] ?? '-';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }
}
