@extends('layouts.admin')

@section('style')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Edit Profil Anggota
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/structure-organization/'.$people->id) }}" id="willSubmit" method="POST" enctype="multipart/form-data">
              			{{ csrf_field() }}
              			{{ method_field('put') }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" placeholder="Nama" name="name" class="form-control" form="willSubmit" value="{{ $people->name }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" placeholder="Email" name="email" class="form-control" form="willSubmit" value="{{ $people->email }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" placeholder="Jabatan" name="title" class="form-control" form="willSubmit" value="{{ $people->title }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="ttl" class="form-control" form="willSubmit" placeholder="Tempat, Tanggal Lahir" value="{{ $people->ttl }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" name="religion" class="form-control" form="willSubmit" placeholder="Agama" value="{{ $people->religion }}">
                            </div>
                        </div>
						
						<p>Riwayat Pendidikan</p>
                        <textarea name="schools" class="form-control my-editor" form="willSubmit">
                        	{!! $people->schools !!}
                        </textarea>
						
						<p>Pengalaman Organisasi</p>
                        <textarea name="organizations" class="form-control my-editor" form="willSubmit">
                        	{!! $people->organizations !!}
                        </textarea>
						
						<p>Pengalaman Kerja</p>
                        <textarea name="jobs" class="form-control my-editor" form="willSubmit">
                        	{!! $people->jobs !!}
                        </textarea>
						
						<p>Prestasi / Penghargaan</p>
                        <textarea name="achievements" class="form-control my-editor" form="willSubmit">
                        	{!! $people->achievements !!}
                        </textarea>
						
						<p>Deskripsi Tambahan</p>
                        <textarea name="description" class="form-control my-editor" form="willSubmit">
                        	{!! $people->description !!}
                        </textarea>
						
						<h3>Foto Profil</h3>
						<div class="row">
							<div class="col-md-4">
								@if(isset($people->image))
                                    <br>
                                    <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('structure-organization/'.$people->image) }}">
                                @endif 
								<div class="form-group form-float">
		                            <input type="file" name="image" class="form-control" form="willSubmit">
		                        </div>
							</div>
						</div>
                    	<button type="submit" class="btn btn-primary m-t-15 waves-effect">Create</button>
              		</form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
  var editor_config = {
    path_absolute : "{{ url('/').'/' }}",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection
