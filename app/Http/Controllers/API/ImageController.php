<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use App\Models\Partner;

class ImageController extends Controller
{
    function save_img_url()
    {

        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $url = $data['url'];
        $name_partner = $data['name_partner'];
        $name_new_check_in = $data['name_new_check_in'];

        if (empty($name_new_check_in)) {
            $name_new_check_in = 'รวม' ;
        }
 
        $img = storage_path("app/public")."/check_in". "/" . 'check_in_' . $name_partner . '_' . $name_new_check_in . '.png';

        // Save image
        file_put_contents($img, file_get_contents($url));

        $qr_code = Image::make( storage_path("app/public")."/check_in". "/" . 'check_in_' . $name_partner . '_' . $name_new_check_in . '.png' );

        //logo peddyhub
        $logo_ph = Image::make(public_path('peddyhub/images/logo/logo-5.png'));
        $logo_ph->resize(80,80);
        $qr_code->insert($logo_ph,'center')->save();

        return 'check_in_' . $name_partner . '_' . $name_new_check_in . '.png';

    }

    function hex2rgba($color, $opacity = false) {
 
        $default = '184,32,91';
        
        //Return default if no color provided
        if(empty($color))
              return $default; 
     
        //Sanitize $color if "#" is provided 
            if ($color[0] == '#' ) {
                $color = substr( $color, 1 );
            }
     
            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                    return $default;
            }
     
            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);
     
            //Check if opacity is set(rgba or rgb)
            if($opacity){
                $output = implode(",",$rgb).','.$opacity;
            } else {
                $output = implode(",",$rgb);
            }
     
            //Return rgb(a) color string
            return $output;
    }


    function admin_create_img_check_in()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $color_theme = $data['color_theme'];
        $name_partner = $data['name_partner'];
        $url_img = $data['url_img'];

        $name_new_check_in = $data['name_new_check_in'];
        if (empty($name_new_check_in)) {
            $name_new_check_in = 'รวม' ;
        }

        $data_partners = Partner::where('name' , $name_partner)->where('name_area' , null)->get();

        foreach ($data_partners as $item) {
            $img_logo_partner = $item->logo ;
        }

        $color_hex = $this->hex2rgba($color_theme) ;
        $color_sp = explode(",",$color_hex);
        $color_1 = intval($color_sp[0] / 255 * 100);
        $color_2 = intval($color_sp[1] / 255 * 100);
        $color_3 = intval($color_sp[2] / 255 * 100);

        // นับตัวอักษร
        function utf8_strlen($s) {
            $c = strlen($s); $l = 0;
                for ($i = 0; $i < $c; ++$i)
                    if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
            return $l;
        }

        $cuont_name_partner =  utf8_strlen($name_partner);
        $cuont_name_new_check_in =  utf8_strlen($name_new_check_in);


        // echo $cuont_name_partner ;
        // echo "  //  " ;
        // echo $cuont_name_new_check_in ;

        // เรียกรูปภาพใส่ $image // logo viicheck && sticker
        $image = Image::make(public_path('peddyhub/images/check_in/theme/promotion/26.png'));
        $image->orientate();

        // หัวภาพ
        $hade_img = Image::make(public_path('peddyhub/images/check_in/theme/promotion/27.png'));
        // ระบายสี
        $hade_img->colorize( $color_1 , $color_2 , $color_3 );
        // $hade_img->colorize( 50, 0, 0 );

        // QR-code
        $qr_code = Image::make( storage_path("app/public") . "/" .  $url_img );
        $qr_code->resize(590, 590);
        $hade_img->insert($qr_code ,'bottom-left', 165, 240);

        // แทรกหัวภาพ
        $image->insert($hade_img);

        // สติกเกอร์
        $stk_img = Image::make(public_path('peddyhub/images/check_in/theme/promotion/28.png'));
        // แทรกสติกเกอร์
        $image->insert($stk_img);

        // logo partner
        $logo_partner = Image::make( storage_path("app/public") . "/" .  $img_logo_partner );
        $logo_partner->resize(420,420);
        $image->insert($logo_partner,'top-right', 55, 30);

        if($cuont_name_partner >= 37){
            $image->text($name_partner, 825, 320, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(65);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
            });
        }elseif($cuont_name_partner >= 30 && $cuont_name_partner < 37){
            $image->text($name_partner, 825, 320, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(75);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
            });
        }elseif($cuont_name_partner < 30) {
            $image->text($name_partner, 825, 320, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(85);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
            });
        }

        if ($name_new_check_in != 'รวม') {
            $text_name_new_check_in = $name_new_check_in ;
        }else{
            $text_name_new_check_in = $name_partner;
        }

        if($cuont_name_new_check_in >= 30){
            $image->text($text_name_new_check_in, 1140, 653, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(35);
                $font->color('#ffffff');
                $font->align('left');
                $font->valign('top');
            });
        }elseif($cuont_name_new_check_in >= 20 && $cuont_name_new_check_in < 30){
            $image->text($text_name_new_check_in, 1150, 645, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(50);
                $font->color('#ffffff');
                $font->align('left');
                $font->valign('top');
            });
        }elseif($cuont_name_new_check_in < 20) {
            $image->text($text_name_new_check_in, 1200, 640, function($font) {
                $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                $font->size(75);
                $font->color('#ffffff');
                $font->align('left');
                $font->valign('top');
            });
        }

        $image->save( storage_path("app/public")."/check_in". "/" . 'artwork_' . $name_partner . '_' . $name_new_check_in . '.png' );

        return "OK";
    }

    function create_img_check_in()
    {
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $color_theme = $data['color_theme'];
        $name_partner = $data['name_partner'];
        $name_new_check_in = $data['name_new_check_in'];
        $url_img = $data['url_img'];
        $num_theme_qr = $data['num_theme_qr'];

        $data_partners = Partner::where("name", $name_partner)->where('name_area' , null)->first();

        $img_logo_partner = $data_partners->logo ;

        $color_hex = $this->hex2rgba($color_theme) ;
        $color_sp = explode(",",$color_hex);
        $color_1 = intval($color_sp[0] / 255 * 100);
        $color_2 = intval($color_sp[1] / 255 * 100);
        $color_3 = intval($color_sp[2] / 255 * 100);

        // นับตัวอักษร
        function utf8_strlen($s) {
            $c = strlen($s); $l = 0;
                for ($i = 0; $i < $c; ++$i)
                    if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
            return $l;
        }

        $cuont_name_partner =  utf8_strlen($name_partner);
        $cuont_name_new_check_in =  utf8_strlen($name_new_check_in);

        // Theme 1
        if ($num_theme_qr == '1') {
            // เรียกรูปภาพใส่ $image // logo viicheck && sticker
            $image = Image::make(public_path('peddyhub/images/check_in/theme/artwork_1-2.png'));

            $image->orientate();

            // QR-code
            $watermark_2 = Image::make( storage_path("app/public") . "/" .  $url_img );
            $image->insert($watermark_2 ,'bottom-right', 385, 150);

            // หัวภาพ
            $watermark = Image::make(public_path('peddyhub/images/check_in/theme/artwork_1-1.png'));
            // ระบายสี
            $watermark->colorize( $color_1 , $color_2 , $color_3 );
            // $watermark->colorize( 50, 0, 0 );
            $image->insert($watermark);

            // logo partner
            $logo_partner = Image::make( storage_path("app/public") . "/" .  $img_logo_partner );
            $logo_partner->resize(250,250);
            $image->insert($logo_partner,'top-right', 40, 20);

            if($cuont_name_partner >= 37){
                $image->text($name_partner, 530, 205, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(48);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }elseif($cuont_name_partner >= 30 && $cuont_name_partner < 37){
                $image->text($name_partner, 530, 205, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(55);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }elseif($cuont_name_partner < 30) {
                $image->text($name_partner, 530, 205, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(65);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }

            if ($name_new_check_in != 'รวม') {

                if($cuont_name_new_check_in >= 30){
                    $image->text($name_new_check_in, 760, 800, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(29);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                }elseif($cuont_name_new_check_in >= 20 && $cuont_name_new_check_in < 30){
                    $image->text($name_new_check_in, 760, 800, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(35);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                }elseif($cuont_name_new_check_in < 20) {
                    $image->text($name_new_check_in, 760, 800, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(45);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                }

            }

            $image->save( storage_path("app/public")."/check_in". "/" . 'artwork_' . $name_partner . '_' . $name_new_check_in . '.png' );
        }

        // Theme 2
        if ($num_theme_qr == '2') {
            // เรียกรูปภาพใส่ $image // logo viicheck && sticker
            $image = Image::make(public_path('peddyhub/images/check_in/theme/artwork_2-2.png'));
            $image->orientate();

            // QR-code
            $watermark_2 = Image::make( storage_path("app/public") . "/" .  $url_img );
            $image->insert($watermark_2 ,'bottom-right', 840, 175);

            // หัวภาพ
            $watermark = Image::make(public_path('peddyhub/images/check_in/theme/artwork_2-1.png'));
            // ระบายสี
            $watermark->colorize( $color_1 , $color_2 , $color_3 );
            // $watermark->colorize( 50, 0, 0 );
            $image->insert($watermark);

            // logo partner
            $logo_partner = Image::make( storage_path("app/public") . "/" .  $img_logo_partner );
            $logo_partner->resize(250,250);
            $image->insert($logo_partner,'top-right', 40, 20);

            if($cuont_name_partner >= 37){
                $image->text($name_partner, 530, 205, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(48);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }elseif($cuont_name_partner >= 30 && $cuont_name_partner < 37){
                $image->text($name_partner, 530, 205, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(55);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }elseif($cuont_name_partner < 30) {
                $image->text($name_partner, 530, 205, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(65);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }

            if ($name_new_check_in != 'รวม') {

                if($cuont_name_new_check_in >= 30){
                    $image->text($name_new_check_in, 300, 800, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(29);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                }elseif($cuont_name_new_check_in >= 20 && $cuont_name_new_check_in < 30){
                    $image->text($name_new_check_in, 300, 800, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(35);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                }elseif($cuont_name_new_check_in < 20) {
                    $image->text($name_new_check_in, 300, 800, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(45);
                        $font->color('#000000');
                        $font->align('center');
                        $font->valign('top');
                    });
                }

            }

            $image->save( storage_path("app/public")."/check_in". "/" . 'artwork_' . $name_partner . '_' . $name_new_check_in . '.png' );

        }

        // Theme 3
        if ($num_theme_qr == '3') {
            // เรียกรูปภาพใส่ $image // logo viicheck && sticker
            $image = Image::make(public_path('peddyhub/images/check_in/theme/promotion/26.png'));
            $image->orientate();

            // หัวภาพ
            $hade_img = Image::make(public_path('peddyhub/images/check_in/theme/promotion/27.png'));
            // ระบายสี
            $hade_img->colorize( $color_1 , $color_2 , $color_3 );
            // $hade_img->colorize( 50, 0, 0 );

            // QR-code
            $qr_code = Image::make( storage_path("app/public") . "/" .  $url_img );
            $qr_code->resize(590, 590);
            $hade_img->insert($qr_code ,'bottom-left', 165, 240);

            // แทรกหัวภาพ
            $image->insert($hade_img);

            // สติกเกอร์
            $stk_img = Image::make(public_path('peddyhub/images/check_in/theme/promotion/28.png'));
            // แทรกสติกเกอร์
            $image->insert($stk_img);

            // logo partner
            $logo_partner = Image::make( storage_path("app/public") . "/" .  $img_logo_partner );
            $logo_partner->resize(420,420);
            $image->insert($logo_partner,'top-right', 55, 30);

            if($cuont_name_partner >= 37){
                $image->text($name_partner, 825, 320, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(65);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }elseif($cuont_name_partner >= 30 && $cuont_name_partner < 37){
                $image->text($name_partner, 825, 320, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(75);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }elseif($cuont_name_partner < 30) {
                $image->text($name_partner, 825, 320, function($font) {
                    $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                    $font->size(85);
                    $font->color('#ffffff');
                    $font->align('center');
                    $font->valign('top');
                });
            }

            if ($name_new_check_in != 'รวม') {
                if($cuont_name_new_check_in >= 30){
                    $image->text($name_new_check_in, 1140, 653, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(35);
                        $font->color('#ffffff');
                        $font->align('left');
                        $font->valign('top');
                    });
                }elseif($cuont_name_new_check_in >= 20 && $cuont_name_new_check_in < 30){
                    $image->text($name_new_check_in, 1150, 645, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(50);
                        $font->color('#ffffff');
                        $font->align('left');
                        $font->valign('top');
                    });
                }elseif($cuont_name_new_check_in < 20) {
                    $image->text($name_new_check_in, 1200, 640, function($font) {
                        $font->file(public_path('fonts/Prompt/Prompt-Black.ttf'));
                        $font->size(75);
                        $font->color('#ffffff');
                        $font->align('left');
                        $font->valign('top');
                    });
                }
            }

            $image->save( storage_path("app/public")."/check_in". "/" . 'artwork_' . $name_partner . '_' . $name_new_check_in . '.png' );

        }

        return "OK";
    
        
    }

    function Manage_uploaded_photos(Request $request){

        $text_hello_world = "HELLO WORLD" ;

        // $files = Storage::files('public/uploads');
        // $type_part = "uploads";

        $files = Storage::files('public/check_in');
        $type_part = "check_in";

        return view('Manage_uploaded_photos', compact('text_hello_world','files','type_part'));
    }

    function delete_uploaded_photos($name_file,$type_part){

        $filename = 'public/'.$type_part.'/' . $name_file;

        if (Storage::exists($filename)) {
            Storage::delete($filename);
            $text = 'ไฟล์ถูกลบออกแล้ว';
        } else {
            $text = 'ไม่พบไฟล์ที่ต้องการลบ';
        }

        return $name_file . " - " . $text ;

    }

    function Manage_resize_photos(Request $request){

        $text_hello_world = "HELLO WORLD" ;

        // $files = Storage::files('public/uploads');
        // $type_part = "uploads";

        $files = Storage::files('public/check_in');
        $type_part = "check_in";

        return view('Manage_resize_photos', compact('text_hello_world','files','type_part'));
    }

    function resize_img($name_file , $type_part){

        $filename = 'public/'.$type_part.'/' . $name_file;

        $image = Image::make(storage_path("app/") . $filename);
        
        $size = $image->filesize();  

        if($size > 112000 ){
            $image->resize(
                intval($image->width()/2) , 
                intval($image->height()/2)
            )->save(); 
        }

        $new_filesize = $image->filesize(); 
        // $new_size = round($new_filesize / (1024 * 1024), 2);

        return $new_filesize ;

    }

    function get_new_size_img($name_file , $type_part){

        $filename = 'public/'.$type_part.'/' . $name_file;

        $image = Image::make(storage_path("app/") . $filename);
        
        $size = $image->filesize(); 
        
        return $size ;

    }

}
