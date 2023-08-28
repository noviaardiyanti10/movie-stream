@extends('admin.layouts.base');

@section('title', 'Transaction');
  
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Transactions</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table id="transaction-table" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Package</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Transaction Code</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $item)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$item->package->name}}</td>
                      <td>{{$item->user->name}}</td>
                      <td>{{$item->amount}}</td>
                      <td>{{$item->transaction_code}}</td>
                      <td>{{$item->status}}</td>
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

  @section('js')
  <script>
    $("#transaction-table").DataTable();
  </script>
      
  @endsection
