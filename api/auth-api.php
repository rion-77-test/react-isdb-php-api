<?php
function checkLogin($_data)
{
    // echo json_encode($_data);
    echo json_encode(Auth::login($_data['email'], $_data['password']));
}
