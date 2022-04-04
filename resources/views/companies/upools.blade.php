@extends('layouts.admin')

@section('title') UnPools @endsection

@section('content')
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Upools</h3>
                                            <div class="nk-block-des text-soft">
                                                <p></p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        {{-- <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li> --}}

                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                   <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="text-left">
                                                    @if (Session::has('success'))
                                                   <div class="example-alert">
                                                       <div class="alert alert-success alert-icon alert-dismissible">
                                                           <em class="icon ni ni-cross-circle"></em>
                                                           <strong>{{ Session::get('success')}}</strong>
                                                       <button class="close" data-dismiss="alert"></button>
                                                   </div>
                                               </div>
                                                   </div>

                                                   @endif



                                                   @if ($errors->any())
                                                   <div class="alert alert-danger">
                                                       <ul>
                                                           @foreach ($errors->all() as $error)
                                                       <li>{{ $error}}</li>
                                                           @endforeach
                                                       </ul>

                                                   </div>

                                             @endif



                                                    <table class="datatable-init-export nk-tb-list nk-tb-ulist table-bordered" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">

                                                            <th class="nk-tb-col"><span class="sub-text">#</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Registrant</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Stage</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Industry</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">TOI</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">TOF</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">TLA</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Turnover</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount</span></th>


                                                            <th class="nk-tb-col nk-tb-col-tools">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach  ($upools as $upool)
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                 {{ $loop->iteration }}
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                <span>{{ $upool->name }}</span>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <span>Reg Name</span>
                                                            </td>

                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <span>{{ $upool->growth_stage }}</span>
                                                            </td>

                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <span>{{ $upool->industry->name }}</span>
                                                            </td>

                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>{{ $upool->toi  }}</span>
                                                            </td>

                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>{{ $upool->tof }}</span>
                                                            </td>


                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>{{ $upool->ylaf }}</span>
                                                            </td>

                                                            <td class="nk-tb-col tb-col-md">
                                                                <span> <?php echo  number_format($upool->ylaf_turnover) ?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span> <?php echo  number_format($upool->amount) ?></span>
                                                            </td>





                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">


                                                                <li>
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="{{ url('upool', $upool->id)}}"><em class="icon ni ni-list-ol"></em><span>View</span></a></li>
                                                                                    <li><a href="" data-toggle="modal" data-target="#deleteModal-{{ $upool->id}}"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>


                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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



                @foreach ($upools as $upool)

                <!-- DELETE Modal Form -->
                <div class="modal fade" tabindex="-1" id="deleteModal-{{ $upool->id}}">
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
                                <h4 class="nk-modal-title">You are about to delete {{ $upool->name}} Account?</h4>
                                <div class="nk-modal-text">
                                    <div class="caption-text">You can't undo this action.</div>

                                </div>
                                <div class="nk-modal-action">


                                    <form  method="POST" action="{{ route('deleteUpool', $upool->id)}}" >
                                        @csrf
                                        <button type="submit" class="btn btn-lg btn-mw btn-primary">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                       </div>
                   </div>
               </div>

               @endforeach


                @endsection
