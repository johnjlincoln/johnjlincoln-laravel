<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * Since Heroku uses various internal load balancers for routing requests,
     * and since those load balancers always set X-Forwarded headers, we can
     * therefor trust all proxies.
     *
     * TODO: conditionally set trusted proxies based on Heroku environment detection.
     *
     * @var array|string
     */
    protected $proxies = '*';

    /**
     * The headers that should be used to detect proxies.
     *
     * Since we're deploying on Heroku, and since Heroku load balancers are
     * AWS Elastic Load Balancers, we will configure Laravel to use AWS header.
     *
     * TODO: conditionally set protected headers based on Heroku environment detection.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_AWS_ELB;
}
