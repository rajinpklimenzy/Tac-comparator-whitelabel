@extends('layouts.admin-layout')

@section('title', 'Home')



@section('content')
  <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="row">
                  
                <div class="col-md-12">
                    
                  <!--begin::Portlet-->
                  <div class="kt-portlet">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                          Add Admin
                        </h3>
                      </div>
                      <div class="kt-portlet__head-tools">
                        <a href="{{route('admin.admin-users.index')}}" class="btn btn-secondary">
                            <span>
                                <i class="fa fa-chevron-left"></i>
                                <span>
                                    Back
                                </span>
                            </span>
                        </a>
                     </div>
                    </div>

                    <!--begin::Form-->
                  
                      <form class="kt-form kt-form--label-right" method="post" action="{{url('admin/add-admin-users')}}">
                        {{csrf_field()}}
                      <div class="kt-portlet__body">  
                          
                          <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                              <label for="example-search-input" class="col-2 col-form-label">Name</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input" placeholder="Name" name="name" value="{{ old('name') }}" required="required">
                                  @if ($errors->has('name'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('name') }}</div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                              <label for="example-search-input" class="col-2 col-form-label">Email</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input" placeholder="Email" name="email" value="{{ old('email') }}" required="required">
                                  @if ($errors->has('email'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('email') }}</div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row {{ $errors->has('role') ? ' has-danger' : '' }}">
                              <label for="example-search-input" class="col-2 col-form-label">Role</label>
                              <div class="col-8">
                                  <select class="form-control m-input m-input--solid" id="packageType" name="role" required="required">
                                      <option>--select--</option>
                                      @foreach($role as $value )
                                      <option value="{{$value->id}}">{{$value->guard_name}}</option>
                                      @endforeach
                                  </select> 
                                  @if ($errors->has('role'))
                                  <span  id="first_name-error" class="form-control-feedback">{{ $errors->first('role') }}</span>
                                  @endif
                              </div>
                          </div>
                        
                        <div class="form-group row">
                          <label for="example-email-input" class="col-2 col-form-label">Password</label>
                          <div class="col-8">
                            <input class="form-control"  type="password" name="password" id="example-email-input">
                          </div>
                        </div>
                          
                        <div class="form-group row">
                          <label for="example-email-input" class="col-2 col-form-label">Confirm Password</label>
                          <div class="col-8">
                            <input class="form-control"  type="password" name="password_confirmation" id="example-email-input" required="required"  placeholder="Re-Enter Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">*{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                        </div>  
                       
                        
                       
                      </div>

                        <div class="clearfix"></div>
                        <div class="offset-5 kt-portlet__foot kt-portlet__foot--fit ">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-success submit">
                                    Submit
                                </button>
                                <a href="{{ route('admin.admin-users.index') }}" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                  </div>

                  <!--end::Portlet-->
                </div>


              
              </div>
            </div>

            <!-- end:: Content -->

  @endsection
 



