<?php

function setFromIndices(&$data, $field, $values)
{
        $result = 0;
        foreach ($values as $key => $v) {
                $result |= 1 << $v;
        }
        $data[$field] = $result;
}

function getIndices($value)
{
        $result = [];
        for ($i = 0; $i < 32; $i++) {
                if ($value & (1 << $i)) {
                        $result[] = $i;
                }
        }
        return $result;
}


$data = array();
$values = array(1, 5, 6);

setFromIndices($data, 'test', $values);

var_dump($data);

$values = getIndices($data['test']);
var_dump($values);
