@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">{{ __('Selected Gallery is:') }} <h1>{{$gallery}}</h1></div>

                    <div class="card-body">
                        <form action="{{route('data')}}" method="get">
                            {{__('choose your kind for filter:')}}
                            <select name="type">
                                <option type="default">nothing</option>
                                <option>likes</option>
                                <option>comments</option>
                                <option>views</option>
                            </select>
                            <br>
                            <br>
                            {{__('choose your type for filter:')}}

                            <select name="status">
                                <option type="default">nothing</option>
                                <option>image</option>
                                <option>video</option>
                                <option>album</option>
                            </select>
                            <br>
                            <br>
                            {{__('choose your year for filter:')}}

                            <select name="year">
                                <option type="default">nothing</option>
                                <option>1390</option>
                                <option>1391</option>
                                <option>1392</option>
                                <option>1393</option>
                                <option>1394</option>
                                <option>1395</option>
                                <option>1396</option>
                                <option>1397</option>
                                <option>1398</option>
                                <option>1399</option>
                            </select>
                            <br>
                            <br>
                            {{__('choose your month for filter:')}}

                            <select name="month">
                                <option type="default">nothing</option>
                                <option>Farvardin</option>
                                <option>Ordibehesht</option>
                                <option>Khordad</option>
                                <option>Tir</option>
                                <option>Mordad</option>
                                <option>Shahrivar</option>
                                <option>Mehr</option>
                                <option>Aban</option>
                                <option>Azar</option>
                                <option>Dey</option>
                                <option>Bahman</option>
                                <option>Esfand</option>
                            </select>
                            <br>
                            <br>
                            {{__('choose your month for filter:')}}

                            <select name="weekday">
                                <option type="default">nothing</option>
                                <option>Shanbeh</option>
                                <option>Yekshanbeh</option>
                                <option>Doshanbeh</option>
                                <option>Seshanbeh</option>
                                <option>Chaharshanbeh</option>
                                <option>Panjshanbeh</option>
                                <option>Jomeh</option>
                            </select>

                            <input type="text" name="gallery" value="{{$gallery}}" hidden>
                            <br>
                            <br>
                            <button class="btn-danger">Filter</button>
                        </form>
                        <br>
                        {{ __('in this gallery we have:') }}
                        <table class="table table-hover table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">all</th>
                                <th scope="col">image_percent</th>
                                <th scope="col">video_percent</th>
                                <th scope="col">album_percent</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$percent['all']}}</td>
                                <td>{{$percent['image']}}%</td>
                                <td>{{$percent['video']}}%</td>
                                <td>{{$percent['album']}}%</td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        {{ __('in this gallery we have these Averages:') }}
                        <table class="table table-hover table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">like_average</th>
                                <th scope="col">comments_average</th>
                                <th scope="col">views_average</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$avg['likes']}}</td>
                                <td>{{$avg['comments']}}</td>
                                <td>{{$avg['views']}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <br>
                        {{ __('data from chosen gallery:') }}
                        <br>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">post_url</th>
                                <th scope="col">type</th>
                                <th scope="col">likes</th>
                                <th scope="col">comments</th>
                                <th scope="col">views</th>
                                <th scope="col">image_url</th>
                                <th scope="col">weekday</th>
                                <th scope="col">month</th>
                                <th scope="col">year</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $datum)
                                <tr>
                                    <th scope="row">{{$datum['id']}}</th>
                                    <td><a href="{{$datum['post_url']}}">post_url</a></td>
                                    <td>{{$datum['type']}}</td>
                                    <td>{{$datum['likes']}}</td>
                                    <td>{{$datum['comments']}}</td>
                                    <td>{{$datum['views']}}</td>
                                    <td class="d-flex"><a href="{{$datum['image_url']}}">image_url</a></td>
                                    <td>{{$datum['iran_weekday']}}</td>
                                    <td>{{$datum['iran_month']}}</td>
                                    <td>{{$datum['iran_year']}}</td>
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
