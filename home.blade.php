@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="padding-bottom: 15px">                            
                            <label class="col-lg-3">Upload</label>
                            <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>


                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $data)                                
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td> <?php foreach (explode(',',$data->mulimage)as $picture) { ?>
                                        <img src="{{ asset('/image/'.$picture) }}" style="height:150px"/>
                                        <?php } ?>
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
@endsection
