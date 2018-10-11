<?php

use App\Categories;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Categories::class, function (ModelConfiguration $model) {

    $model->setTitle('Категории товаров');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('id')->setLabel('#'),
            AdminColumn::text('name')->setLabel('Название'),
            AdminColumn::image('image')->setLabel('Изображение')->setWidth('180px'),
            AdminColumn::text('created_at')->setLabel('Дата создания'),
            AdminColumn::text('updated_at')->setLabel('Дата изменения'),
        ]);
        $display->setApply(function ($query) {
            $query->orderBy('id', 'asc');
        });
        $display->paginate(25);
        return $display;
    });

    $model->onCreateAndEdit(function () {

        $form = AdminForm::panel();

        $form->addBody([
            AdminFormElement::text('name', 'Название')->required()->unique(),
            AdminFormElement::image('image', 'Главное изображение')->required(),
            AdminFormElement::file('file', 'Изображение 360 (gif)')->required(),
            AdminFormElement::text('link', 'Ссылка на прайс-лист')->required(),
        ]);
        return $form;
    });
})->addMenuPage(Categories::class, 4)
    ->setIcon('fa fa-shopping-cart');