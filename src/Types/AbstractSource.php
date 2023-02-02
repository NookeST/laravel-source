<?php

namespace Nookest\Source\Types;

use Illuminate\Http\Request;
use Nookest\Source\Source;

abstract class AbstractSource
{
    /**
     * Instance of request
     * 
     * @var Illuminate\Http\Request
    */
    protected $request;

    /**
     * @param Illuminate\Http\Request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get Source instance
     *  
     * @return Nookest\Source\Source|null
    */
    public function get()
    {
        if (! $this->isSourceType()) {
            return null;
        }

        return Source::create([
            'source' => $this->source(),
            'medium' => $this->medium(),
            'campaign' => $this->campaign(),
            'content' => $this->content(),
            'term' => $this->term()
        ]);
    }

    /**
     * Check if this type of traffic
     * 
     * @return boolean
    */
    abstract public function isSourceType();

    /**
     * Get traffic source
     * 
     * @return string
    */
    abstract protected function source();

    /**
     * Get marketing medium e.g. organic, cpc, banner, social, referral ...
     * 
     * @return string
    */
    abstract protected function medium();

    /**
     * Get name of the ad campaign. 
     * 
     * @return string
    */
    protected function campaign()
    {
        return null;
    }

    /**
     * Get additional information that helps identify the ad.
     * 
     * @return string
    */
    protected function content()
    {
        return null;
    }

    /**
     * Get keyword
     * 
     * @return string
     */
    protected function term()
    {
        return null;
    }

}