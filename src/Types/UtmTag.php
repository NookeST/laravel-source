<?php

namespace Nookest\Source\Types;

use Illuminate\Http\Request;

/**
 * The traffic parameters from UTM tags
 * 
 * @see https://support.google.com/analytics/answer/1033863?hl=en&ref_topic=1032998#parameters  More about UTM tags
*/
class UtmTag extends AbstractSource
{  
    /**
     * Check if in url has UTM tags
     * 
     * @return boolean
    */
    public function isSourceType()
    {
    	return $this->request->has('utm_source');
    }
    
    /**
     * Get traffic source
     * 
     * @return string
    */
    protected function source()
    {
    	return $this->request->query('utm_source');
    }
    
    /**
     * Get marketing medium.
     * 
     * @return string
    */
    protected function medium()
    {
    	return $this->request->query('utm_medium');
    }

    /**
     * Get name of the ad campaign.
     * 
     * @return string
    */
    protected function campaign()
    {
    	return $this->request->query('utm_campaign');
    }

    /**
     * Get additional information that helps identify the ad.
     * 
     * @return string
    */
    protected function content()
    {
    	return $this->request->query('utm_content');
    }

    /**
     * Get search keywords
     * 
     * @return string
     */
    protected function term()
    {
    	return $this->request->query('utm_term');
    }

}