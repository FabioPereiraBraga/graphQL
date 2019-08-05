<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'PostQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::paginate('post');
    }

    public function args()
    {
        return [
            'paginate' => [
                'type' => Type::int(),
                'description' => 'Quantidade de registros'
            ],
            'page' => [
                'type' => Type::int(),
                'description' => 'Quantidade de registros'
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $paginate = 15;
        if (isset($args['paginate'])) {
            $paginate = $args['paginate'];
        }
        
        $page = 1;
        if (isset($args['page'])) {
            $page = $args['page'];
        }

       $with = $fields->getRelations();
       return \App\Post::with($with)->paginate($paginate, ['*'], 'page', $page);
    }
}