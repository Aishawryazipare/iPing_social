@extends('layouts.app_apti')
@section('title', 'Home')
@section('content')
<style>
    .control-label{
        font-weight: bold;
    }
</style>
<?php 
$x = 1;
$questions = App\Programing::where(['flag'=>0])->orderBy('id','asc')->get();
$note = \App\ProgramNote::orderBy('id','desc')->first();
?>
<!--<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--> 
<main class="app-content" style="margin: 50px;">
    <div class="app-title" style="position: fixed;z-index: 1;width: 93%;">
        <div>
            <h1> Programing Questions </h1>
        </div>
    </div>
    <form method="POST" action="{{ url('program_test') }}" id="orderForm">
                @csrf
    <div class="row" style="margin-top: 60px;">
        <div class="col-md-12">
            <div class="tile">
                <div class="form-group row">
                    <div class="col-md-12" style="color:black">
                        <p style="white-space: pre-line;"><b>{{$note->note}}</b><p>
                            <hr>
                    </div>
                </div>

                @foreach($questions as $q)
                <div class="form-group">
                    <label class="control-label" style="white-space: pre-line;">Ques {{$x++}} : <?php echo htmlspecialchars_decode(stripslashes($q->questions));  ?></label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <div class="form-group row" id="msg_div" style="display:none">
                    <label id="msg" class="error" for="name" style="color:#dc3545"></label>
                 </div>
                <button type="submit" id="btnsubmit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </div>
    </form>
</main>

@endsection
