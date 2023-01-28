<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class BillsFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq','neq','lt','lte','gt','gte'],
        'userID' => ['eq','neq','lt','lte','gt','gte'],
        'courseID' => ['eq','neq','lt','lte','gt','gte'],
        'pay' => ['eq','neq','lt','lte','gt','gte'],
    ];

    
    protected $columnMap = [
        'userID' => 'user_id',
        'courseID' => 'course_id',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'neq' => '!=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

}