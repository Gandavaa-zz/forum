<?php
namespace Forum\Filters;

use Illuminate\Http\Request;

abstract class Filters
{
    /**
     * @var Request
     */
    protected $request, $builder;

    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        // dd($this->request->only($this->filters));

        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        
        return $this->builder;
    }
    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    private function getFilters()
    {
        // dd($this->filters);

         return array_filter($this->request->only($this->filters));
    }
    
  
}