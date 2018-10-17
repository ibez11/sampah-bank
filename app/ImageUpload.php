<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $original_filename
 * @property string $original_filepath
 * @property string $original_filedir
 * @property string $original_extension
 * @property string $original_mime
 * @property int $original_filesize
 * @property integer $original_width
 * @property integer $original_height
 * @property string $path
 * @property string $dir
 * @property string $filename
 * @property string $basename
 * @property string $exif
 * @property string $square50_path
 * @property string $square50_dir
 * @property string $square50_filename
 * @property string $square50_filepath
 * @property string $square50_filedir
 * @property int $square50_filesize
 * @property integer $square50_width
 * @property integer $square50_height
 * @property boolean $square50_is_squared
 * @property string $square100_path
 * @property string $square100_dir
 * @property string $square100_filename
 * @property string $square100_filepath
 * @property string $square100_filedir
 * @property int $square100_filesize
 * @property integer $square100_width
 * @property integer $square100_height
 * @property boolean $square100_is_squared
 * @property string $square200_path
 * @property string $square200_dir
 * @property string $square200_filename
 * @property string $square200_filepath
 * @property string $square200_filedir
 * @property int $square200_filesize
 * @property integer $square200_width
 * @property integer $square200_height
 * @property boolean $square200_is_squared
 * @property string $square400_path
 * @property string $square400_dir
 * @property string $square400_filename
 * @property string $square400_filepath
 * @property string $square400_filedir
 * @property int $square400_filesize
 * @property integer $square400_width
 * @property integer $square400_height
 * @property boolean $square400_is_squared
 * @property string $size50_path
 * @property string $size50_dir
 * @property string $size50_filename
 * @property string $size50_filepath
 * @property string $size50_filedir
 * @property int $size50_filesize
 * @property integer $size50_width
 * @property integer $size50_height
 * @property boolean $size50_is_squared
 * @property string $size100_path
 * @property string $size100_dir
 * @property string $size100_filename
 * @property string $size100_filepath
 * @property string $size100_filedir
 * @property int $size100_filesize
 * @property integer $size100_width
 * @property integer $size100_height
 * @property boolean $size100_is_squared
 * @property string $size200_path
 * @property string $size200_dir
 * @property string $size200_filename
 * @property string $size200_filepath
 * @property string $size200_filedir
 * @property int $size200_filesize
 * @property integer $size200_width
 * @property integer $size200_height
 * @property boolean $size200_is_squared
 * @property string $size400_path
 * @property string $size400_dir
 * @property string $size400_filename
 * @property string $size400_filepath
 * @property string $size400_filedir
 * @property int $size400_filesize
 * @property integer $size400_width
 * @property integer $size400_height
 * @property boolean $size400_is_squared
 * @property string $created_at
 * @property string $updated_at
 */
class ImageUpload extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['original_filename', 'original_filepath', 'original_filedir', 'original_extension', 'original_mime', 'original_filesize', 'original_width', 'original_height', 'path', 'dir', 'filename', 'basename', 'exif', 'square50_path', 'square50_dir', 'square50_filename', 'square50_filepath', 'square50_filedir', 'square50_filesize', 'square50_width', 'square50_height', 'square50_is_squared', 'square100_path', 'square100_dir', 'square100_filename', 'square100_filepath', 'square100_filedir', 'square100_filesize', 'square100_width', 'square100_height', 'square100_is_squared', 'square200_path', 'square200_dir', 'square200_filename', 'square200_filepath', 'square200_filedir', 'square200_filesize', 'square200_width', 'square200_height', 'square200_is_squared', 'square400_path', 'square400_dir', 'square400_filename', 'square400_filepath', 'square400_filedir', 'square400_filesize', 'square400_width', 'square400_height', 'square400_is_squared', 'size50_path', 'size50_dir', 'size50_filename', 'size50_filepath', 'size50_filedir', 'size50_filesize', 'size50_width', 'size50_height', 'size50_is_squared', 'size100_path', 'size100_dir', 'size100_filename', 'size100_filepath', 'size100_filedir', 'size100_filesize', 'size100_width', 'size100_height', 'size100_is_squared', 'size200_path', 'size200_dir', 'size200_filename', 'size200_filepath', 'size200_filedir', 'size200_filesize', 'size200_width', 'size200_height', 'size200_is_squared', 'size400_path', 'size400_dir', 'size400_filename', 'size400_filepath', 'size400_filedir', 'size400_filesize', 'size400_width', 'size400_height', 'size400_is_squared', 'created_at', 'updated_at'];

}
