<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Widget;

use Gm;
use Gm\Panel\Widget\Form;

/**
 * Виджет для формирования интерфейса окна редактирования настроек служб.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Widget
 * @since 1.0
 */
class ServiceWindow extends \Gm\Panel\Widget\EditWindow
{
    /**
     * Параметры службы из Унифицированного конфигуратора.
     * 
     * @var array|null
     */
    public ?array $unified = [];

    /**
     * Служба.
     * 
     * @var \Gm\Stdlib\Service
     */
    public \Gm\Stdlib\Service $service;

    /**
     * {@inheritdoc}
     */
    public array $passParams = ['service', 'unified'];

    /**
     * {@inheritdoc}
     */
    protected function init(): void
    {
        parent::init();

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $this->xtype = 'g-window';
        $this->id = $this->creator->viewId('window');
        $this->cls = 'g-window_profile';
        $this->title = sprintf(
            '%s <span>%s</span>', $this->creator->t('{name}'), $this->creator->t('{description}')
        );
        $this->titleTpl = $this->title;
        $this->icon = $this->creator->getIconUrl();
        $this->layout = 'fit';
        $this->ui = 'install';
        $this->resizable = false;

        // панель формы (Gm.view.form.Panel GmJS)
        $this->form->bodyPadding = 5;
        $this->form->router->setAll([
            'route' => $this->creator->route('/form'),
            'state' => Form::STATE_UPDATE,
            'rules' => [
                'submit' => '{route}/data/{id}',
                'update' => '{route}/update/{id}'
            ]
        ]);
        $this->form->setStateButtons(Form::STATE_UPDATE, ['help', 'save', 'cancel']);
        $this->form->items = $this->formItems();
    }

    /**
     * Возвращает поля формы.
     * 
     * @return array<int, mixed>
     */
    protected function formItems(): array
    {
        return [];
    }
}
