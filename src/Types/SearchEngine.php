<?php

namespace Nookest\Source\Types;

use Illuminate\Http\Request;
use Nookest\Source\Helpers\Url;

class SearchEngine extends AbstractSource
{

    /**
     * List of SearchEngines
     * 
     * @var array
    */
    protected $searchEngines;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->searchEngines = config('source.search_engines');
    }

    /**
     * Check if referrer is Search Engine.
     * 
     * @return boolean
    */
    public function isSourceType()
    {
    	$host = Url::host(
    		$this->request->header('referer', '')
    	);

        return in_array($host, $this->searchEngines);
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
        return 'organic';
    }

}