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
                    Postal Code
                  </h3>
                  
                  <!--<span class="kt-subheader__separator kt-subheader__separator--v"></span>-->
                  <div class="kt-subheader__group" id="kt_subheader_search">
                    <!--<form class="kt-margin-l-20" id="kt_subheader_search_form">-->
                    <!--  <div class="kt-input-icon kt-input-icon--right kt-subheader__search">-->
                    <!--    <input type="text" class="form-control" placeholder="Search..." id="generalSearch">-->
                    <!--    <span class="kt-input-icon__icon kt-input-icon__icon--right">-->
                    <!--      <span>-->
                    <!--        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">-->
                    <!--          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                    <!--            <rect id="bound" x="0" y="0" width="24" height="24" />-->
                    <!--            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3" />-->
                    <!--            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero" />-->
                    <!--          </g>-->
                    <!--        </svg>-->
                            <!--<i class="flaticon2-search-1"></i>-->
                    <!--      </span>-->
                    <!--    </span>-->
                    <!--  </div>-->
                    <!--</form>-->
                      <!--<div class="col-xl-4 order-1 order-xl-2 m--align-right">-->
                      <!--    <a href="{{route('postalcode.create')}}" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">-->
                      <!--        <span>-->
                      <!--            <i class="fas fa-tasks"></i>-->
                      <!--            <span>-->
                      <!--                Add Postal Code-->
                      <!--            </span>-->
                      <!--        </span>-->
                      <!--    </a>-->
                      <!--</div>-->
                  </div>

                </div>
                <div class="kt-subheader__toolbar">
                  <a href="#" class="">
                  </a>
                <!--<button type="submit" class="btn btn-success submit">Submit to display municipality</button>-->
                </div>
                
                  <!--</form>  -->
              </div>
            </div>

            <!-- end:: Content Head -->


            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

              <!--begin::Portlet-->
              <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    
                  <!--begin: Datatable--> 

                  <!--<div class="kt-datatable" id="kt_datatable_adminuser">-->

                  <!--</div>-->

                  <!--end: Datatable--> 
                  
                      <table class="table">
                      <thead>
                         <tr>
                             <th> SL NO</th>
                             <th> Postal Code </th>
                         </tr>
                     </thead>
                     <tbody>
                       @foreach($json as $postal)
                         @foreach($postal as $key => $value)
                            <tr>
                               <td> {{$loop->iteration}}  </td>
                               <td>
                                   <form method="POST" action="{{route('postalcode.update', $key)}}" enctype="multipart/form-data">
                                       {{csrf_field()}}
                                       <input type="hidden" name="_method" value ="PUT"/>
                                       <button type="submit" class="btn btn-success submit">{{$key}}</button>
                                       <a href="{{route('postalcode.create'),$key}}"></a>
                                   </form>
                                   
                               </td>
                               <td>
                                   <div class="form-group">
                                    <!--<form method="POST" action="{{route('postalcode.store')}}" enctype="multipart/form-data">-->
                                    <!--    {{csrf_field()}}-->
                                            <input type="checkbox" name="check"  id="check" check="checked" value="{{$key}}">
                                        
                                    <!--</form>-->
                                    </div>
                                    <!--<div class="form-group">-->
                                      <!--<label for="{{$key}}">  <input type="checkbox" value="{{$key}}" id="postalcode" name="postalcode">-->
                                    <!--</div>-->

                               </td>
                               
                            </tr>
                         @endforeach
                       @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              <!--end::Portlet-->

            
              <!--end::Modal-->
            </div>


            <!-- end:: Content -->



          </div>
@endsection


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
              url: "{{ route('postalcode.data') }}",
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
          {
            field: 'id',
            title: 'ID',
            sortable: 'desc',
            width: 60,
            type: 'number',
            selector: false,
            textAlign: 'center',
          }, 
          {
            field: 'postalcode',
            width: 120,
            title: 'Postal Code',
          },
          {
            field: 'area',
            title: 'Area',
          },
          {
          field:"Actions",
          width:110,
          title:"Actions",
          sortable:!1,
          overflow:"visible",
          template:function(t,e,a) {
              let actionEdit = "{{route('postalcode.index')}}/" + t.id + '/edit';
              let actionDelete = "{{route('postalcode.index')}}/" + t.id;
            return `
                <a href="${actionEdit}"  class="kt-portlet__nav-link btn kt-btn kt-btn--hover-accent kt-btn--icon kt-btn--icon-only kt-btn--pill" title="Edit details" ><i class="fas fa-user-edit"></i></a>
                <a href="${actionDelete}" data-method="delete" data-confirm="Are you sure you want to delete ?" class="kt-portlet__nav-link btn kt-btn kt-btn--hover-danger kt-btn--icon kt-btn--icon-only kt-btn--pill" title="Delete"><i class="fas fa-trash"></i></a>`
          }
        }
         
          ]

    }).on('kt-datatable--on-layout-updated', function () {
       laravelActions.initialize();
     });
      
});

//  Store postalcode in database
$(document).ready(function() {
//   $('#postalcheck').click(()=>{
    // alert("working");
        // $.ajax({
        // method: 'POST',
        // url: '{{route('postalcode.store')}}',
        // data: {},
        // success: function( response ){
        //     console.log( response );
        // },
        // error: function( e ) {
        //     console.log(e);
        // }
        // });
        
        
//   });
  
  $('#check').click(function(){
                var value= $(this).is(':checked');
                $.ajax({
                    url: '{{route('postalcode.store')}}',
                    type: 'POST',
                    data: {check:value},
                    success: function(data) {
                        alert(data);
                    },
                    error: function( data ) {
                        alert(data);
                    }
                });
            });
});



   
</script>

@endpush





