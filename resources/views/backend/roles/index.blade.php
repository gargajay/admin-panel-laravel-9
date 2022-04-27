<x-admin-layout >

   

    <x-slot name="heading">
        Admin Dashboard
    </x-slot>
   
    <div class="content_inner table_content">
        <div class="material_request_outer">
             <div class="main_title">
                 {{$title}} List
             </div>
             <div class="add_new_product">
               <a class="view_all create" href="#">+ Add New {{$title}}</a>
               <input class="custom_input search" type="text" placeholder="Type here..." name="">
            </div>
        </div>
        <div class="table-responsive">
          <table id="example1" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                  <th>
                    S.no
                  </th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @forelse ($items as $item)
                    
                    <tr>
                        <td>{{ $i }}</td>  
                        <td>{{$item->name}}</td>
                        <td>
                            <div class="status_div">
                                <div class="toggle-switch">
                                <input type="checkbox" id="chkTest" name="chkTest">
                                <label for="chkTest">
                                    <span class="toggle-track"></span>
                                </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="" class=" "><i class="fa fa-trash text-danger"></i></a>&nbsp;&nbsp;
                            <a href="" class=" "><i class="fa fa-edit text-sucess"></i></a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @empty
                    <tr>
                        <td >No Record Found !</td>
                    </tr>
                @endforelse
            </tbody> 
            </table>
          

        </div>

     


        <br/>
        <div class="row">
            <div class="col-sm-12 col-md-7">
                {{$items->render()}}
                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example1_previous">
                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>


    </div> 

      
    
</x-admin-layout>