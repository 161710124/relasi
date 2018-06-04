@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">Edit Data 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('bil.update',$mobil->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $mobil->nama }}"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('plat_no') ? ' has-error' : '' }}">
			  			<label class="control-label">Plat_No</label>	
			  			<input type="text" name="plat_no" class="form-control" value="{{ $mobil->plat_no }}"  required>
			  			@if ($errors->has('plat_no'))
                            <span class="help-block">
                                <strong>{{ $errors->first('plat_no') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kapasitas') ? ' has-error' : '' }}">
			  			<label class="control-label">kapasitas</label>	
			  			<input type="text" name="kapasitas" class="form-control" value="{{ $mobil->kapasitas }}"  required>
			  			@if ($errors->has('kapasitas'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kapasitas') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
			  			<label class="control-label">harga</label>	
			  			<input type="text" name="harga" class="form-control" value="{{ $mobil->harga }}"  required>
			  			@if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jenis') ? ' has-error' : '' }}">
			  			<label class="control-label">jenis</label>	
			  			<input type="text" name="jenis" class="form-control" value="{{ $mobil->jenis }}"  required>
			  			@if ($errors->has('jenis'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jenis') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('warna') ? ' has-error' : '' }}">
			  			<label class="control-label">warna</label>	
			  			<input type="text" name="warna" class="form-control" value="{{ $mobil->warna }}"  required>
			  			@if ($errors->has('warna'))
                            <span class="help-block">
                                <strong>{{ $errors->first('warna') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tahun') ? ' has-error' : '' }}">
			  			<label class="control-label">tahun</label>	
			  			<input type="text" name="tahun" class="form-control" value="{{ $mobil->tahun }}"  required>
			  			@if ($errors->has('tahun'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tahun') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
			  			<label class="control-label">type</label>	
			  			<input type="text" name="type" class="form-control" value="{{ $mobil->type }}"  required>
			  			@if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('id_galeri') ? ' has-error' : '' }}">
			  			<label class="control-label">id_galeri</label>	
			  			<input type="text" name="id_galeri" class="form-control" value="{{ $mobil->id_galeri }}"  required>
			  			@if ($errors->has('id_galeri'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_galeri') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-info">Finish</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection