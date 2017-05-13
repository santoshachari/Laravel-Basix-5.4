<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uploads';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['original_name', 'stored_name', 'stored_path', 'provider', 'file_size','created_at', 'updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public static function storeFile($file, $path = 'uploads', $provider = 'local', $store = true)
    {

        //Create a Unique Upload name for each file.
        $sName_unique = time() . '_' . uniqid(rand()) . '.' . $file->getClientOriginalExtension();

        $sName_with_path = $file->storeAs($path, $sName_unique, $provider);

        //Store in Uploads database
        if ($store) {
            self::create([
                'original_name' => $file->getClientOriginalName(),
                'stored_name' => $sName_unique,
                'stored_path' => $path,
                'provider' => $provider,
                'file_size' => $file->getClientSize(),
            ]);
        }
        return array($sName_unique, $sName_with_path);


    }

}