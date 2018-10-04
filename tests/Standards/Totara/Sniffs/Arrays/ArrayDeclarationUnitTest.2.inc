<?php
[$a, [$b]] = $array;

function test() {
    $a = [];

    $b = [];

    $c = [
        'a' => 1,
    ];
}

class test_class {
    public $good = [
        'width'  => '',
        'height' => '',
    ];

    public function test() {
        $truck = [
            'width' => '',
            'height' => '',
        ];

        $inline = ['aaa', 'bbb', 'ccc'];
        $inline = ['aaa','bbb', 'ccc'];
        $inline = ['aaa','bbb','ccc'];
        $inline = ['aaa','bbb',  'ccc'];
    }

}

$value = ['1'=>$one, '2'  =>  $two, '3'=> $three, '4' =>$four];
$value = ['1'=>$one];

if (in_array('1', ['1','2','3']) === TRUE) {
    $value = in_array('1', ['1'  ,   '2',     '3','4']);
}

$value = ['1','2','3'];
