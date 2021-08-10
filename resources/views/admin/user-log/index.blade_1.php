@extends('layouts.admin-table-layout')

@section('title', 'Home')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
              <li class="breadcrumb-item active">User Data Log</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><img src="{{url('admin/images/ac.png')}}" width="20px;"> User Data Log </h3>
            </div>
              <!--<button type="button" class="btn btn-info btn pull-right" data-toggle="modal" data-target="#myModal">add a contact</button>-->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Postal Code</th>
                  <th>Consumption (electricity)</th> 
                  <th>Current Supplier (gas)</th>
                  <th>Last Seen</th>
                  <th>IP Address</th>
                  <th>Action</th>
                 
                </tr>
                </thead>
                <tbody>
                    @foreach($userlog as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->full_name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->postal_code}}</td>
                        <td>{{$contact->consumption}}</td>
                        <td>{{$contact->currentsupplier}}</td>
                        <td>{{\Carbon\Carbon::parse($contact->last_seen)->format('d-m-Y h:i A')}}</td>
                        <td>{{$contact->ip_address}}</td>
                        <td><a href="#">Delete</a></td>
                    </tr>

                    @endforeach

                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->







   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">add a contact</h4>
        </div>
        <div class="modal-body">


<form method="post" action="{{url('admin/add-subscriptions')}}">
{{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" required="" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">First name</label>
                    <input type="text" required="" name="f_name" class="form-control" id="exampleInputEmail1" placeholder="First name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" required="" name="l_name" class="form-control" id="exampleInputEmail1" placeholder="Last name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" required="" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone Number">
                  </div>

                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  


    @endsection