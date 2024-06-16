<?php
use Gampil\Database\Table;

//DONT MODIFY FILE NAME

class user {
  public function on_create() {
    $table = new Table("user");
    $table->id()
      ->text("username")->not_null()->unique()
      ->text("password")->not_null()
      ->timestamp()
      ->create();
  }
}
