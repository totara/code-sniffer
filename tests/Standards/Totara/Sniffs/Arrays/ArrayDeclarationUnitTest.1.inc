<?php
array($a, array($b)) = $array;

function test() {
    $a = array();

    $b = array ();

    $c = array (
        'a' => 1,
    );
}

class test_class {
    public $good = array(
        'width'  => '',
        'height' => '',
    );

    private $bad = array (
        'width' => '',
        'height' => ''
    );

    public function test() {
        $truck = array(
            'width' => '',
            'height' => '',
        );

        $plane = array (
            'width' => '',
            'height' => '',
        );

        $inline = array('aaa', 'bbb', 'ccc');
        $inline = array('aaa','bbb', 'ccc');
        $inline = array('aaa','bbb','ccc');
        $inline = array('aaa','bbb',  'ccc');
    }

}

$value = array ( );
$value = array(  );
$value = array('1'=>$one, '2'  =>  $two, '3'=> $three, '4' =>$four);
$value = array('1'=>$one);

if (in_array('1', array('1','2','3')) === TRUE) {
    $value = in_array('1', array('1'  ,   '2',     '3','4'));
}

$value = array('1','2','3');

