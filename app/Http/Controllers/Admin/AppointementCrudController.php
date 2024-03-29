<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AppointementRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AppointementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AppointementCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Appointement::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/appointement');
        CRUD::setEntityNameStrings('appointement', 'appointements');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('patient_id')->type('enum')->options(\App\Models\Patient::all()->pluck('firstName', 'id')->toArray());
        CRUD::column('doctor_id')->type('enum')->options(\App\Models\Doctor::all()->pluck('firstName', 'id')->toArray());
        CRUD::column('appointement_date_time');
        CRUD::column('status');
        CRUD::column('reason_for_appointement');
        CRUD::column('notes');
        // change the name of edit button to validate
        // $this->crud->removeButton('update');
        $this->crud->addButtonFromView('line', 'validate', 'validate', 'end');

        // add button
        // CRUD::addButtonFromView('line', 'add_appointement', 'add_appointement', 'end');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AppointementRequest::class);

        CRUD::field('patient_id')->type('enum')->options(\App\Models\Patient::all()->pluck('firstName', 'id')->toArray());
        CRUD::field('doctor_id')->type('enum')->options(\App\Models\Doctor::all()->pluck('firstName', 'id')->toArray());
        CRUD::field('appointement_date_time');
        CRUD::field('status')->type('enum');
        CRUD::field('reason_for_appointement');
        CRUD::field('notes');

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
