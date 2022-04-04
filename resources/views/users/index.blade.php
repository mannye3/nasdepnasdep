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
                                            <h3 class="nk-block-title page-title">Users</h3>
                                            <div class="nk-block-des text-soft">

                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">


                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Add New User</button>

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

                                                @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                                <table class="datatable-init nk-tb-list nk-tb-ulist table-bordered" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">

                                                                    <label class="custom-control-label" for="uid"></label>
                                                                </div>
                                                            </th>
                                                            <th class="nk-tb-col"><span class="sub-text">First Name</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Last Name</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Role</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Action</span></th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $key => $user)
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                {{ ++$i }}
                                                            </td>
                                                            <td class="nk-tb-col">

                                                                        {{ $user->fname }}

                                                            </td>


                                                            <td class="nk-tb-col">

                                                                        {{ $user->name }}

                                                            </td>
                                                            <td class="nk-tb-col">


                                                                    <div class="user-info">
                                                                        {{ $user->email }}

                                                            </td>

                                                            <td class="nk-tb-col">

                                                                @if(!empty($user->getRoleNames()))
                                                                @foreach($user->getRoleNames() as $v)
                                                                   <label class="badge badge-success">{{ $v }}</label>
                                                                @endforeach
                                                              @endif
                                                            </td>

                                                            <td class="nk-tb-col tb-col-mb" data-order="580.00">
                                                                <a class="btn btn-info" href="" data-toggle="modal" data-target="#showModal-{{ $user->id}}">Show</a>

                                                                @can('role-edit')
                                                                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#editModal-{{ $user->id}}">Edit</a>

                                                                @endcan
                                                                @can('role-delete')
                                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $user->id],'style'=>'display:inline']) !!}
                                                                    <a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal-{{ $user->id}}">Delete</a>
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
                    <h5 class="modal-title">Add New User</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Name</label>
                            <div class="form-control-wrap">
                                <input name="name" type="text" class="form-control" id="full-name" required>
                            </div>
                        </div>

                       


                        <div class="form-group">
                            <label class="form-label" for="full-name">Email</label>
                            <div class="form-control-wrap">
                                <input name="email" type="email" class="form-control" id="full-name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="full-name">Password</label>
                            <div class="form-control-wrap">
                                <input name="password" type="password" class="form-control" id="full-name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="full-name">Confirm Password</label>
                            <div class="form-control-wrap">
                                <input name="confirm-password" type="password" class="form-control" id="full-name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Role: </label>

                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
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


    @foreach ($data as $key => $user)

    <!-- SHOW Modal Form -->
   <div class="modal fade" tabindex="-1" id="showModal-{{ $user->id}}">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">{{$user->name}}</h5>
                   <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                       <em class="icon ni ni-cross"></em>
                   </a>
               </div>
               <div class="modal-body">

                       <div class="form-group">
                           <label class="form-label" for="full-name">Name</label>
                           <div class="form-control-wrap">
                               <input name="name" readonly value="{{$user->name}}" type="text" class="form-control" id="full-name" required>
                           </div>
                       </div>


                       <div class="form-group">
                        <label class="form-label" for="full-name">Email</label>
                        <div class="form-control-wrap">
                            <input name="name" readonly value="{{$user->email}}" type="text" class="form-control" id="full-name" required>
                        </div>
                    </div>

                       <div class="form-group">
                           <label class="form-label">Role: </label>
                           <ul class="custom-control-group g-3 align-center">
                               <li>





                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                               </li>

                           </ul>
                       </div>

               </div>
               <div class="modal-footer bg-light">
                   <span class="sub-text"></span>
               </div>
           </div>
       </div>
   </div>
   @endforeach




   @foreach ($data as $key => $user)
                      <!-- EDIT Modal Form -->
                     <div class="modal fade" tabindex="-1" id="editModal-{{ $user->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit {{$user->name}}</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross"></em>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Name</label>
                                            <div class="form-control-wrap">
                                                <input name="name" value="{{$user->name}}" type="text" class="form-control" id="full-name" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Email</label>
                                            <div class="form-control-wrap">
                                                <input name="email" value="{{$user->email}}" type="text" class="form-control" id="full-name" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Password</label>
                                            <div class="form-control-wrap">
                                                <input name="password"  type="password" class="form-control" id="full-name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Confirm Password</label>
                                            <div class="form-control-wrap">
                                                <input name="confirm-password" type="password" class="form-control" id="full-name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Role: </label>
                                            <?php
                                                 $userRole = $user->roles->pluck('name','name')->all();
                                            ?>

                                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

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




                    @foreach ($data as $key => $user)

                    <!-- DELETE Modal Form -->
                    <div class="modal fade" tabindex="-1" id="deleteModal-{{ $user->id}}">
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
                                    <h4 class="nk-modal-title">You are about to delete {{ $user->name}} Account?</h4>
                                    <div class="nk-modal-text">
                                        <div class="caption-text">You can't undo this action.</div>

                                    </div>
                                    <div class="nk-modal-action">


                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-lg btn-mw btn-primary">Delete</button>
                                            {!! Form::close() !!}
                                    </div>

                                </div>
                            </div>

                           </div>
                       </div>
                   </div>

                   @endforeach





@endsection











