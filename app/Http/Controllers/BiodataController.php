<?php

namespace App\Http\Controllers;

use App\Http\Requests\Biodata\BiodataCreateRequest;
use App\Http\Requests\Biodata\BiodataEditRequest;
use Illuminate\Http\Request;
use App\Domain\Contracts\BiodataInterface;

class BiodataController extends Controller
{

    /**
     * @var BiodataInterface
     */
    protected $biodata;

    /**
     * BiodataController constructor.
     * @param BiodataInterface $biodata
     */
    public function __construct(BiodataInterface $biodata)
    {
        $this->biodata = $biodata;
    }

    /**
     * @api {get} api/biodatas Request Biodata with Paginate
     * @apiName GetBiodataWithPaginate
     * @apiGroup Biodata
     *
     * @apiParam {Number} page Paginate biodata lists
     */
    public function index(Request $request)
    {
        return $this->biodata->paginate(10, $request->input('page'), $column = ['*'], '', $request->input('search'));
    }

    /**
     * @api {get} api/biodatas/id Request Get Biodata
     * @apiName GetBiodata
     * @apiGroup Biodata
     *
     * @apiParam {Number} id id_biodata
     * @apiSuccess {Number} id id_biodata
     * @apiSuccess {Varchar} name name of biodata
     * @apiSuccess {Varchar} address name of address
     * @apiSuccess {Varchar} email email of biodata
     * @apiSuccess {Number} phone phone of biodata
     */
    public function show($id)
    {
        return $this->biodata->findById($id);
    }

    /**
     * @api {post} api/biodatas/ Request Post Biodata
     * @apiName PostBiodata
     * @apiGroup Biodata
     *
     *
     * @apiParam {Varchar} name name of biodata
     * @apiParam {Varchar} email email of biodata
     * @apiParam {Varchar} address email of address
     * @apiParam {Float} phone phone of biodata
     * @apiSuccess {Number} id id of biodata
     */
    public function store(BiodataCreateRequest $request)
    {
        return $this->biodata->create($request->all());
    }

    /**
     * @api {put} api/biodatas/id Request Update Biodata by ID
     * @apiName UpdateBiodataByID
     * @apiGroup Biodata
     *
     *
     * @apiParam {Varchar} name name of biodata
     * @apiParam {Varchar} email email of biodata
     * @apiParam {Varchar} address address of biodata
     * @apiParam {Float} phone phone of biodata
     *
     *
     * @apiError EmailHasRegitered The Email must diffrerent.
     */
    public function update(BiodataEditRequest $request, $id)
    {
        return $this->biodata->update($id, $request->all());
    }

    /**
     * @api {delete} api/biodatas/id Request Delete Biodata by ID
     * @apiName DeleteBiodataByID
     * @apiGroup Biodata
     *
     * @apiParam {Number} id id of biodata
     *
     *
     * @apiError BiodataNotFound The <code>id</code> of the Biodata was not found.
     * @apiError NoAccessRight Only authenticated Admins can access the data.
     */
    public function destroy($id)
    {
        return $this->biodata->delete($id);
    }

}
