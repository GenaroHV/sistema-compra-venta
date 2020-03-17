<?php
function setActivarLink($nombre){
    return request()->is($nombre) ? 'active' : '';
}

function setActivarMenu($nombre){
    return request()->is($nombre) ? 'menu-open' : '';
}