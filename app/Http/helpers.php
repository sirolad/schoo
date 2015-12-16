<?php

function getSection($section)
{
    $getStates = ["Computer Science" => "Computer Science", "Software Development" => "Software Development", "Personal Development" => "Personal Development", "Languages" => "Languages", "General Knowlegde" => "General Knowlegde"];
    if (array_key_exists($section, $States)) {
        unset($States[$section]);
        foreach ($States as $key => $value) {
            echo "<option value='{$value}'>{$value}</option>";
        }
    }
}