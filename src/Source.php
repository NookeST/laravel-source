<?php

namespace Nookest\Source;

class Source
{
    /**
     * Traffic source
     * 
     * @var string
    */
    public $source;

    /**
     * Traffic medium
     * 
     * @var string
    */
    public $medium;

    /**
     * Traffic campaign
     * 
     * @var string
    */
    public $campaign;

    /**
     * Traffic content
     * 
     * @var string
    */
    public $content;

    /**
     * Traffic term
     * 
     * @var string
    */
    public $term;

    /**
     * Create instance
     * 
     * @return self
    */
    public static function create(array $attributes)
    {
        $source = new self;

        foreach ($attributes as $key => $value) {
            if (property_exists($source, $key)) {
                $source->$key = $value;
            }
        }

        return $source;
    }

    /**
     * Get all source parameters
     * 
     * @return array
    */
    public function all()
    {
        return $this->toArray();
    }

    /**
     * Get a subset source parameters
     * 
     * @param  array|mixed  $keys
     * @return array
    */
    public function only($keys)
    {
        return array_intersect_key($this->all(), is_array($keys) ? $keys : func_get_args());
    }

    /**
     * Convert instance to array
     * 
     * @return array
    */
    public function toArray()
    {
        return (array) $this;
    }

    /**
     * Convert instance to JSON.
     *
     * @param  int  $options
     * @return string
     *
     * @throws \Illuminate\Database\Eloquent\JsonEncodingException
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->toArray(), $options);

/*        if (JSON_ERROR_NONE !== json_last_error()) {
            throw JsonEncodingException::forModel($this, json_last_error_msg());
        }*/

        return $json;
    }
}
