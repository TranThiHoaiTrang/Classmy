<?php namespace Tranthihoaitrang\Classmy\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Tranthihoaitrang\Classmy\Models\Classmy;

use Illuminate\Support\MessageBag as MessageBag;

class classValidator extends FooValidator
{

    protected $obj_class;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'Classmy_name' => ["required"],
            'Classmy_overview' => ["required"],
            'Classmy_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_class = new Classmy();

        // language
        $this->lang_front = 'Classmy-front';
        $this->lang_admin = 'Classmy-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'Classmy_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'Classmy_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'Classmy_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
            ];
        });


    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
        $this->errors = $this->errors ? $this->errors : new MessageBag();

        //Check length
        $_ln = self::$configs['length'];

        $params = [
            'name' => [
                'key' => 'Classmy_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['Classmy_name']['min'],
                'max' => $_ln['Classmy_name']['max'],
            ],
            'overview' => [
                'key' => 'Classmy_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['Classmy_overview']['min'],
                'max' => $_ln['Classmy_overview']['max'],
            ],
            'description' => [
                'key' => 'Classmy_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['Classmy_description']['min'],
                'max' => $_ln['Classmy_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['Classmy_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['Classmy_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['Classmy_description'], $params['description']) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('Classmy');
        return $configs;
    }

}