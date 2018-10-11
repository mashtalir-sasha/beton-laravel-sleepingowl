<?php

Route::get('', ['as' => 'admin.dashboard', function () {
    $content = 'Выберите необходимый раздел';
    return AdminSection::view($content, 'Главная');
}]);