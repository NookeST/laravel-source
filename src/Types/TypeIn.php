<?php

namespace Nookest\Source\Types;

class TypeIn extends AbstractSource
{
    /**
     * Check if referrer is type in traffic.
     * 
     * @return boolean
    */
    public function isSourceType()
    {
        return ! $this->request->session()->has(config('source.session_key'));
    }
    
    /**
     * Get traffic source
     * 
     * @return string
    */
    protected function source()
    {
        return 'direct';
    }

    /**
     * Get marketing medium
     * 
     * @return string
     */
    protected function medium()
    {
        return null;
    }

}