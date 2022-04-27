<x-admin-layout >


    <x-slot name="heading">
        Admin Dashboard
    </x-slot>
        <div class="dashbaord_outer">
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard_inner">
                        <div class="dash_inner_left">
                            <div class="count_title">86,000</div>
                            <p>Total Material Sold</p>
                        </div>
                        <div class="dash_inner_right">
                            <img src="{{publicPath()}}/assets/images/icon1.png" alt="icon1">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard_inner">
                        <div class="dash_inner_left">
                            <div class="count_title">86,000</div>
                            <p>Material Request</p>
                        </div>
                        <div class="dash_inner_right">
                            <img src="{{publicPath()}}/assets/images/icon2.png" alt="icon2">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard_inner">
                        <div class="dash_inner_left">
                            <div class="count_title">86,000</div>
                            <p>Cancelled Orders</p>
                        </div>
                        <div class="dash_inner_right">
                            <img src="{{publicPath()}}/assets/images/icon3.png" alt="icon3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="content_inner table_content">
            <div class="material_request_outer">
                 <div class="main_title">Material Request</div>
                 <div class="material_request_right">
                    <ul class="material_ul">
                        <li class="noti_li"><i class="fa-solid fa-bell"></i> 15</li>
                        <li><a class="view_all" href="#">View All</a></li>
                    </ul>
                 </div>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>ID</th>
                            <th>Services</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <div class="name_td">
                            <div class="img_li">
                                <img src="{{publicPath()}}/assets/images/client.jpg" alt="p1">
                                <span>Clifford</span>
                            </div>
                            </div>
                        </td>
                        <td>Hall</td>
                        <td>Hall@gmail.com</td>
                        <td>#1234567</td>
                        <td>House</td>
                        <td>3-22-2022</td>
                        <td>
                            <select class="approve_select">
                                <option>Approve</option>
                                <option>Disapprove</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="name_td">
                            <div class="img_li">
                                <img src="{{publicPath()}}/assets/images/client.jpg" alt="p1">
                                <span>Clifford</span>
                            </div>
                            </div>
                        </td>
                        <td>Hall</td>
                        <td>Hall@gmail.com</td>
                        <td>#1234567</td>
                        <td>House</td>
                        <td>3-22-2022</td>
                        <td>
                            <select class="approve_select">
                                <option>Approve</option>
                                <option>Disapprove</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="name_td">
                            <div class="img_li">
                                <img src="{{publicPath()}}/assets/images/client.jpg" alt="p1">
                                <span>Clifford</span>
                            </div>
                            </div>
                        </td>
                        <td>Hall</td>
                        <td>Hall@gmail.com</td>
                        <td>#1234567</td>
                        <td>House</td>
                        <td>3-22-2022</td>
                        <td>
                            <select class="approve_select">
                                <option>Approve</option>
                                <option>Disapprove</option>
                            </select>
                        </td>
                        </tr>
                    </tbody> 
                        
                </table>
            </div>
        </div> 

      
    
</x-admin-layout>