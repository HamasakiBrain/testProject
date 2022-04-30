<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    //


    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function upload(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:csv'
        ]);
        $file = $request->file('file');
        $data = $this->getCSV($file);
        unset($data[0]);
        $this->uploadDB($data); // Загружаем в бд
        return redirect()->route('show');
    }
    public function uploadAPI(Request $request){
        $validate = Validator::make($request->all(), [
            'fileAPI' => 'required|mimes:csv'
        ]);
        if ($validate->fails()){
            return response(['message' => 'Выберите обязательный файл в формате CSV']);
        }
        $data = $this->getCSV($request->file('fileAPI'));
        $dataSet = $this->uploadDB($data);
        return response(['message' => 'Файл успешно загружен', 'status'=> 200]);
    }
    /**
     * @param $data
     * @return array
     */
    public function uploadDB($data){
        $dataSet = [];
        foreach ($data as $d) {
            $dataSet[] = [
                'code'  => $d[0],
                'name'  => $d[1],
                'level1' => $d[2],
                'level2' => $d[3],
                'level3' => $d[4],
                'price' => $d[5],
                'priceCP' => str_replace('"', "", $d[6]),
                'count' => $d[7],
                'properties' => str_replace('"', '', $d[8]),
                'joint' => $d[9],
                'unit' => str_replace('"', '', $d[10]),
                'image' => $d[11],
                'showMain' => $d[12],
                'description' => $d[13],
            ];
        }
        product::insert($dataSet);
        return $dataSet;
    }

    /**
     * @return Application|Factory|View
     */
    public function show(){
        $products = product::all();
        return view('show')->with(['products' => $products]);
    }

    /**
     * @param $file
     * @return array
     */
    public function getCSV($file): array
    {
        $handle = fopen($file, "r"); //Открываем csv для чтения

        $array_line_full = array();

        while (($line = fgetcsv($handle, 0, "\t")) !== FALSE) {
            $array_line_full[] = str_getcsv($line[0], ';');
        }
        fclose($handle);

        return $array_line_full;
    }
}
