<?php
namespace Shmelevdi\LifebitIdClientPhp;

use Shmelevdi\LifebitIdClientPhp\OpenID;

class LifebitID
{
    protected $openid;
    public function __construct(OpenID $openid)
    {
        $this->openid = $openid;
    }
}
