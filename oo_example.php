<?php

$wall_post = array(
  'text' => 'Hello, world!',
  'from' => 'Thereza',
);

$wall_post_2 = array(
  'text' => 'Hey, love!',
  'from' => 'Adrian',
);

$wall_post_3 = array(
  'text' => '<3 <3 <3',
  'from' => 'Thereza',
);

function print_wall_post($post) {
  echo $post['from'].": ".$post['text']."\n";
} 

print_wall_post($wall_post);
print_wall_post($wall_post_2);
print_wall_post($wall_post_3);

/*
 * Object-oriented...
 *
 */

class WallPost {

  private $from;
  private $text;

  function __construct($from, $text) {
    $this->from = $from;
    $this->text = $text;
  }

  function __toString() {
    return $this->from.": ".$this->text;
  }

}

$wall_post = new WallPost('Thereza','Hello, worlds!');
$wall_post_2 = new WallPost('Adrian','Hey, love!');
$wall_post_3 = new WallPost('Thereza','<3 <3 <3');

echo $wall_post->__toString()."\n";
echo $wall_post_2."\n";
echo $wall_post_3."\n";

