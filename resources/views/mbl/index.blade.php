@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">Data Mobil
			  	<div class="panel-title pull-right"><a href="{{ route('bil.create') }}">Add</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Name</th>
					  <th>plat_no</th>
					  <th>kapasitas</th>
					  <th>harga</th>
					  <th>jenis</th>
					  <th>warna</th>
					  <th>tahun</th>
					  <th>type</th>
					  <th>galeri</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($mobil as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama }}</td>
				    	<td><p>{{ $data->plat_no }}</p></td>
				    	<td>{{ $data->kapasitas }}</td>
				    	<td>{{ $data->harga }}</td>
				    	<td>{{ $data->jenis }}</td>
				    	<td>{{ $data->warna }}</td>
				    	<td>{{ $data->tahun }}</td>
				    	<td>{{ $data->type }}</td>
				    	<td><a href="" class="thumbnail">
                            <img src="img/{{ $data->galeri->foto, $data->nama }}" style="max-height:150px;max-width:150px;margin-top:7px;"</td>
						<td>
							<a class="btn btn-primary" href="{{ route('bil.edit',$data->id) }}">Update</a>
						</td>
			
						<td>
			<form method="post" action="{{ route('bil.destroy',$data->id) }}">
					<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection