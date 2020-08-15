@extends('layouts.admin')

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Struktur Organisasi
                    </h1>
                    <a href="{{ url('admin/structure-organization/create') }}" class="btn btn-primary waves-effect">Tambah</a>
                </div>
                <br>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($structures as $structure)
                                <tr>
                                    <td><img src="{{ url('structureorganization/'.$structure->image) }}" alt="" style="width: 100px;"></td>
                                    <td>{{ $structure->name }}</td>
                                    <td>{{ $structure->email }}</td>
                                    <td>{{ $structure->title }}</td>
                                    <td>
                                        <a href="{{ url('admin/structure-organization/'.$structure->id.'/edit') }}" class="btn btn-success btn-xs waves-effect">Edit</a>
                                        <form action="{{ url('admin/structure-organization/'.$structure->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Anggota Ini ?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
	    $('.dataTable').DataTable();
	});
</script>
@endsection