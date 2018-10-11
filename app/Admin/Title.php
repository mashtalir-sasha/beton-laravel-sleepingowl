<?php

use App\Title;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Title::class, function (ModelConfiguration $model) {

    $model->disableCreating();
    $model->disableDeleting();

    $model->setTitle('Заголовки');
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
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('subtitle', 'Подзаголовок')->required(),
            AdminFormElement::text('text', 'Текст')->required(),
        ]);
        return $form;
    });
})->addMenuPage(Title::class, 1)
    ->setIcon('fa fa-book');