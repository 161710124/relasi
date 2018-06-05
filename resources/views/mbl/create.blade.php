@extends('layouts.admin')
@section('content')

<div class="row">
<div class="container">
<div class="col-md-12">
<div class="panel panel-info">
<div class="panel-heading">
Add
<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Back</a>
</div>
</div>
<div class="panel-body">
<form action="{{ route('bil.store') }}" method="post">
{{ csrf_field() }}

<div class="form-group {{ $errors->has('nama')? 'has-error':''}}">
<label class="control-label">Nama</label>
<input type="text" name="nama" class="form-control" required>
@if ($errors->has('nama'))
<span class="help-block">
<strong>{{ $errors->first('nama') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('plat_no')? 'has error' :'' }}">
<label class="control-label">plat_no</label>
<input name="plat_no" class="form-control" required></input>
@if ($errors->has('plat_no'))
<span class="help-block">
<strong>{{ $errors->first('plat_no') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('kapasitas')? 'has error' :'' }}">
<label class="control-label">kapasitas</label>
<input name="kapasitas" class="form-control"  required></input>
@if ($errors->has('kapasitas'))
<span class="help-block">
<strong>{{ $errors->first('kapasitas') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('harga')? 'has error' :'' }}">
<label class="control-label">harga</label>
<input name="harga" class="form-control"  required></input>
@if ($errors->has('harga'))
<span class="help-block">
<strong>{{ $errors->first('harga') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('jenis')? 'has error' :'' }}">
<label class="control-label">jenis</label>
<input name="jenis" class="form-control"  required></input>
@if ($errors->has('jenis'))
<span class="help-block">
<strong>{{ $errors->first('jenis') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('warna')? 'has error' :'' }}">
<label class="control-label">warna</label>
<input name="warna" class="form-control"  required></input>
@if ($errors->has('warna'))
<span class="help-block">
<strong>{{ $errors->first('warna') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('tahun')? 'has error' :'' }}">
<label class="control-label">tahun</label>
<input name="tahun" class="form-control"  required></input>
@if ($errors->has('tahun'))
<span class="help-block">
<strong>{{ $errors->first('tahun') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('type')? 'has error' :'' }}">
<label class="control-label">type</label>
<input name="type" class="form-control"  required></input>
@if ($errors->has('type'))
<span class="help-block">
<strong>{{ $errors->first('type') }}</strong>
</span>
@endif
</div>

<div class="form-group {{ $errors->has('id_galeri')? 'has error' :'' }}">
<label class="control-label">id_galeri</label>
<input name="id_galeri" class="form-control"  required></input>
@if ($errors->has('id_galeri'))
<span class="help-block">
<strong>{{ $errors->first('id_galeri') }}</strong>
</span>
@endif
</div>

<div class="form-group">
<button type="submit" class="btn btn-info">Add</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection