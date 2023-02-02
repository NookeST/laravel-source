<?php

namespace Nookest\Source\Types;

use Illuminate\Http\Request;
use Nookest\Source\Helpers\Url;

class Referral extends AbstractSource
{

    /**
     * Check if referrer is Social Network.
     * 
     * @return boolean
    */
    public function isSourceType()
    {
        $referer = $this->request->header('referer', '');

        if (empty($referer)) {
            return false;
        }

        $refererHost = Url::host($referer);

        if (empty($refererHost)) {
            return false;
        }

        if ($refererHost === $this->getHost()) {
            return false;
        }

        return true;
    }

    /**
     * Returns the host name.
     * 
     * @return string
    */
    protected function getHost()
    {
        return Url::host(
            $this->request->getSchemeAndHttpHost()
        );
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
        return 'referral';
    }

}