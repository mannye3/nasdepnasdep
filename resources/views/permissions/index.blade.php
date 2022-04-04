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
                                            <h3 class="nk-block-title page-title">Permissions</h3>
                                            <div class="nk-block-des text-soft">

                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        @can('role-create')  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Add New</button> @endcan



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

                                                <table class="datatable-init nk-tb-list nk-tb-ulist table-bordered" data-auto-responsive="false">
                                                    <thead>

                                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Action</span></th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($permissions as  $permission)
                                                        <tr class="nk-tb-item">

                                                            <td class="nk-tb-col">
                                                                <div class="user-card">

                                                                    <div class="user-info">
                                                                        {{ $permission->name }}
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="nk-tb-col tb-col-mb" data-order="580.00">
                                                                <a class="btn btn-info" href="" data-toggle="modal" data-target="#showModal-{{ $permission->id}}">Show</a>

                                                                @can('role-edit')
                                                                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#editModal-{{ $permission->id}}">Edit</a>

                                                                @endcan
                                                                @can('role-delete')
                                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $permission->id],'style'=>'display:inline']) !!}
                                                                    <a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal-{{ $permission->id}}">Delete</a>
                                                                        {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                                                                    {!! Form::close() !!}
                                                                @endcan
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
                                <h5 class="modal-title">Add Permission</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('permissions.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Name</label>
                                        <div class="form-control-wrap">
                                            <input name="name" type="text" class="form-control" id="full-name" required>
                                            <input name="guard_name" type="hidden" class="form-control" value="web">
                                        </div>
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


                @foreach ($permissions as  $permission)

                 <!-- EDIT Modal Form -->
                 <div class="modal fade" tabindex="-1" id="editModal-{{ $permission->id}}">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit {{$permission->name}}</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                {!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Name</label>
                                        <div class="form-control-wrap">
                                            <input name="name" value="{{$permission->name}}" type="text" class="form-control" id="full-name" required>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Save </button>
                                    </div>
                                    {!! Form::close() !!}
                            </div>
                            <div class="modal-footer bg-light">
                                <span class="sub-text"></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($permissions as $permission)

                <!-- DELETE Modal Form -->
                <div class="modal fade" tabindex="-1" id="deleteModal-{{ $permission->id}}">
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
                                <h4 class="nk-modal-title">You are about to delete {{ $permission->name}} Role?</h4>
                                <div class="nk-modal-text">
                                    <div class="caption-text">You can't undo this action.</div>

                                </div>
                                <div class="nk-modal-action">


                                    {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                        <button type="submit" class="btn btn-lg btn-mw btn-primary">Delete</button>
                                        {!! Form::close() !!}
                                </div>

                            </div>
                        </div><!-- .modal-body -->

                       </div>
                   </div>
               </div>
               @endforeach















@endsection
