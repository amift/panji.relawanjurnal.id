<?php
/**
* by        : miftahul (a.k.a) amift 
* email     : miftahul81@gmail.com
* year      : 2018
*
*/
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('random_str')) {
    function random_str($complicated=false,$length = 16){
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($complicated==true){
            $pool.= '!@#$%^&*(){}[]<>';
        }
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}

if ( ! function_exists('db_date_format')) {
    function db_date_format($mydate){
        return date('Y-m-d',strtotime($mydate));
    }
}

if ( ! function_exists('human_date_format')) {
    function human_date_format($dbdate){
        return date('d-m-Y',strtotime($dbdate));
    }
}

if ( ! function_exists('create_slug')) {
    function create_slug($title){
        return url_title(strtolower($title));
    }
}

if ( ! function_exists('seal_it')) {
    function seal_it($data){
        return '\''.$data.'\'';
    }
}

if ( ! function_exists('limit_content')) {
    function limit_content($content = false, $limit = false, $stripTags = false, $ellipsis = false) 
    {
        if (strlen($content)<20){
            return $content;    
        }
        if ($content && $limit) {
            $content = ($stripTags ? strip_tags($content) : $content);
            $content = explode(' ', $content, $limit+1);
            array_pop($content);
            if ($ellipsis) {
                array_push($content, '...');
            }
            $content = implode(' ', $content);
        }
        return $content;
    }
}


if (! function_exists('create_id')){
    function create_id($prov_id,$number){
        $lenght_of_number=strlen($number);
        $char_o=str_repeat('0', 4-$lenght_of_number);
        $autonumber=$char_o.$number;
        $final_id='1616'.$prov_id.$autonumber;
        return $final_id;
    }
}

if ( ! function_exists('console_log')) {
    function console_log($output, $with_script_tags = true, $echo_it=true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG).');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        if ($echo_it==true) {
            echo $js_code;
        }else{
            return $js_code;
        }
    }
}

if ( ! function_exists('debugme')) {
    function debugme($param, $halt=FALSE, $caption=null) {
        echo "<pre>";
        if ($caption!=null) {
            echo $caption.' ';
        }
        print_r($param);
        echo "</pre>";
        if ($halt==TRUE) {
            die();
        }
    }
}

if ( ! function_exists('left')) {
    function left($text,$length){
      if ($length > strlen($text)) {
        $result='Error::length paramter to long';
      }elseif($length < 1) {
        $result='Error::length paramter less than 1';
      }else{
        $result=substr($text,0,$length);
      }
      return $result;
    }
}

if ( ! function_exists('right')) {
    function right($text,$length){
      if ($length > strlen($text)) {
        $result='Error::length paramter to long';
      }elseif($length < 1) {
        $result='Error::length paramter less than 1';
      }else{
        $result=substr($text,-$length);
      }
      return $result;
    }
}

if ( ! function_exists('mid')) {
    function mid($text,$start,$length){
      return substr($text,$start-1,$length);
    }
}


if ( ! function_exists('generate_tahun')) {
    function generate_tahun($long,$assoc=false,$year=null){
      $year_now=($year===null)?date('Y'):$year;

      $options = array();
      if ($assoc==false) {
        for ($i=0; $i < $long ; $i++) {
          $options[] = $year_now+($i-2);
        }
      }else{
        for ($i=0; $i < $long ; $i++) {
          $options[$year_now+($i-2)] = $year_now+($i-2);
        }
      }
      return $options;
    }
}