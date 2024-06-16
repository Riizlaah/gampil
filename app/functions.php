<?php

use Gampil\App\Container;
use Gampil\Utils\SessionManager;
use Gampil\Utils\CSRFToken;
use Gampil\Utils\Flasher;

# jika kamu paham tentang apa yang kamu ubah, maka ubahlah, jika tidak jangan.
function handle_err_init() {
  set_error_handler("handle_err");
}

function handle_err($errno, $errmsg, $errfile, $errline) {
  unset($errno, $errfile, $errline);
  $handler = new \Gampil\App\ExceptionHandler($errmsg);
}

function session($key = null, $val = null) {
  if(!is_null($key) and !is_null($val) and !SessionManager::has($key)) return SessionManager::set($key, $val);
  if(is_null($key)) return new SessionManager;
  return SessionManager::get($key);
}

function flash($name) {
  return Flasher::flash($name);
}

function conf($key, $default = null) {
  return (Container::has_config($key)) ? Container::get_config($key) : $default;
}

function redirect($to = '') {
  if(empty($to)) $to = $_SERVER['HTTP_REFERER'] ?? env('BASE_URL');
  if(str_starts_with($to, '/')) $to = env('BASE_URL').$to;
  header("Location: $to");
  die;
}

function homepage() {
  redirect(env('BASE_URL'));
}


function error($all = false, $raw = false) {
  if(!session()->has('err')) return '';
  $err = session('err');
  $err_msg = '';
  $err_messages = conf('err_msg');
  $first = array_key_first($err);
  if($raw == true and $all == true) return $err;
  if($raw == true and $all == false) return $err[$first];
  if($all == false) {
    $first_err = $err[$first];
    foreach($first_err as $err_info) {
      $format = [$first] + $err_info;
      $err_msg .= vsprintf($err_messages[$err_info[0]] . " dan ", $format);
    }
    $err_msg = preg_replace("/ dan $/", '', $err_msg);
    return $err_msg;
  }
  $err_arr = [];
  foreach($err as $field => $field_errors) {
    $err_msg = '';
    foreach($field_errors as $err_info) {
      $format = [$field] + $err_info;
      $err_msg .= vsprintf($err_messages[$err_info[0]] . " dan ", $format);
    }
    $err_msg = preg_replace("/ dan $/", '', $err_msg);
    $err_arr[] = $err_msg;
  }
  return $err_arr;
}

function has_err($name) {
  return isset($_SESSION['err'][$name]);
}

function prev_input($name) {
  return $_SESSION['prev_input'][$name] ?? '';
}

function htag($name, $attr = '', $inner_text = '') {
  $element = "<$name ";
  if(is_string($attr)) $element .= $attr;
  elseif(is_array($attr)) {
    foreach($attr as $attr_name => $attr_value) {
      $element .= "$attr_name=\"$attr_value\"";
    }
  } else {
    trigger_error("datatype '".gettype($attr)."' is not supported for attribute, supported datatype for attribute : string, array(associative)");
  }
  $element .= (!empty($inner_text)) ? ">$inner_text</$name>" : ">";
  return $element;
}

function csrf_token() {
  return CSRFToken::csrf();
}

function time_diff($datetime, $full = false) {
  $now = new DateTime();
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);
  $string = [
    'y' => 'tahun',
    'm' => 'bulan',
    'd' => 'hari',
    'h' => 'jam',
    'i' => 'menit',
    's' => 'detik',
  ];
  $result = [];
  foreach($string as $k => $v) {
    if($diff->$k) $result[$k] = $diff->$k.' '.$v;
  }
  if(isset($result['d']) and $diff->d >= 7) {
    $weeks = floor($diff->d / 7);
    $days = $diff->d % 7;
    $result['w'] = $weeks.' minggu';
    $result['d'] = $days.' hari';
    if($days == 0) unset($result['d']);
  }
  if(!$full) $result = array_slice($result, 0, 1);
  return $result ? implode(', ', $result).' yang lalu' : 'baru saja';#edit disini jika perlu
}

function env($name, $value = null) {
  if($value === null) return getenv($name);
  putenv("$name=$value");
  return $value;
}

?>
