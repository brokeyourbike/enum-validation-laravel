<?php

// Copyright (C) 2021 Ivan Stasiuk <ivan@stasi.uk>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\EnumValidation\Tests;

use BrokeYourBike\EnumValidation\IsValidEnum;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
class IsValidEnumTest extends \Orchestra\Testbench\TestCase
{
    /**
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * @var Currencies
     */
    protected $currencies;

    public function setUp(): void
    {
        parent::setUp();

        /** @var \Illuminate\Validation\Factory */
        $this->validator = $this->app['validator'];
    }

    /** @test */
    public function it_will_pass_if_enum_is_valid()
    {
        $isValid = $this->validator->make(
            ['drink_type' => 'vodka'],
            ['drink_type' => new IsValidEnum(DrinkEnumFixture::class)],
        )->passes();

        $this->assertTrue($isValid);
    }

    /** @test */
    public function it_will_not_pass_if_enum_is_invalid()
    {
        $isValid = $this->validator->make(
            ['drink_type' => 'milk'],
            ['drink_type' => new IsValidEnum(DrinkEnumFixture::class)],
        )->passes();

        $this->assertFalse($isValid);
    }

    /** @test */
    public function it_will_throw_if_value_passed_is_not_enum()
    {
        $isValid = $this->validator->make(
            ['drink_type' => 'milk'],
            ['drink_type' => new IsValidEnum('not-a-class')],
        )->passes();

        $this->assertFalse($isValid);
    }
}
