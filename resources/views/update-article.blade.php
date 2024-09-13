@extends('layout.template')

@section('content')

<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

@if(session('success'))
<div id="alert-message" class="hidden">
    <script>
        $(document).ready(function() {
            toastr.options = {
                "positionClass": "toast-top-center",
                "progressBar": true,
                "timeOut": 4000
            };
            toastr.success('{{ session('success') }}');
        });
    </script>
</div>
@endif


<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">өнімнің жалпы саны
                </h4>
                <div class="stats-figure"> {{$Totalproducts}}</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">сатып алудың толық бағасы</h4>
                <div class="stats-figure">{{number_format($Totalachat, 2) }} ₸</div>
               
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">толық сату бағасы
                </h4>
                <div class="stats-figure">{{number_format($Totalvente, 2)}} ₸</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->

    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">пайда
                </h4>
                <div class="stats-figure">{{number_format($gain, 2)}} ₸</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    
    


    
</div>
<h1 class="app-page-title">Өнім</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Өнім</h3>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="settings-form" method="POST" action="/update/{{$article->id}}" >
                    @csrf
                   
                    <div class="mb-3">
                        <label for="setting-input-2" class="form-label">Өнім атауы    </label>
                       
                        <input type="text" class="form-control" id="setting-input-2" name="titre" value="{{$article->titre}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label"> саны</label>
                        <input type="text" class="form-control" id="setting-input-2" name="qte" value="{{$article->qte}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label"> бірлік сатып алу бағасы</label>
                        <input type="text" class="form-control" id="setting-input-2" name="prixa" value="{{$article->prixa}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="setting-input-3" class="form-label">бірлік сату бағасы</label>
                        <input type="text" class="form-control" id="setting-input-2" name="prixv" value="{{$article->prixv}}" required>
                    </div>
                    <button type="submit" class="btn app-btn-primary">жаңарту</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
