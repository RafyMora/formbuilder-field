<?php

namespace RafyMora\FormbuilderField\Http\Controllers\Admin;


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
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Formbuilder::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/formbuilder');
        CRUD::setEntityNameStrings('formbuilder', 'formbuilders');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'type' => 'text',
            ],
            [
                'name' => 'form',
                'type' => 'text',
            ],
            [
                'name' => 'in_database',
                'type' => 'text',
            ],
            [
                'name' => 'by_mail',
                'type' => 'text',
            ],
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
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'type' => 'textarea',
            ],
            [
                'name' => 'form',
                'type' => 'form_builder',
                'view_namespace' => 'rafy-mora.formbuilder-field::fields',
                'tab' => __('rafy-mora.formbuilder-field::formbuilder.form_tabs')
            ],
            [
                'name' => 'in_database',
                'type' => 'boolean',
            ],
            [
                'name' => 'by_mail',
                'type' => 'boolean',
            ],
        ]);
        

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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
