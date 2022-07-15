<?php

namespace App\Http\Controllers\Admin;

use XmlParser;
use Carbon\Carbon;
use App\Models\Mark;
use App\Models\Color;
use App\Models\BodyType;
use App\Models\CarModel;
use App\Models\GearType;
use App\Models\EngineType;
use App\Models\Generation;
use App\Models\Transmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function index()
    {
        $cars = CarModel::with([
            'mark',
            'generation',
            'color',
            'bodyType',
            'engineType',
            'gearType',
            'transmission',
        ])->get();
        return view('admin.parser.index', [
            'cars' => $cars,
        ]);
    }
    public function xmlParse(Request $request)
    {
        $xml = XmlParser::load($request->file('xml'));
        $data = $xml->parse([
            'offers' => [
                'uses' => 'offers.offer[id,mark,model,generation,year,run,color,body-type,engine-type,transmission,gear-type,generation_id]'
                        ]
        ]);
        
        $timeToDie = Carbon::now();

        foreach ($data['offers'] as $car) {
            if ($car['mark']) {
                $mark = Mark::updateOrCreate(['mark' => $car['mark']]);
            }

            if ($mark && $car['generation_id']) {
                $generation = Generation::updateOrCreate(
                    ['id' => $car['generation_id']],
                    ['generation' => $car['generation'], 'mark_id' => $mark->id]
                );
            }

            if ($car['color']) {
                $color = Color::updateOrCreate(['color' => $car['color']]);
            }

            if ($car['body-type']) {
                $bodyType = BodyType::updateOrCreate(['body_type' => $car['body-type']]);
            }

            if ($car['engine-type']) {
                $engineType = EngineType::updateOrCreate(['engine_type' => $car['engine-type']]);
            }

            if ($car['gear-type']) {
                $gearType = GearType::updateOrCreate(['gear_type' => $car['gear-type']]);
            }

            if ($car['transmission']) {
                $transmission = Transmission::updateOrCreate(['transmission' => $car['transmission']]);
            }

            if ($mark) {
                $carModel = CarModel::updateOrCreate(['id' => $car['id']],
                                                    [
                                                        'car_model' => $car['model'],
                                                        'year' => $car['year'],
                                                        'run' => $car['run'],
                                                        'mark_id' => $mark->id,
                                                        'generation_id' => $car['generation_id'],
                                                        'color_id' => $color->id,
                                                        'body_type_id' => $bodyType->id,
                                                        'engine_type_id' => $engineType->id,
                                                        'gear_type_id' => $gearType->id,
                                                        'transmission_id' => $transmission->id,
                                                    ]
                                                    );
            }
        }

        CarModel::where('updated_at', '<', $timeToDie)->delete();

        $cars = CarModel::with([
                                'mark',
                                'generation',
                                'color',
                                'bodyType',
                                'engineType',
                                'gearType',
                                'transmission',
                            ])
                            ->get();
        return view('admin.parser.index', [
            'cars' => $cars,
        ]);
    }
}
