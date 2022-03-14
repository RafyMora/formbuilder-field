<?php

namespace RafyMora\FormbuilderField\Http\Controllers\Admin;


use Backpack\CRUD\app\Library\Widget;
use RafyMora\FormbuilderField\Models\Formbuilder;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use RafyMora\FormbuilderField\Http\Requests\FormbuilderRequest;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormbuilderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormbuilderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(config('formbuilder-field.model_form'));
        CRUD::setRoute(config('backpack.base.route_prefix') . '/formbuilder');
        CRUD::setEntityNameStrings(__('rafy-mora.formbuilder-field::formbuilder.labels.entity_form'), __('rafy-mora.formbuilder-field::formbuilder.labels.entities_form'));
        $this->crud->addButtonFromModelFunction('line', 'entries_list', 'entriesList', 'beginning');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // $widget_definition_array = [
        //     'type'         => 'alert',
        //     'class'        => 'alert alert-danger mb-2',
        //     'heading'      => 'Important information!',
        //     'content'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti nulla quas distinctio veritatis provident mollitia error fuga quis repellat, modi minima corporis similique, quaerat minus rerum dolorem asperiores, odit magnam.',
        //     'close_button' => true, // show close button or not
        // ];
        // Widget::add($widget_definition_array)->to('before_content');

        $this->crud->addColumns([
            [
                'name' => 'uniq_id',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.uuid')),
                'type' => 'text',
            ],
            [
                'name' => 'title',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.title')),
                'type' => 'text',
            ],
            [
                'name' => 'in_database',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.in_database')),
                'type' => 'check',
            ],
            [
                'name' => 'by_mail',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.by_mail')),
                'type' => 'check',
            ],
            [
                'name' => 'updated_at',
                'type' => 'datetime',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.updated_at'))
            ],
            [
                'name' => 'created_at',
                'type' => 'datetime',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.created_at'))
            ]
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(FormbuilderRequest::class);
        $this->crud->addFields([
            [
                'name' => 'title',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.title')),
                'type' => 'text',
            ],
            [
                'name' => 'intro',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.intro')),
                'type' => 'summernote',
                'options' => [
                    'toolbar' => [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['insert', ['link','hr']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ]
                ],
            ],
            [
                'name'       => 'uniq_id',
                'label'      => 'ID Unique',
                'default'    => uniqid(),
                'attributes' => [
                    'readonly' => 'readonly'
                ],
            ],
            // FORM BUILDER VIEW
            [
                'name' => 'form',
                'type' => 'form_builder',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.form')),
                'view_namespace' => 'rafy-mora.formbuilder-field::fields',
                'tab' => __('rafy-mora.formbuilder-field::formbuilder.labels.form_tab'),
                'hint' => __('rafy-mora.formbuilder-field::formbuilder.labels.hint_form')
            ],
            // CONFIG TABS
            [
                'name' => 'text_button',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.text_button')),
                'type' => 'text',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'default' => __('rafy-mora.formbuilder-field::formbuilder.labels.default_text_button'),
                'tab' => __('rafy-mora.formbuilder-field::formbuilder.labels.config_tab')
            ],
            [
                'name' => 'in_database',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.in_database')),
                'type' => 'select_from_array',
                'options' => __('rafy-mora.formbuilder-field::formbuilder.labels.bool'),
                'attributes' => [
                    'readonly'    => 'readonly'
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'tab' => __('rafy-mora.formbuilder-field::formbuilder.labels.config_tab')
            ],
            [
                'name' => 'by_mail',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.by_mail')),
                'type' => 'select_from_array',
                'options' => __('rafy-mora.formbuilder-field::formbuilder.labels.bool'),
                'attributes' => [
                    'readonly'    => 'readonly'
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'tab' => __('rafy-mora.formbuilder-field::formbuilder.labels.config_tab')
            ],
            [
                'name' => 'display_title',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.display_title')),
                'type' => 'select_from_array',
                'options' => __('rafy-mora.formbuilder-field::formbuilder.labels.bool'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'default'     => 1,
                'tab' => __('rafy-mora.formbuilder-field::formbuilder.labels.config_tab')
            ],
            [
                'name' => 'display_intro',
                'label' => ucfirst(__('rafy-mora.formbuilder-field::formbuilder.labels.display_intro')),
                'type' => 'select_from_array',
                'options' => __('rafy-mora.formbuilder-field::formbuilder.labels.bool'),
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'default'     => 1,
                'tab' => __('rafy-mora.formbuilder-field::formbuilder.labels.config_tab')
            ],
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
