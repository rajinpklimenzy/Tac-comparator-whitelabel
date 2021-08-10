@extends('layouts.admin-layout')

@section('title', 'Home')



@section('content')

<!-- content-start -->

          <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
            <!-- begin:: Content Head -->
            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
              <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                  <h3 class="kt-subheader__title">
                    Product List
                  </h3>
                  <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                  <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      # Total </span>
                    <form class="kt-margin-l-20" id="kt_subheader_search_form">
                      <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                        <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero" />
                              </g>
                            </svg>
                            <!--<i class="flaticon2-search-1"></i>-->
                          </span>
                        </span>
                      </div>
                    </form>
                      <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                          <a href="{{route('admin.add-admin-users')}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                              <span>
                                  <i class="fas fa-tasks"></i>
                                  <span>
                                      Add Admin
                                  </span>
                              </span>
                          </a>
                      </div>
                  </div>

                  <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
                    <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
                    <div class="btn-toolbar kt-margin-l-20">
                      <div class="dropdown" id="kt_subheader_group_actions_status_change">
                        <button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                          Update Status
                        </button>
                        <div class="dropdown-menu">
                          <ul class="kt-nav">
                            <li class="kt-nav__section kt-nav__section--first">
                              <span class="kt-nav__section-text">Change status to:</span>
                            </li>
                            <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="1">
                                <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
                              </a>
                            </li>
                            <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="2">
                                <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
                              </a>
                            </li>
                            <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="3">
                                <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
                              </a>
                            </li>
                            <li class="kt-nav__item">
                              <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="4">
                                <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On Hold</span></span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <button class="btn btn-label-success btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
                        Fetch Selected
                      </button>
                      <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
                        Delete All
                      </button>
                    </div>
                  </div>
                </div>
                <div class="kt-subheader__toolbar">
                  <a href="#" class="">
                  </a>

                </div>
                  
              </div>
            </div>

            <!-- end:: Content Head -->

          

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid ">

              <!--begin::Portlet-->
              <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    
                  <!--begin: Datatable--> 

                  <div class="kt-datatable" id="kt_datatable_adminuser">

                  </div>

                  <!--end: Datatable--> 
                </div>
              </div>

              <!--end::Portlet-->

            
              <!--end::Modal-->
            </div>


            <!-- end:: Content -->



          </div>



@push('scripts')
<!-- content -end -->
<script type="text/javascript">
// kt-datatable

$(document).ready(function(){

  var datatable = $('#kt_datatable_adminuser').KTDatatable({
        
        // datasource definition
        data: {
          type: 'remote',
          source: {
            read: {
              url: "{{ route('product.data') }}",
              map: function(raw) {
                // sample data mapping
                var dataSet = raw;
                if (typeof raw.data !== 'undefined') {
                  dataSet = raw.data;
                }
                return dataSet;
              },
            },
          },
          pageSize: 10,
          serverPaging: true,
          serverFiltering: true,
          serverSorting: true,
        },
        
        // layout definition
        layout: {
          scroll: true,
          footer: false,
        },

        // column sorting
        sortable: true,

        pagination: true,

        search: {
          input: $('#generalSearch'),
        },
        
        // columns definition
        columns: [
//          {
//            field: 'id',
//            title: 'ID',
//            sortable: 'desc',
//            width: 40,
//            type: 'number',
//            selector: false,
//            textAlign: 'center',
//          }, 
          {
            field: 'product_id',
            title: 'Product ID',
            selector: false,
            textAlign: 'center',
          }, 
          {
            field: 'product_name',
            title: 'Product Name',
          }, 
          {
            field: 'type',
            title: 'Type',
            width: 70,
          }, 
          {
            field: 'name',
            title: 'Supplier Name',
          }, 
          {
            field: 'logo',
            title: 'Logo',
              template:function(t, e) {
                   return `<img src="${t.logo}" class="" alt="logo" width="100"/>`;
              }

          }, 
          
          {
            field: 'postalcode',
            title: 'Postal Code',
            width: 80,
          },
          {
          field:"Actions",
          width:110,
          title:"Actions",
          sortable:!1,
          overflow:"visible",
            template:function(t, e) {
                   
                    let featured = t.featured;
                    let actionEdit = "{{route('product.index')}}/" + t.id + '/edit';
                    let badge = '';
                    if (featured == 1) {
                       return `
                        <a href="${actionEdit}"  class="m-badge m-badge--metal m-badge--wide btn btn-success">Featured</a>`;
                    } else if (featured == 0) {
                       return `
                        <a href="${actionEdit}"  class="m-badge m-badge--metal m-badge--wide btn btn-danger">Notfeatured</a>`;
                    }
          
              }
        }
       
         
          ]

    }).on('kt-datatable--on-layout-updated', function () {
       laravelActions.initialize();
     });

});

   
</script>

@endpush
@endsection




