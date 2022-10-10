<?php

namespace App\Http\Services;

class ManipulateResponseService 
{

    /**
     * mutateBreedImageResponse a function that will
     * get data from the parameter and returns data which
     * contains only the image 
     */
    public function mutateBreedImageResponse(array $response){
        $result = array();
        foreach($response as &$data){
            if(isset($data->breeds[0]))
            {
                unset($data->breeds[0]->weight);
                unset($data->breeds[0]->height);
                $result[] = $this->unsettingData($data,false);
            }
            elseif(isset($data->categories[0]))
            {
                unset($data->categories);
            }
        }
        return $result;
    }
    /**
     * mutateResponse is a function that manipulate
     * the format of the given data from parameter
     */
    public function mutateResponse(array $response)
    {
        $result = array();
        foreach($response as &$data){
            if(isset($data->breeds[0]))
            {
                unset($data->breeds[0]->weight);
                unset($data->breeds[0]->height);
                $arrayData = $this->object_to_array($data->breeds[0]);
                $result[] = $arrayData + $this->unsettingData($data);
            }
            elseif(isset($data->categories[0]))
            {
                unset($data->categories);
            }
        }
        return $result;
    }
    /**
     * 
     */
    private static function object_to_array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = [];
            foreach ($data as $key => $value)
            {
                $result[$key] = (is_array($value) || is_object($value)) ? self::object_to_array($value) : $value;
            }
            return $result;
        }
        return $data;
    }
    private function unsettingData(object $data,bool $withImage = true)
    {
        unset($data->breeds);
        $arrayData = $this->object_to_array($data);
        if(!$withImage)
        {
            $result = array($arrayData);
        }
        else
        {
            $result = array('image' => $arrayData);
        }
        return $result;
    }
}