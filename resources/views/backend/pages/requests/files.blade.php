
@extends('backend.layouts.master')

@section('title')
Orders Files - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Orders Files</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Files</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Orders Files</h4>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="20%">File Name</th>
                                    <th width="40%">Type</th>
                                    <th width="10%">Sent At</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($files as $file)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td><a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">{{ $file->file_name }}</a></td>
                                    <td>
                                    <?php
                                     if($user->category_type == 1){
                                         echo "From ".ucwords(getCountryName($user->from))." To ".ucwords(getCountryName($user->to));
                                      }elseif($user->category_type == 2){
                                         $selectedValues = array_intersect_key(getDraftCategories(), array_flip(json_decode($user->category)));
                                                                               echo implode(", ", $selectedValues);
                                      }else{
                                      $selectedValues = array_intersect_key(getNotaryCategories(), array_flip(json_decode($user->category)));
                                      echo implode(", ", $selectedValues);
                                      }
                                     ?>
                                    </td>
                                    <td>{{ $file->created_at }}</td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
<div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Set the Payment</h1>

        <form id="amount-form">
            @csrf
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="text" id="amount" name="amount" class="mt-1 p-2 w-full border rounded-md" required style="left: 50px; position: relative;" value="{{$payment->amount}}">
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700" style="top: -22px !important; position: relative;">Delivery Time</label>
                <textarea type="text" id="delivery" name="delivery" class="mt-1 p-2 w-full border rounded-md" required style="left: 15px; position: relative;">{{$payment->delivery_time}}</textarea>
            </div>
            <button  type="submit" class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Submit Payment
            </button>
        </form>
    </div>
    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

    document.getElementById('amount-form').addEventListener('submit', function (e) {
        e.preventDefault();

        fetch('/admin/set_amount', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({
                amount: document.getElementById('amount').value,
                delivery: document.getElementById('delivery').value,
                uuid: "<?=request()->segment(3)?>"
            })
        })
        .then(response => response.json())
        .then(data => {
        console.log(data)
            alert(data.message);
        });
    });
     </script>
@endsection
