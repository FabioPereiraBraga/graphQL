<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the post',
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of post',
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'Se o post esta ou não ativo',
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'id do usuario',
            ]
        ];
    }
}