@extends('layout.template')

@section('content')
<!-- CSS Links -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 



@if(session('success'))
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
<form action="rapport" method="post">
    @csrf                            
    <div class="form-group">
        <label class="col-sm-3 col-xs-12 control-label">Ай/Жыл
            <span
                class="required">*</span></label>
        <div class="col-sm-5 col-xs-12">
            <input type="month" id="month" name="month" class="form-control" required>

        </div>
        <br>
        <div class="col-sm-4 col-xs-12 text-center"  >
            <button  class="btn btn-success"
           type="submit" >

                Сатылымдар туралы есеп жасаңыз</button>
        </div>
    </div>
</form>
<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">өнімдер
    </a>
</nav>
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Өнім атауы</th>
                                    <th>саны</th>
                                    <th>клиент аты</th>
                                    <th>мекенжайы</th>
                                    <th>жалпы сома</th>
                                    <th> әрекет </th>

                                    

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->client}}</td>
                                    <td>{{$article->product}}</td>
                                    <td>{{$article->qte}} </td>
                                    <td>{{$article->adresse}}  </td>
                                    <td>{{$article->totalprix}} ₸ </td>

                                    <td>
                                        <a href="/update/{{$article->id}}"> <button type="button" class="btn btn-success" ><i class="fas fa-edit"></i></button> </a>
                                        <a href="delete/{{$article->id}}">  <button type="button" class="btn btn-danger" ><i class="fas fa-trash"></i></button></a>
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
</div>
@endsection


<!-- JS Links -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

