@extends('layouts.admin')


@section('content')
 <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Sectors</h3>
                                            <div class="nk-block-des text-soft">

                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        {{-- @can('role-create') <li><a href="{{ route('roles.create') }}" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Create New Role</span></a></li> @endcan --}}

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Add New</button>

                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                   <div class="card card-preview">
                                            <div class="card-inner">
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @endif

                                                <table class="datatable-init-export nk-tb-list nk-tb-ulist table-bordered" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">

                                                                    <label class="custom-control-label" for="uid"></label>
                                                                </div>
                                                            </th>
                                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                                             <th class="nk-tb-col"><span class="sub-text">Industry</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Action</span></th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sectors as $sector)
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">

                                                                    <div class="user-info">
                                                                        {{ $sector->name }}
                                                                    </div>
                                                                </div>
                                                            </td>


                                                             <td class="nk-tb-col">
                                                                <div class="user-card">

                                                                    <div class="user-info">
                                                                        {{ $sector->industry->name }}
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="nk-tb-col tb-col-mb" data-order="580.00">



                                                                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#editModal-{{$sector->id}}">Edit</a>




                                                                    <a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal-{{ $sector->id}}">Delete</a>
                                                                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}


                                                            </td>


                                                        </tr><!-- .nk-tb-item  -->
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->




                 <!-- ADD Modal Form -->
    <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('addSector')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Name</label>
                            <div class="form-control-wrap">
                                <input name="name" type="text" class="form-control" id="full-name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Industry: </label>
                            <select name="industry_id" class="form-control  ">
                                @foreach($industries as $industry)
                                <option   value="{{ $industry->id }}">
                                    {{$industry->name }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text"></span>
                </div>
            </div>
        </div>
    </div>


    @foreach ($sectors as  $sector)

    <!-- SHOW Modal Form -->
    <div class="modal fade" tabindex="-1" id="editModal-{{ $sector->id}}">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">{{$sector->name}}</h5>
                   <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                       <em class="icon ni ni-cross"></em>
                   </a>
               </div>
               <div class="modal-body">
               <form  method="POST" action="{{ route('editSector', $sector->id)}}" >
                                @csrf
                       <div class="form-group">
                           <label class="form-label" for="full-name">Name</label>
                           <div class="form-control-wrap">
                               <input name="name"  value="{{$sector->name}}" type="text" class="form-control" id="full-name" required>
                           </div>
                       </div>

                       <div class="form-group">
                           <label class="form-label">Industry: </label>
                           <select name="industry_id" class="form-control  ">
                            @foreach($industries as $industry)
                            <option {{ ($industry->id) == $sector->industry_id ? 'selected' : '' }}  value="{{ $industry->id }}">
                                {{$industry->name }}</option>
                                @endforeach
                        </select>
                       </div>


               </div>
               <div class="modal-footer bg-light">
                   <button type="submit" class="btn btn-lg btn-mw btn-primary">Submit</button>
                   <span class="sub-text"></span>
               </div>
                   </form>
           </div>
       </div>
   </div>
   @endforeach







                    @foreach ($sectors as $sector)

                    <!-- DELETE Modal Form -->
                    <div class="modal fade" tabindex="-1" id="deleteModal-{{ $sector->id}}">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">

                                   <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                       <em class="icon ni ni-cross"></em>
                                   </a>
                               </div>
                               <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross-circle bg-danger"></em>
                                    <h4 class="nk-modal-title">You are about to delete {{ $sector->name}} </h4>
                                    <div class="nk-modal-text">
                                        <div class="caption-text">You can't undo this action.</div>

                                    </div>
                                    <div class="nk-modal-action">

                                            <form  method="POST" action="{{ route('deleteSector', $sector->id)}}" >
                                        @csrf

                                            <button type="submit" class="btn btn-lg btn-mw btn-primary">Delete</button>

                                            </form>

                                    </div>

                                </div>
                            </div><!-- .modal-body -->

                           </div>
                       </div>
                   </div>
                   @endforeach




@endsection
