<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $from_temp_expr_id
 * @property string $to_temp_expr_id
 * @property string $expr_assoc_type
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property TemporalExpression $temporalExpressionByFromTempExprId
 * @property TemporalExpression $temporalExpressionByToTempExprId
 */
class TemporalExpressionAssoc extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'temporal_expression_assoc';

    /**
     * @var array
     */
    protected $fillable = ['expr_assoc_type', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function temporalExpressionByFromTempExprId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\TemporalExpression', 'from_temp_expr_id', 'temp_expr_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function temporalExpressionByToTempExprId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\TemporalExpression', 'to_temp_expr_id', 'temp_expr_id');
    }
}
