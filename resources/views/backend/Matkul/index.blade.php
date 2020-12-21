@extends('layouts.backend')

@section('title', $data['title'])



@section('content')

<div class="container-fluid container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Mata Kuliah </span>
    </h4>

    <div class="card">
        
        <div class="card-header d-flex align-items-center justify-content-between">
            <a data-toggle="modal" data-target="#modalcreate" class="btn btn-primary text-white">
                <i class="las la-plus"></i> Tambah</a>
        </div>

      
         
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                <tr >
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Aksi</th>
                </tr>
                </thead>


                <tbody>
                @foreach($data['Matkul'] as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mata_kuliah }}</td>
                    <td>
                        <a class="btn icon-btn btn-sm btn-info editbtn"
                        data-toggle="modal" data-target="#modaledit" onclick="editdata({{ $item->id }})" data-mata_kuliah="{{ $item->mata_kuliah }}" data-program_studi_id="{{ $item->program_studi_id }}">
                            <i class="ion ion-md-create"></i>
                        </a>
                        
                        <a  href="javascript:void(0);" class="btn icon-btn btn-sm btn-danger delete" data-toggle="tooltip" data-original-title="click to delete dosen"><i class="ion ion-md-trash"></i>
                            <form action="{{ route('matkul.destroy', ['id' => $item['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            </form>
                        </a>
                
                    </td>
                </tr>
                @endforeach
                
                
                </tbody>
            </table>

        </div>

        
    </div> <!-- end col -->

  <!-- modal edit -->
  <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title-heading">
                    <h6 class="m-0">Mata Kuliah Edit</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                </button>
            </div>
            
            <form action="" method="POST" id="editform" >
                @csrf
                @method('PUT')
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" id="mata_kuliah" class="form-control" placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Program Studi</label>
                            <select name="program_studi_id" id="program_studi_id" class="form-control">
                                @foreach ($data['program'] as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>

                    
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <!-- end modal edit -->

    <!-- modal create -->
    <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="title-heading">
                    <h6 class="m-0">Tambah Mata Kuliah</h6>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span><i class="las la-times"></i></span>
                    </button>
                </div>
                <form action="{{ Route('matkul.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body scroll">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" id="mata_kuliah" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Program Studi</label>
                            <select name="program_studi_id" id="program_studi_id" class="form-control">
                                @foreach ($data['program'] as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->




</div> <!-- end row -->


@endsection


@section('jsbody')

<script>
    $('.delete').click(function(e)
    {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
        title: 'Hapus Mata Kuliah ?',
        text: "Anda yakin ingin menghapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!'
        }).then((result) => {
        if (result.value) {
            $(this).find('form').submit();
        }
        })
    });

    function editdata(id)
    {
        var id = id;
        var url = '{{ route("matkul.update", ":id") }}';
        url = url.replace(':id', id);
        $("#editform").attr('action', url);
    }

    function editSubmit()
    {
        $("#editform").submit();
    }

    $('.editbtn').click(function(){
        
        var mata_kuliah = $(this).data('mata_kuliah');
        var program_studi_id = $(this).data('program_studi_id');

        $('.modal-body #mata_kuliah').val(mata_kuliah);
        $('.modal-body #program_studi_id').val(program_studi_id);
    });


  $('.add').click(function(){
    $('.modal-body #mata_kuliah').val('');
    $('.modal-body #program_studi_id').val('');
  });

</script>
@endsection