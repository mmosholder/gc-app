<?php

namespace App\GraphQL\Mutation;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\User;
use Carbon\Carbon;

class SignUpMutation extends Mutation
{
  protected $attributes = [
    'name' => 'signUp'
  ];

  public function type()
  {
    return Type::string();
  }

  public function args()
  {
    return [
      'name' => [
        'name' => 'name',
        'type' => Type::nonNull(Type::string()),
        'rules' => ['required'],
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::nonNull(Type::string()),
        'rules' => ['required', 'email', 'unique:users'],
      ],
      'username' => [
        'name' => 'username',
        'type' => Type::nonNull(Type::string()),
        'rules' => ['required', 'unique:users'],
      ],
      'terms_agreed_to' => [
        'name' => 'terms_agreed_to',
        'type' => Type::nonNull(Type::boolean()),
        'rules' => ['required'],
      ],
      'password' => [
        'name' => 'password',
        'type' => Type::nonNull(Type::string()),
        'rules' => ['required'],
      ],
    ];
  }

  public function resolve($root, $args)
  {
    $user = User::create([
      'name' => $args['name'],
      'email' => $args['email'],
      'username' => $args['username'],
      'terms_agreed_at' => Carbon::now(),
      'password' => bcrypt($args['password']),
    ]);

        // generate token for user and return the token
    return auth()->login($user);
  }
}
