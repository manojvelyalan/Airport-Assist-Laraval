@extends('layouts.common')

@section('content')
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i> Dashboard</h1>
            </div>
        </div>
        <div class="row">
        <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body ">
                        Welcome {{ Auth::user()->username }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
