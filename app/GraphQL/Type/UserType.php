<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use App\User;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'A type',
        'model'=> User::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],
            'posts'=>[
                 'type'=>Type::listOf(GraphQL::type('post')),
                 'description' => 'Lista de usuarios',
                  'query'=> function(array $args, $query){
                    return $query->where('posts.active', true);
                  }
            ]
        ];
    }
}