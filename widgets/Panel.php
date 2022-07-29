<?php

namespace ramprasadm1986\gentelella\widgets;

use rmrevin\yii\fontawesome\component\Icon;
use yii\base\Widget;
use yii\bootstrap4\Nav;
use yii\helpers\Html;

class Panel extends Widget
{
    /**
     * @var array the configuration array for creating a [[Dropdown]] widget
     */
    public $tools = [];

    /**
     * @var array the HTML attributes for the widget container tag
     */
    public $options = ['class' => 'x_panel'];

    /**
     * @var string the panel header
     */
    public $header;

    /**
     * @var string the icon prefix
     */
    public $icon_prefix;
    
    /**
     * @var string the icon name
     */
    public $icon;

    /**
     * @var boolean whether the expand button is shown
     */
    public $expandable = false;

    /**
     * @var boolean whether the collapse button shown
     */
    public $collapsable = false;

    /**
     * @var boolean whether the remove button shown
     */
    public $removable = false;

    /**
     * @var array|string, optional, the configuration array for creating a [[Dropdown]] widget,
     *   or a string representing the dropdown menu.
     */
    public $headerMenu = [];
    
    
    public $buttons = [];

    /**
     * Init tool buttons
     */
    protected function initTools()
    {
        if ($this->expandable === true || $this->collapsable === true) {
            $this->tools[] = [
                'encode' => false,
                'label' => new Icon($this->icon_prefix,'chevron-' . ($this->expandable === true ? 'down' : 'up')),
                'linkOptions' => ['class' => 'collapse-link'],
                'url' => null,
            ];
        }
        if (empty($this->headerMenu) === false) {
            $this->tools[] = [
                'encode' => false,
                'items' => $this->headerMenu,
                'label' => new Icon($this->icon_prefix,'wrench'),
            ];
        }
        if ($this->removable === true) {
            $this->tools[] = [
                'encode' => false,
                'label' => new Icon($this->icon_prefix,$this->icon_prefix,'close'),
                'linkOptions' => ['class' => 'close-link'],
                'url' => null,
            ];
        }
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->options['id'] = $this->id;
        echo Html::beginTag('div', $this->options);
        if ($this->header !== null) {
            $this->initTools();
            echo Html::beginTag('div', ['class' => 'x_title']);
            echo Html::tag('h2', ($this->icon !== null ? new Icon($this->icon_prefix,$this->icon) . ' ' : '') . $this->header);
            if (empty($this->tools) === false) {
                echo Nav::widget(
                    [
                        'dropDownCaret' => '',
                        'items' => $this->tools,
                        'options' => [
                            'class' => 'nav navbar-right panel_toolbox',
                        ],
                    ]
                );
            }
            if (empty($this->buttons) === false) {
                echo Html::beginTag('div', ['class' => 'x_buttons float-right']);
                    foreach($this->buttons as $buttons)
                        echo $buttons;
                echo Html::endTag('div');
            }
            echo Html::tag('div', null, ['class' => 'clearfix']);
            echo Html::endTag('div');
        }
        echo Html::beginTag(
            'div',
            [
                'class' => 'x_content',
                'style' => $this->expandable === true ? 'display: none;' : null
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::endTag('div');
        echo Html::endTag('div');
        parent::run();
    }
}
