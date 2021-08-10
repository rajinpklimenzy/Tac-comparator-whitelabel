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
                          Add new contact
                        </h3>
                      </div>
                    </div>

                    <!--begin::Form-->
                  
                      <form class="kt-form kt-form--label-right" method="post" action="{{url('admin/add-subscriptions')}}">
{{csrf_field()}}
                      <div class="kt-portlet__body">
                       <!--  <div class="form-group form-group-last">
                          <div class="alert alert-secondary" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                            <div class="alert-text">
                              Here are examples of <code>.form-control</code> applied to each textual HTML5 input type:
                            </div>
                          </div>
                        </div> -->
                        <div class="form-group row">
                          <label for="example-text-input" class="col-2 col-form-label">Email</label>
                          <div class="col-10">
                            <input class="form-control" required="" type="email" name="email" id="example-text-input">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-search-input" class="col-2 col-form-label">First name</label>
                          <div class="col-10">
                            <input class="form-control" required="" type="text" name="f_name"  id="example-search-input">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-email-input" class="col-2 col-form-label">Last name</label>
                          <div class="col-10">
                            <input class="form-control" required="" type="tesxt" name="l_name" id="example-email-input">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="example-url-input" class="col-2 col-form-label">Phone Number</label>
                          <div class="col-10">
                            <input class="form-control" name="phone" required="" type="number" >
                          </div>
                        </div>
                        
                       
                      </div>
                      <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                          <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                              <button type="submit" class="btn btn-success">Submit</button>
                              <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                          </div>
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
 



