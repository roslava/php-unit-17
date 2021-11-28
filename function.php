<?php

function t2()
{
    $query = "SELECT * FROM cars";
    return select($query);
}

function t3()
{
    $query = "SELECT * FROM cars WHERE cost>100000";
    return select($query);
}

function t4()
{
    $query = "SELECT cars FROM cars";
    $multi_arr = select($query);
    $result_arr = [];
    foreach ($multi_arr as $string) {
        $result_arr[] = $string['cars'];
    }
    return $result_arr;
}

function t5()
{
    $query = "INSERT INTO cars (cars, image, cost) VALUES ('Cadillac Escalade Platinum','http://elite.cars.ua/img/upload/cache/zc-1_iar-1_h-357_w-570_5ecd1aa8a55af0_68546755.jpg',47777)";
    return execQuery($query);
}


function t6()
{
    $query = "UPDATE cars SET cars='Cadillac Escalade', cost=47500 WHERE cars = 'Cadillac Escalade Platinum'";
    return execQuery($query);
}

function t7()
{
    $query = "SELECT * FROM cars WHERE cost >=100000 AND cost <=200000";
    $multi_arr = select($query);
    foreach ($multi_arr as $string) {
        $newCost = $string['cost'] - 2800;
        $currentId = $string['id'];
        $query_ = "UPDATE cars SET cost = $newCost WHERE id = $currentId";
        execQuery($query_);
    }
    return select($query);
}

function t8()
{
    $query = "SELECT cost FROM cars";
    $cost_arr = select($query);
    $sum = 0;
    foreach ($cost_arr as $cur_cost) {
        $sum += $cur_cost['cost'];
    }
    return $sum;
}

function t9()
{
    $query = "SELECT cars, cost FROM cars";
    $cost_arr = select($query);
    $data_array = [];
    foreach ($cost_arr as $item) {
        $data_array[$item['cars']] = $item['cost'];
    }
    return $data_array;
}

function t10()
{
    $query = "DELETE FROM cars WHERE cars = 'Cadillac Escalade'";
    return execQuery($query);
}