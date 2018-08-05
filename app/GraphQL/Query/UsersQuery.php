<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;

class UsersQuery extends Query
{
  protected $attributes = [
    'name' => 'users'
  ];

  public function type()
  {
    return Type::listOf(GraphQL::type('User'));
  }

  // public function authenticated($root, $args, $currentUser)
  // {
  //   return !!$currentUser;
  // }

  public function resolve($root, $args)
  {
    return User::all();
  }
}
