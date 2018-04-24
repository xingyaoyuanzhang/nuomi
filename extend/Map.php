<?php

class Map{
	//http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=35.658651,139.745415&output=json&pois=1&ak=您的ak //GET请求
	public static function getLngLat($address){
		if(!$address){
			return '';
		}
		$data = [
			'address' => $address,
			'ak' => config('map.ak'),
			'output' => 'json',
		];	
		$url = config('map.baidu_map_url').config('map.geocoder').'?'.http_build_query($data);
		$result = doCurl($url);
		// var_dump($result);exit;
		return $result;
	}
	//http://api.map.baidu.com/staticimage/v2
	public static function staticimage($center){
		if(!$center){
			return '';
		}
		$data = [
			'ak' => config('map.ak'),
			'width' => config('map.width'),	
			'height' => config('map.height'),
			'center' => $center,
			'markers' => $center,	
		];
		$url = config('map.baidu_map_url').config('map.staticimage').'?'.http_build_query($data);
		$result = doCurl($url);
		// var_dump($result);exit;
		return $result;
	}

}