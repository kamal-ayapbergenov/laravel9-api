<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.07.2022
 * Time: 17:37
 */
?>

@foreach($get as $gets)
    <a href="{{url('/employee/'.$gets->id)}}">{{$gets->name}}</a>
    <br>
    {{$gets->email}}
    <br>
    {{$gets->salary}}
    <hr>
@endforeach
