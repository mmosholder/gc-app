<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
  protected $attributes = [
    'name' => 'User',
    'description' => 'A user'
  ];

  public function fields()
  {
    return [
      'id' => [
        'type' => Type::nonNull(Type::int()),
        'description' => 'The id of a user'
      ],
      'name' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The name of a user'
      ],
      'username' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The username of a user'
      ],
      'email' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The email address of a user'
      ],
      'role' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The user role'
      ],
      'terms_agreed_at' => [
        'type' => Type::string(),
        'description' => 'If and when the user agreed to the terms and conditions'
      ],
      'created_at' => [
        'type' => Type::string(),
        'description' => 'Date a was created'
      ],
      'updated_at' => [
        'type' => Type::string(),
        'description' => 'Date a was updated'
      ],
    ];
  }

  protected function resolveCreatedAtField($root, $args)
  {
    return (string)$root->created_at;
  }

  protected function resolveUpdatedAtField($root, $args)
  {
    return (string)$root->updated_at;
  }
}
