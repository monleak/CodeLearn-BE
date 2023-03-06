<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CoursesFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq','neq','lt','lte','gt','gte'],
        'title' => ['eq'],
        'description' => ['eq'],
        'detail' => ['eq'],
        'price' => ['eq','neq','lt','lte','gt','gte'],
    ];

    
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
        'neq' => '!=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

}