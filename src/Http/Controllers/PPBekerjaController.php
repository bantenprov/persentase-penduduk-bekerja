<?php namespace Bantenprov\PPBekerja\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PPBekerja\Facades\PPBekerja;

/* Models */
use Bantenprov\PPBekerja\Models\Bantenprov\PPBekerja\PPBekerja as PdrbModel;
use Bantenprov\PPBekerja\Models\Bantenprov\PPBekerja\Province;
use Bantenprov\PPBekerja\Models\Bantenprov\PPBekerja\Regency;

/* etc */
use Validator;

/**
 * The PPBekerjaController class.
 *
 * @package Bantenprov\PPBekerja
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PPBekerjaController extends Controller
{

    protected $province;

    protected $regency;

    protected $pp_bekerja;

    public function __construct(Regency $regency, Province $province, PdrbModel $pp_bekerja)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->pp_bekerja     = $pp_bekerja;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $pp_bekerja = $this->pp-bekerja->find($id);

        return response()->json([
            'negara'    => $pp-bekerja->negara,
            'province'  => $pp-bekerja->getProvince->name,
            'regencies' => $pp-bekerja->getRegency->name,
            'tahun'     => $pp-bekerja->tahun,
            'data'      => $pp-bekerja->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->pp-bekerja->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->pp-bekerja->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

