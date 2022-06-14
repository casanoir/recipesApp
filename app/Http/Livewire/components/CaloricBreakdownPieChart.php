<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class CaloricBreakdownPieChart extends Component
{
    // public $caloricBreakdownPieChartModel;
    public $percentProtein;
    public $percentFat;
    public $percentCarbs;
    
    // public function mount(){

    // //     $this->percentProtein = $this->data['percentProtein'];
    // //     $this->percentFat = $this->data['percentFat'];
    // //     $this->percentCarbs = $this->data['percentCarbs'];

       
    // }

    public function render()
    {
        $this->percentProtein = 30;
        $this->percentFat = 20;
        $this->percentCarbs = 50;
        
        $caloricBreakdownPieChartModel  = 
            (new PieChartModel ())
                ->setTitle('Caloric Breakdown')
                ->addSlice('Protein', $this->percentProtein, '#f6ad55')
                ->addSlice('Fat', $this->percentFat, '#fc8181')
                ->addSlice('Carbs', $this->percentCarbs, '#90cdf4')
            ;
            return view('livewire.components.caloric-breakdown-pie-chart')->with([
                'caloricBreakdownPieChartModel' => $caloricBreakdownPieChartModel
            ]);
    }
}



   

    
        // $this->caloricBreakdownPieChartModel  = 
        // (new PieChartModel ())
        //     ->setTitle('Caloric Breakdown')
        //     ->addSlice('Protein', $this->percentProtein, '#f6ad55')
        //     ->addSlice('Fat', $this->percentFat, '#fc8181')
        //     ->addSlice('Carbs', $this->percentCarbs, '#90cdf4')
        // ;
