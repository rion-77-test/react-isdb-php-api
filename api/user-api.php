<?php

function getUsers()
{
    echo json_encode(User::getAll());
}

function getUserById($_id) {
    echo json_encode(User::getById($_id));
}
