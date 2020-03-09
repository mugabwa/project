<?php
$array = ['good','banana','cherry','apple'];
$arrayObject = new ArrayObject($array);
$iterator = $arrayObject->getIterator();
for ($iterator; $iterator->valid(); $iterator->next()){
    echo $iterator->current()."</br>";
}