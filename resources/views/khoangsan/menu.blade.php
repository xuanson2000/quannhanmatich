  <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="public/anh/{{Auth::guard('quantri')->user()->anh}}" class="img-circle" alt="User Image" />
            </div>

            <div class="pull-left info">
              @if(Auth::guard('quantri')->check())
              <p>{{Auth::guard('quantri')->user()->namclass}} </p>
              <a href="public/admin2/#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
              @endif
            </div>


          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Tìm kiếm ...." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
   
          <ul class="sidebar-menu">
        
            <li class="treeview">


              <a href="{{route('indexds')}}">
                <i class="fa fa-table"></i> <span>DANH SÁCH QUÂN NHÂN </span>
               
              </a>
            
            </li>


            <li class="treeview">


              <a href="{{route('baocao')}}">
                <i class="fa fa-table"></i> <span>BÁO CÁO -THỐNG KÊ </span>
               
              </a>
            
            </li>


         <!--    <li class="treeview">
              <a href="{{route('nguoidung')}}">
                <i class="fa fa-files-o"></i>
                <span> QUẢN TRỊ NGƯỜI DÙNG</span>
               
              </a>
             
            </li> -->
              <li class="treeview">
              <a href="public/admin2/#">
                <i class="fa fa-files-o"></i>
                <span> QUẢN TRỊ NGƯỜI DÙNG</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('nguoidung')}}"><i class="fa fa-circle-o"></i>Cập nhật người dùng</a></li>
                <li><a href="{{route('vaitro')}}"><i class="fa fa-circle-o"></i>Cập nhật vai trò </a></li>
               
              </ul>
            </li>

         

             
 
        
           <?php 
           $today = date("d-m-Y H:i:s");
            ?>
            <li style="font-size: 15px; color: #07F41E;" class="header">Hôm nay: {{$today}}</li>
         
          </ul>
        </section>
    
      </aside>