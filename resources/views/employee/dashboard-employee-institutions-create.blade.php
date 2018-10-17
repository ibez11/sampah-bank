@extends('layouts.master-employee-dashboard')

@section('title')
Tuan Di Bangarna - Tambah Institusi
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      @if(empty($institution))
      <li class="active">Tambah Institusi</li>
      @else
      <li class="active">Ubah Institusi</li>
      @endif
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{ empty($institution) ? 'Tambah Institusi' : 'Ubah Institusi'}}</h1>
    </div>
  </div><!--/.row-->

  @if($errors->has('success'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-success"><span class="fa fa-check"></span>&nbsp;{{ $errors->first('success') }}</div>
    </div>
  </div>
  @endif

  @if($errors->has('error'))
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger"><span class="fa fa-exclamation-circle"></span>&nbsp;{{ $errors->first('error') }}</div>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">{{ empty($institution) ? 'Tambah Institusi' : 'Ubah Institusi'}}</div>
        <div class="panel-body">
          <form action="{{ empty($institution) ? '/institution' : '/institution/' . $institution->id }}" method="post">
            {{ csrf_field() }}
            @if(!empty($institution))
            {{ method_field('PUT') }}
            @endif
            <div class="form-group">
              <label for="name">Nama Institusi</label>
              <input type="text" name="name" class="form-control" placeholder="Nama Institusi..." value="{{ empty($institution->name) ? '' :  $institution->name}}" required>
            </div>
            <div class="form-group">
              <label for="address">Alamat Lengkap</label>
              <textarea rows="3" type="text" name="address" class="form-control" placeholder="Alamat Lengkap..."
              >{{ empty($institution->address) ? '' :  $institution->address}}</textarea>
            </div>
            <div class="form-group">
              <label for="phone">Nomor Telepon</label>
              <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon..." value="{{ empty($institution->phone) ? '' :  $institution->phone}}">
            </div>
            <div class="form-group">
              <label for="desc">Deskripsi</label>
              <input type="text" name="desc" class="form-control" placeholder="Deskripsi..."
              value="{{ empty($institution->description) ? '' :  $institution->description}}">
            </div>
            <div class="form-group">
              <input class="btn btn-info" type="submit" name="submit" value="Simpan">
            </div>
          </form>
         
          <div class="form-group">
              <label for="desc">Subinstitusi</label>
              @if(!empty($institution))
              <a href="{{ route('institution.create') }}" 
              data-modal="modal-edit-subinstitution" data-type="subinstitution"
              class="btn btn-launch-modal"><label class="label label-primary"><span class="fa fa-plus"></span>&nbsp;Tambah Subinstitusi</label></a><br/>
              <small>Dapat berupa jurusan, kelas, atau divisi</small>
              <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Subinstitusi</th>
                          <th>Deskripsi</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <?php $no = 1; ?>
                      <tbody>
                          @if(!empty($subinstitutions))
                           @foreach($subinstitutions as $subinstitution)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $subinstitution->name }}</td>
                          <td>{{ $subinstitution->description }}</td>
                          <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ route('subinstitution.edit', $subinstitution->id) }}" 
                                      data-id="{{ $subinstitution->id }}" data-modal="modal-edit-subinstitution" data-type="subinstitution"
                                      class="btn btn-warning btn-sm btn-launch-modal"><span class="fa fa-pencil-square-o"></span></a>
                                </div>
                                <div class="col-md-9">
                                    <form action="{{ route('subinstitution.destroy', $subinstitution->id) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus subinstitusi ini? Seluruh nasabah yang menggunakan subinstitusi ini akan TETAP ADA, namun data subinstitusi tidak dapat dikembalikan.')"><span class="fa fa-trash-o"></span></button>
                                      </form>
                                </div>
                            </div>
                          </td>                         
                          </tr>
                        <?php $no++; ?>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                    @else
                    <p class="alert alert-info">Anda dapat menambahkan subinstitusi setelah menyimpan institusi ini</p>
                    @endif
          </div>
         
        </div>
      </div>
    </div>
  </div>
</div>	<!--/.main-->

{{--  modals  --}}
<div class="modal fade" id="modal-edit-subinstitution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-edit-subinstitution-label">Ubah Subinstitusi</h4>
      </div>
      <div class="modal-body">
        <form id="modal-edit-subinstitution-form">
            <input type="hidden" id="institution-id" name="institution_id" value="{{ empty($institution) ? '' : $institution->id }}"/>
          <input type="hidden" name="id" id="subinstitution-id" name="subinstitution_id" />
            <div id="modal-edit-subinstitution-progress" class="progress" style="display:none;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="sr-only">Memuat data...</span>
                </div>
              </div>
          <div class="form-group">
            <label for="name" class="control-label">Nama</label><br/>
            <small>Dapat berupa nama jurusan, kelas, atau divisi</small>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="form-group">
            <label for="desc" class="control-label">Deskripsi</label>
            <textarea class="form-control" id="desc" name="desc"></textarea>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="modal-edit-subinstitution-save">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

      @endsection

      @section('js')
      <script src="{{ asset('js/dashboard-edit-subinstitution.js') }}"></script>
      @endsection
