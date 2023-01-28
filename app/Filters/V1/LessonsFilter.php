<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class LessonsFilter extends ApiFilter{
    protected $safeParms = [
        'id' => ['eq','neq','lt','lte','gt','gte'],
        'courseID' => ['eq','neq','lt','lte','gt','gte'],
        'title' => ['eq'],
        'description' => ['eq'],
        'content' => ['eq'],
    ];

    
    protected $columnMap = [
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