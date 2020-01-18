<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="{{ asset('users/'.Auth::user()->photo)}}" class="img-responsive" alt="">
      </div>
      <div class="profile-usertitle">
        <div class="profile-usertitle-name">{{ Auth::user()->roles->jabatan }}</div>
        <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <!-- <form role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </form> -->
    <ul class="nav menu">
        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a href="{{route('home')}}"><em class="fa fa-home">&nbsp;</em> Beranda</a></li>

      @can('isGuru') <!-- menu guru -->      
        <li class="{{ Route::currentRouteName() == 'profilkelas' || Route::currentRouteName() == 'showdatasiswa'? 'active' : '' }}"><a href="{{route('profilkelas')}}"><em class="fa fa-user">&nbsp;</em> Profil Kelas</a></li>
        <li class="parent {{ Route::currentRouteName() == 'harian' || Route::currentRouteName() == 'buatrpph' || Route::currentRouteName() == 'mingguan' || Route::currentRouteName() == 'semester' || Route::currentRouteName() == 'semuarpp' || Route::currentRouteName() == 'showrpph' || Route::currentRouteName() == 'buatrpphkegiatan' ? 'active' : '' }}"><a data-toggle="collapse" href="#sub-item-1">
          <i class="fa fa-calendar">&nbsp;</i> Rencana Belajar <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-chevron-down"></em></span>
          </a>
          <ul class="children collapse" id="sub-item-1">
            <li><a class="{{ Route::currentRouteName() == 'harian' || Route::currentRouteName() == 'buatrpph' || Route::currentRouteName() == 'showrpph' || Route::currentRouteName() == 'buatrpphkegiatan'? 'active' : '' }}" href="{{route('harian')}}">
              <span class="fa fa-arrow-right">&nbsp;</span> Harian (RPPH)
            </a></li>
            <li><a class="{{ Route::currentRouteName() == 'mingguan' ? 'active' : '' }}" href="{{route('mingguan')}}">
              <span class="fa fa-arrow-right">&nbsp;</span> Mingguan (RPPM)
            </a></li>
            <li><a class="{{ Route::currentRouteName() == 'semester' ? 'active' : '' }}" href="{{route('semester')}}">
              <span class="fa fa-arrow-right">&nbsp;</span> Program Semester
            </a></li>
          </ul>
        </li>
        <li class="{{ Route::currentRouteName() == 'penilaian' ? 'active' : '' }}"><a href="{{route('penilaian')}}"><em class="fa fa-bar-chart">&nbsp;</em> Penilaian Anak Didik</a></li>
        <li class="{{ Route::currentRouteName() == 'penilaian' ? 'active' : '' }}"><a href="{{route('tanggalRPP')}}" class="count-info"><em class="fa fa-clone">&nbsp;</em> Nilai Anak <span class="label label-primary">N</span></a></li>
      @endcan

      @can('isAdmin') <!-- menu admin -->
        <li class="{{ Route::currentRouteName() == 'dataguru' || Route::currentRouteName() == 'tambahdataguru' || Route::currentRouteName() == 'editdataguru' || Route::currentRouteName() == 'showdataguru' ? 'active' : '' }}"><a href="{{route('dataguru')}}" class="count-info"><em class="fa fa-user">&nbsp;</em> Data Guru</a></li>
        <li class="{{Route::currentRouteName() == 'datasiswa' || Route::currentRouteName() == 'tambahdatasiswa' || Route::currentRouteName() == 'showdatasiswa' || Route::currentRouteName() == 'editdatasiswa' ? 'active' : ''}}"><a href="{{route('datasiswa')}}" class="count-info"><em class="fa fa-user-o">&nbsp;</em> Data Siswa</a></li>
        <li class="{{Route::currentRouteName() == 'showkelassentra' || Route::currentRouteName() == 'tambahkelas' || Route::currentRouteName() == 'tambahsentra' || Route::currentRouteName() == 'editkelas' || Route::currentRouteName() == 'editsentra'  ? 'active' : ''}}"><a href="{{route('showkelassentra')}}" class="count-info"><em class="fa fa-square-o">&nbsp;</em> Data Kelas</a></li>
        <li><a href="{{route('showdatarpp')}}" class="count-info"><em class="fa fa-calendar">&nbsp;</em> Data Rencana Belajar</a></li>
        <li><a href="{{route('showdatanilai')}}" class="count-info"><em class="fa fa-star-o">&nbsp;</em> Data Penilaian Anak</a></li>
        <li><a href="" class="count-info"><em class="fa fa-book">&nbsp;</em> Progress Report</a></li>
      @endcan

      @can('isKepsek')
        <li class="{{ Route::currentRouteName() == 'dataguru' || Route::currentRouteName() == 'showdataguru' ? 'active' : '' }}"><a href="{{route('dataguru')}}" class="count-info"><em class="fa fa-user">&nbsp;</em> Data Guru</a></li>
        <li class="{{Route::currentRouteName() == 'datasiswa' || Route::currentRouteName() == 'showdatasiswa' ? 'active' : ''}}"><a href="{{route('datasiswa')}}" class="count-info"><em class="fa fa-user-o">&nbsp;</em> Data Siswa</a></li>
        <li class="{{Route::currentRouteName() == 'showkelassentra' ? 'active' : ''}}"><a href="{{route('showkelassentra')}}" class="count-info"><em class="fa fa-square-o">&nbsp;</em> Data Kelas</a></li>
        <li><a href="{{route('showdatarpp')}}" class="count-info"><em class="fa fa-calendar">&nbsp;</em> Data Rencana Belajar</a></li>
        <li><a href="{{route('showdatanilai')}}" class="count-info"><em class="fa fa-star-o">&nbsp;</em> Data Penilaian Anak</a></li>
      @endcan

        <li class="parent {{Route::currentRouteName() == 'showkompetensi' || Route::currentRouteName() == 'showaspek' || Route::currentRouteName() == 'showmateri' ? 'active' : ''}}">
          <a data-toggle="collapse" href="#sub-item-2">
            <i class="fa fa-list">&nbsp;</i> Data Komponen <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-chevron-down"></em></span>
          </a>

          <ul class="children collapse" id="sub-item-2">
            <li class="{{Route::currentRouteName() == 'showkompetensi'  ? 'active' : ''}}"><a href="{{route('showkompetensi')}}" class="count-info"><em class="fa fa-calendar">&nbsp;</em> Kompetensi</a></li>
            <li class="{{Route::currentRouteName() == 'showaspek'  ? 'active' : ''}}"><a href="{{route('showaspek')}}" class="count-info"><em class="fa fa-calendar">&nbsp;</em> Aspek</a></li>
            <li class="{{Route::currentRouteName() == 'showmateri'  ? 'active' : ''}}"><a href="{{route('showmateri')}}" class="count-info"><em class="fa fa-calendar">&nbsp;</em> Materi</a></li>
          </ul>
        </li>
        <li><a href="{{route('datasiswa')}}" class="count-info"><em class="fa fa-book">&nbsp;</em> Tutorial</a></li>
    </ul>
  </div><!--/.sidebar-->