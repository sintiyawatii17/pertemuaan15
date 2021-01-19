@extends('template.base')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<div class="card-header">
					Alamat
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<label for="" class="control-label">Provinsi</label>
							<select name="" class="form-control" onchange="gantiProvinsi(this.value)">
								<option class="">Pilih Provinsi</option>
								@foreach($list_provinsi as $provinsi)
									<option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-3">
							<label for="" class="control-label">Kabupaten</label>
							<select name="" class="form-control" id="kabupaten" onchange="gantiKabupaten(this.value)">
								<option class="">Pilih Provinsi Terlebih Dahulu</option>
							</select>
						</div><div class="col-md-3">
							<label for="" class="control-label">Kecamatan/Kota</label>
							<select name="" class="form-control" id="kecamatan" onchange="gantiKecamatan(this.value)">
							<option class="">Pilih Kabupaten Terlebih Dahulu</option>	
							</select>
						</div>
						<div class="col-md-3">
							<label for="" class="control-label">Desa</label>
							<select name="" class="form-control" id="desa">
							<option class="">Pilih Keamatan Terlebih Dahulu</option>	
							</select>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('script')
  <script>
    function gantiProvinsi(id){
      $.get("api/provinsi/"+id, function(result){
        result = JSON.parse(result)
        option = ""
        for(item of result){
          option += `<option value="${item.id}">${item.name}</option>`
        }
        $("#kabupaten").html(option)
      });
    }
    function gantiKabupaten(id){
      $.get("api/kabupaten/"+id, function(result){
        result = JSON.parse(result)
        option = ""
        for(item of result){
          option += `<option value="${item.id}">${item.name}</option>`
        }
        $("#kecamatan").html(option)
      });
    }
    function gantiKecamatan(id){
      $.get("api/kecamatan/"+id, function(result){
        result = JSON.parse(result)
        option = ""
        for(item of result){
          option += `<option value="${item.id}">${item.name}</option>`
        }
        $("#desa").html(option)
      });
    }
  </script>
@endpush