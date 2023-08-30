@extends('back.layout.template')

@section('title', 'List Articles - Admin')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')

    {{-- content --}}

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articles</h1>
      </div>

      <div class="mt-3">
        <div class="mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button>
            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                    </div>
                </div>
            @endif

            @if(session('success'))
            <div class="my-3">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
        </div>
        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Publish Date</th>
                    {{-- <th>Function</th> --}}
                </tr>
            </thead>

            <tbody>
                
            </tbody>
      </div>
    </main>
  
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable(
            {
            processing: true,
            serverside: true,
            ajax: '{{ url()->current() }}',
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'views',
                    name: 'views'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'publish_date',
                    name: 'publish_date'
                },
            ]
        }
        );
    });
</script>
@endpush