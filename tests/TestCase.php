<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * テストクラスの基底クラス
 *
 * @package Tests\Unit\Services
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
