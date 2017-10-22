<?php
/**
 * Created on 21.10.17 at 17:25.
 * By user: Denis Zadorozhny
 *
 * @licence MIT
 */
/**
 * MIT License
 *
 * Copyright (c) 2017 mymdz
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Mymdz\Trustly;

use Illuminate\Support\ServiceProvider;
use Mymdz\Trustly\Contracts\TrustlyContract;

/**
 * Class TrustlyServiceProvider
 * @package Mymdz\Trustly
 */
class TrustlyServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider
     */
    public function register()
    {
        $this->app->alias(TrustlyContract::class, 'trustly');

        $this->app->singleton(TrustlyContract::class, function () {
            return new Trustly(
                config("services.trustly.login", null),
                config("services.trustly.password", null),
                config("services.trustly.private_key", null),
                config("services.trustly.sandbox", true)
            );
        });
    }
}