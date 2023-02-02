<?php

namespace Nookest\Source;

use Closure;

class CaptureSource
{
    /**
     * The source instance.
     * 
     * @var Nookest\Source\SourceManager
     */
    protected $sourceManager;

    public function __construct(SourceManager $sourceManager)
    {
        $this->sourceManager = $sourceManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->sourceManager->capture($request);
        
        return $next($request);
    }
}
