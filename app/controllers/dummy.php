<?php
use Gampil\App\Controller;

class dummy extends Controller {
  public function home() {
    $this->view('home');
  }
}
