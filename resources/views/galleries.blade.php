@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Select') }}</div>

                    <div class="card-body">
                        {{ __('please select your gallery name:') }}
                        <br>
                        <form action="{{route('data')}}" method="get">
                            @csrf
                            <select class="form-control" name="gallery">
                                @foreach($galleries as $gallery)
                                    <option>{{$gallery}}</option>
                                @endforeach
                            </select>
                            <br>
                            <button class="btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
