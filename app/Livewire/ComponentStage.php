<?php

namespace App\Livewire;

use Livewire\Component;
use Symfony\Component\Yaml\Yaml;

class ComponentStage extends Component
{
    public $componentFile;
    public $componentLocation;
    public $yaml_file;
    public $yaml;
    public $attributeArray;
    public $attributeValues;
    public $size;
    public $options;

    public function mount(){
        $this->componentFile = request()->has('component') ? request()->get('component') : '';
        $this->yaml_file = file_get_contents(resource_path('views/components/studio/'.$this->componentFile.'.yml'));
        $this->yaml = Yaml::parse($this->yaml_file);
        $this->componentLocation = $this->yaml['component'];

        $this->fillDefaultAttributeValues();
        $this->loadAttributes($this->yaml);
        $this->generateOptions();
    }

    public function fillDefaultAttributeValues(){
        $this->attributeValues = [];
        foreach ($this->yaml['props'] as $prop => $details) {
            $this->attributeValues[$prop] = $details['default'];
        }
    }

    public function update(){
        // dd($this->attributeValues);
        // $this->fillDefaultAttributeValues();
        $this->loadAttributes($this->yaml);
    }

    public function updated($property, $value)
    {
        $this->loadAttributes(($this->yaml));
        // dd($property, $value);
    }

    public function generateOptions(){
        $this->options = '';
        foreach($this->yaml['props'] as $prop => $details) {
            if($details['type'] == 'text'){
                $this->options = <<<HTML
                    <input type="text" wire:model.blur="attributeValues.$prop" class="form-control" placeholder="{$prop}">
                HTML;

            }elseif($details['type'] == 'number'){
                $this->options = <<<HTML
                    <input type="number" wire:model="attributeValues.$prop" class="form-control" placeholder="{$prop}">
                HTML;
            }

            // if($details['type'] == 'select'){
            //     $this->options = <<<HTML
            //         <select wire:model="attributeValues.$prop" class="form-control">
            //             <option value="">Select {$prop}</option>
            //             <option value="small">Small</option>
            //             <option value="medium">Medium</option>
            //             <option value="large">Large</option>
            //         </select>
            //     HTML;
            // }
        }

        // $this->options = <<<HTML
        //     <label>
        //     <input type="text" wire:model.blur="attributeValues.size" class="form-control" placeholder="Size">
        // HTML;
    }

    public function loadAttributes($yaml){

        // Loop through the props and add them to the attributes array
        foreach ($yaml['props'] as $prop => $details) {
            $this->attributeArray[$prop] = $this->attributeValues[$prop];
        }

    }

    public function render()
    {
        return view('livewire.component-stage');
    }
}
