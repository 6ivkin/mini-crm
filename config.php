<?php

function tt($str)
{
    echo "<pre>";
    print_r($str);
    echo "</pre>";
}

function tte($str)
{
    echo "<pre>";
    print_r($str);
    echo "</pre>";
    exit();
}

//config.php
const APP_BASE_PATH = 'mini_crm';

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'crm_test';

const START_ROLE = 1;