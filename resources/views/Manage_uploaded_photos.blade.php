@extends('layouts.peddyhub')

@section('content')

<h1 class="text-center mt-3">
	<span class="text-primary">{{ $text_hello_world }}</span> -- มีรูปทั้งหมด {{ count($files) }}
</h1>

<div class="row" style="padding-left:30px;padding-right:30px;">

	@php
		$iii = 1 ;

		$start = Request::get('start'); // ลำดับเริ่มต้น
        $end = Request::get('end') ; // ลำดับสิ้นสุด

        if(empty($start)){
        	$start = 1 ;
        }

        if(empty($end)){
        	$end = 12 ;
        }

        // ใช้ array_slice เพื่อดึงเฉพาะลำดับไฟล์ที่คุณต้องการ
        $files = array_slice($files, $start - 1, $end - $start + 1);

	@endphp

	<div class="col-6">
		<a href="{{ url('/Manage_resize_photos') }}" class="btn btn-success mb-2" >
			ปรับขนาดรูปภาพ
		</a>
		<h3>
			รูปภาพลำดับที่ : {{ $start }} ถึง {{ $end }}
		</h3>
	</div>
	<div class="col-6">
		<form action="{{ url('/Manage_uploaded_photos') }}" method="get">
		    @csrf
		    <div class="row">
		    	<div class="col-5">
		    		<div class="form-group">
		    			<label for="start">ลำดับเริ่มต้น:</label>
		    			<input class="form-control" type="number" id="start" name="start" min="1" placeholder="{{ $start }}">
		    		</div>
		    	</div>
		    	<div class="col-5">
		    		<div class="form-group">
			    		<label for="end">ลำดับสิ้นสุด:</label>
			    		<input class="form-control" type="number" id="end" name="end" min="1" placeholder="{{ $end }}">
			    	</div>
		    	</div>
		    	<div class="col-2">
		    		<button class="btn btn-info" type="submit" style="width:80%;margin-top:30px;">
		    			ส่ง
		    		</button>
		    	</div>
		    </div>
		</form>
	</div>

	<hr>

	@foreach ($files as $file) 
		@php
	    	$url = Storage::url($file);

	    	$full_patr_file = "public/".$type_part."/" ;
	    	$name_file = str_replace($full_patr_file , "" , $file);

	    	$name_db_file = $type_part . '/' . $name_file;

	    	$address_img = "";

	    	if($type_part == "uploads"){

	    		// --- adoptpets ---
		    	$db_adoptpets = App\Models\Adoptpet::where('photo',$name_db_file)->first();
		    	if(!empty($db_adoptpets)){
		    		$address_img = $address_img . "/" . 'adoptpets' ;
		    	}

		    	// --- ads_contents ---
		    	$db_ads_contents = App\Models\Ads_content::where('photo',$name_db_file)->first();
		    	if(!empty($db_ads_contents)){
		    		$address_img = $address_img . "/" . 'ads_contents' ;
		    	}

		    	// --- hospital_nears ---
		    	$db_hospital_nears = App\Models\Hospital_near::where('photo',$name_db_file)->first();
		    	if(!empty($db_hospital_nears)){
		    		$address_img = $address_img . "/" . 'hospital_nears' ;
		    	}

		    	// --- lost__pets ---
		    	$db_lost__pets = App\Models\Lost_Pet::where('photo',$name_db_file)->first();
		    	if(!empty($db_lost__pets)){
		    		$address_img = $address_img . "/" . 'lost__pets' ;
		    	}

		    	// --- partners ---
		    	$db_partners = App\Models\Partner::where('logo',$name_db_file)->first();
		    	if(!empty($db_partners)){
		    		$address_img = $address_img . "/" . 'partners' ;
		    	}

		    	// --- pets ---
		    	$db_pets = App\Models\Pet::where('photo',$name_db_file)
		    		->orWhere('photo_2',$name_db_file)
		    		->orWhere('photo_3',$name_db_file)
		    		->orWhere('photo_medical_certificate',$name_db_file)
		    		->orWhere('photo_vaccine',$name_db_file)
		    		->orWhere('photo_vaccine_2',$name_db_file)
		    		->orWhere('photo_vaccine_3',$name_db_file)
		    		->orWhere('qr_code',$name_db_file)
		    		->orWhere('qr_code_checklist',$name_db_file)
		    		->first();
		    	if(!empty($db_pets)){
		    		$address_img = $address_img . "/" . 'pets' ;
		    	}

		    	// --- posts ---
		    	$db_posts = App\Models\Post::where('photo',$name_db_file)->first();
		    	if(!empty($db_posts)){
		    		$address_img = $address_img . "/" . 'posts' ;
		    	}

		    	// --- products ---
		    	$db_products = App\Models\Product::where('photo',$name_db_file)->first();
		    	if(!empty($db_products)){
		    		$address_img = $address_img . "/" . 'products' ;
		    	}


		    	// --- profiles ---
		    	$db_profiles = App\Models\Profile::where('photo',$name_db_file)
		    		->orWhere('photo_passport',$name_db_file)
		    		->orWhere('photo_id_card',$name_db_file)
		    		->first();
		    	if(!empty($db_profiles)){
		    		$address_img = $address_img . "/" . 'profiles' ;
		    	}
		    }


	   	@endphp
	    <div class="col-2 card my-3" style="padding:10px;">
	    	<h6> รูปที่ <b>{{ $iii }}</b> </h6>
	    	<br>
	    	<span> {{ $name_file }} </span>
	    	<br>
	    	<span> {{ $address_img ? $address_img : "--" }} </span>
	    	<hr>
	    	<center>
	    		<span class="btn btn-sm btn-danger mb-3" style="width:80%;" onclick="delete_photo('{{ $name_file }}','{{ $iii }}','{{ $type_part }}');">
		    		ลบ
		    	</span>
		    	<img src="{{ url('/').$url }}" style="width:100%;">
	    	</center>
	    </div>

	    @php
	    	$iii = $iii + 1 ;
	    @endphp
	@endforeach
</div>

<script>

	document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");

        document.querySelector('.header').remove();
        document.querySelector('.main-footer').remove();
        
    });
	
	function delete_photo(name_file,iii,type_part){

		// alert(name_file);

		fetch("{{ url('/') }}/api/delete_uploaded_photos" + "/" + name_file + "/" + type_part)
			.then(response => response.text())
			.then(result => {
				// alert(result);
				let text_success = result.split(" - ")[1];
				if(text_success == "ไฟล์ถูกลบออกแล้ว"){
					// window.location.reload();
					console.log('ไฟล์ที่ ' + iii +' ถูกลบออกแล้ว');
				}
			});

	}

</script>

@endsection