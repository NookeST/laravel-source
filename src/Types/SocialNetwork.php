<?php

namespace Nookest\Source\Types;

use Illuminate\Http\Request;
use Nookest\Source\Helpers\Url;

class SocialNetwork extends AbstractSource
{

    /**
     * List of social networks
     * 
     * @var array
    */
    protected $socialNetworks;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->socialNetworks = config('source.social_networks');
    }

    /**
     * Check if referrer is Social Network.
     * 
     * @return boolean
    */
    public function isSourceType()
    {
        $host = Url::host(
            $this->request->header('referer', '')
        );

        return in_array($host, $this->socialNetworks);
    }
    
    /**
     * Get traffic source
     * 
     * @return string
    */
    public function source()
    {
        return Url::host(
            $this->request->header('referer', '')
        );
    }

    /**
     * Get marketing medium
     * 
     * @return string
     */
    public function medium()
    {
        return 'social';
    }

}