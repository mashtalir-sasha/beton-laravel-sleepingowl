<?php

use App\Contacts;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Contacts::class, function (ModelConfiguration $model) {

    $model->disableCreating();
    $model->disableDeleting();

    $model->setTitle('Контакты');
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
            AdminFormElement::columns()
                ->addColumn(function () {
                    return [
                        AdminFormElement::text('addr', 'Адрес')->required(),
                        AdminFormElement::text('mail', 'Email')->required(),
                        AdminFormElement::text('facebook', 'FaceBook'),
                        AdminFormElement::text('youtube', 'YouTube'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::text('phone1', 'Телефон')->required(),
                        AdminFormElement::text('phone1_call', 'Телефон 1 для ссылки')->required(),
                        AdminFormElement::text('phone2', 'Телефон 2'),
                        AdminFormElement::text('phone2_call', 'Телефон 2 для ссылки'),
                        AdminFormElement::text('phone3', 'Телефон 3'),
                        AdminFormElement::text('phone3_call', 'Телефон 3 для ссылки'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::text('coord1', 'Долгота')->required(),
                        AdminFormElement::text('coord2', 'Широта')->required()
                    ];
                }),
        ]);
        return $form;
    });
})->addMenuPage(Contacts::class, 2)
    ->setIcon('fa fa-info');