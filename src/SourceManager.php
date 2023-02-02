<?php

namespace Nookest\Source;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Nookest\Source\Types\AbstractSource;
use Nookest\Source\Types\TypeIn;

class SourceManager
{
    /**
     * The key that will be used to remember the source in the session.
     *
     * @var string
     */
    protected $sessionKey;

    /**
     * The sources type
     *
     * @var array
     */
    protected $sourcesType;

    /**
     * The session instance.
     *
     * @var \Illuminate\Contracts\Session\Session
     */
    protected $session;

    public function __construct(string $sessionKey, array $sources, Session $session)
    {
        $this->sessionKey = $sessionKey;
        $this->sourcesType = $sources;
        $this->session = $session;
        $this->sourcesType[] = \Nookest\Source\Types\TypeIn::class;
    }

    /**
     * Captures the source of traffic
     *
     * @var void
     */
    public function capture(Request $request)
    {
        $source = $this->determine($request);

        if (! empty($source)) {
            $this->put($source);
        }
    }

    /**
     * Determine which type of traffic
     * 
     * @return array
     */
    protected function determine(Request $request)
    {
        foreach ($this->sourcesType as $sourceType) {

            if (($source = (new $sourceType($request))->get()) !== null) {
                return $source;
            }
        }

        return null;
    }


    /**
     * Put source data in session
     * 
     * @return boolean
     */
    protected function put($source)
    {
        return $this->session->put($this->sessionKey, $source);
    }

    /**
     * Get source data
     * 
     * @return array|string|null
     */
    public function get()
    {
        return $this->session->get($this->sessionKey);
    }

}