<?php

use LeadMarvels\Metrics\Tests\User;

uses(LeadMarvels\Metrics\Tests\TestCase::class)->in(__DIR__);

function createUser(array $attributes = []): User
{
    return User::create([
        'name' => 'John',
        'email' => 'john@example.com',
        'password' => 'password',
        ...$attributes,
    ]);
}
