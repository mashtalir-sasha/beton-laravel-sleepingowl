<?php

use App\Gallery;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Gallery::class, function (ModelConfiguration $model) {

    $model->disableCreating();
    $model->disableDeleting();

    $model->setTitle('Галерея');
    $model->onDisplay(function () {
        $display = AdminDisplay::table()->setColumns([
            AdminColumn::text('name')->setLabel('Имя'),
            AdminColumn::text('updated_at')->setLabel('Дата изменения'),
        ]);
        return $display;
    });

    $model->onCreateAndEdit(function () {

        $form = AdminForm::panel();

        $form->addBody([
            AdminFormElement::images('images', 'Фотографии галереи'),
        ]);
        return $form;
    });
})->addMenuPage(Gallery::class, 3)
    ->setIcon('fa fa-image');