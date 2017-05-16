<?php

namespace App\Http\Requests\Biodata;

use App\Http\Requests\Request;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class BiodataCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Declaration an attributes
     *
     * @var array
     */
    protected $attrs = [
        'nama'    => 'Nama',
        'nis'   => 'Nis',
        'tanggal_lahir' => 'Tanggal_lahir',
        'jk' => 'Jk',
        'alamat'   => 'Alamat'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama'    => 'required|max:225',
            'nis'   => 'required|max:225',
            'tanggal_lahir' => 'required|max:225',
            'jk' => 'required|max:225',
            'alamat'   => 'required|max:225'
        ];
    }

    /**
     * @param $validator
     *
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

}
