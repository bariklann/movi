@extends('admin.layouts.base')
@section('title', ' Transaction Movies')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">Transaction Movies</div>
                </div>

                <div class="card-body">
                    <br>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <table id="transaction" class="table table-bordered table-hover">
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
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($transactions as $transaction)
                                    {{-- {{ dd($transaction) }} --}}
                                    <tr>
                                        <td>{{$no++ }}</td>
                                        <td>{{$transaction->package->name }}</td>
                                        <td>{{$transaction->user->name }}</td>
                                        <td>{{$transaction->amount }}</td>
                                        <td>{{$transaction->transaction_code }}</td>
                                        <td>{{$transaction->status }}</td>
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
        $('#transaction').DataTable(); // Menginisialisasi DataTables pada tabel
</script>
@endsection

