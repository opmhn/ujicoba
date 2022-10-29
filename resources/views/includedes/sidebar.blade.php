<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <!-- <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('uploads/'.auth()->user()->profil) }}" alt="..." class="avatar-img rounded-circle">
                </div> -->
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->name }}
                            <span class="user-level"> <td>
                                @if (auth()->user()->level =='1')
                                   ADMIN
                                @else
                                   USER
                                @endif
                            </td></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('karyawan.edit',auth()->user()->id) }}">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                @if (Auth::user()->level == 2)
                        <li class="nav-item">
                            <a href="{{ route('artikel.index') }}">
                                <img src="{{ asset('icon/file-earmark-text.svg') }}" alt="">
                                <p>ARTIKEL</p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('karyawan.index') }}">
                                <img src="{{ asset('icon/person.svg') }}" alt="">
                                <p> KARYAWAN</p>

                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ route('wilayah.index') }}">
                                <img src="{{ asset('icon/geo-alt.svg') }}" alt="">
                                <p> WILAYAH</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}">
                                <img src="{{ asset('icon/clipboard-fill.svg') }}" alt="">
                                <p>KATEGORI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('artikel.index') }}">
                                <img src="{{ asset('icon/file-earmark-text.svg') }}" alt="">
                                <p>ARTIKEL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('slide.index') }}">
                                <img src="{{ asset('icon/image-fill.svg') }}" alt="">
                                <p>SLIDE</p>
                            </a>
                        </li>
                @endif
                <li class="nav-item active">
                    <a  href="{{route('actionlogout')}}">

                        <p> <img src="{{ asset('icon/box-arrow-left.svg') }}" alt=""> logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
