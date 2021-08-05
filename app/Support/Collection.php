<?php
namespace App\Support;

use ArrayIterator;
use IteratorAggregate;

/**
 * Collection Class
 */
class Collection implements IteratorAggregate
{   
    /**
     * Initialize
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;    
    }

    /**
     * Storem items
     *
     * @var array
     */
    protected $items = [];

    /**
     * Get items
     *
     * @return array
     */
    public function get()
    {
        return $this->items;
    }

    /**
     * Get count items
     *
     * @return integer
     */
    public function count()
    {
        return count($this->items);
    }

    public function add(array $items)
    {
        $this->items = array_merge( $this->items, $items );
    }
    /**
     * Merge two collection
     *
     * @param Collection $collection
     * 
     * @return collection
     */
    public function merge(Collection $collection)
    {
       return $this->add($collection->get());
    }

    /**
     * Convert array to json data
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->items);
    }
    
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}