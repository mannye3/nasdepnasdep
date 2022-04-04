@extends('layouts.admin')


@section('content')


 <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">KYC Documents</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total <span class="text-base">{{ \App\Models\Kyc::all()->count() }}</span> KYC documents.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="#" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                            <a href="#" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-download-cloud"></em></a>
                                        </div>

                                    </div>
                                </div><!-- .nk-block-head -->
                                         @if (Session::has('success'))
                               <div class="example-alert">
                                   <div class="alert alert-success alert-icon alert-dismissible">
                                       <em class="icon ni ni-cross-circle"></em>
                                       <strong>{{ Session::get('success')}}</strong>
                                   <button class="close" data-dismiss="alert"></button>
                               </div>
                               @endif
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">

                                           <div class="card-inner p-0">


                                            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">

                                                            <th class="nk-tb-col"><span class="sub-text">Company</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Registrant</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span>Document</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span>Submitted</span></th>
                                                            <th  class="nk-tb-col tb-col-mb"><span>Status</span></th>
                                                            <th  class="nk-tb-col tb-col-mb"><span>Checked By</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-right">&nbsp;
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ddalist as $ddakyc)
                                                        <tr class="nk-tb-item">

                                                            <td class="nk-tb-col">
                                                                <div class="user-card">

                                                                    <div class="user-info">
                                                                       <a href="{{route('ddakycdetails', $ddakyc->id)}}"> <span class="tb-lead">{{$ddakyc->name}}<span class="dot dot-success d-md-none ml-1"></span></span> </a>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">

                                                                    <div class="user-info">
                                                                        <span class="tb-lead">{{$ddakyc->user->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                                                        <span>{{$ddakyc->user->email}}</span>
                                                                    </div>
                                                                </div>
                                                            </td>


                                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                               <ul class="list-inline list-download">
                                                                <li> <a href="{{$ddakyc->doc}}" class="popup"><em class="icon ni ni-download"></em></a></li>

                                                            </ul>
                                                            </td>
                                                             <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                                <span class="tb-date">{{$ddakyc->created_at}}</span>
                                                            </td>

                                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                               @if ($ddakyc->status == 0)
                                                                <span class="badge badge-dim badge-sm badge-outline-primary">Pending</span>
                                                                <span data-toggle="tooltip" title="Pending at {{$ddakyc->updated_at}}" data-placement="top"><em class="icon ni ni-info"></em></span>
                                                                @endif

                                                                 @if ($ddakyc->status == 1)
                                                                 <span class="badge badge-dim badge-sm badge-outline-success">Approved</span>
                                                                 <span data-toggle="tooltip" title="Approved at {{$ddakyc->updated_at}}" data-placement="top"><em class="icon ni ni-info"></em></span>
                                                                 @endif

                                                                  @if ($ddakyc->status == 2)
                                                                 <span class="badge badge-dim badge-sm badge-outline-danger">Rejected</span>
                                                                 <span data-toggle="tooltip" title="Rejected at {{$ddakyc->updated_at}}" data-placement="top"><em class="icon ni ni-info"></em></span>
                                                                 @endif

                                                            </td>



                                                            <td class="nk-tb-col tb-col-md">
                                                                <div class="user-card">

                                                                <div class="user-name">
                                                                     @if ($ddakyc->status == 0)
                                                                        <span class="tb-lead"></span>
                                                                     @endif
                                                                     @if ($ddakyc->status == 1)
                                                                        <span class="tb-lead">{{$ddakyc->contractor->name}}</span>
                                                                     @endif
                                                                     @if ($ddakyc->status == 2)
                                                                        <span class="tb-lead">{{$ddakyc->contractor->name}}</span>
                                                                     @endif

                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                <li class="nk-tb-action-hidden">
                                                                    <a href="{{route('ddakycdetails', $ddakyc->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Quick View">
                                                                        <em class="icon ni ni-eye-fill"></em>
                                                                    </a>
                                                                </li>

                                                                 @if ($ddakyc->status == 0)
                                                              <li class="nk-tb-action-hidden">
                                                                    <a href="#"
                                                                                data-toggle="modal"
                                                                                data-target="#approve-{{ $ddakyc->id}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Approved">
                                                                        <em class="icon ni ni-check-fill-c"></em>
                                                                    </a>
                                                                </li>
                                                                <li class="nk-tb-action-hidden">
                                                                    <a data-toggle="modal"
                                                                                data-target="#reject-{{ $ddakyc->id}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Rejected">
                                                                        <em class="icon ni ni-cross-fill-c"></em>
                                                                    </a>
                                                                </li>
                                                                @endif


                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="{{route('ddakycdetails', $ddakyc->id)}}"><em class="icon ni ni-focus"></em><span>Quick Details</span></a></li>

                                                                                <li><a href="#"><em class="icon ni ni-user"></em><span>View Registrant Profile</span></a></li>
                                                                                <li class="divider"></li>

                                                                                 @if ($ddakyc->status == 0)
                                                                                <li><a href="#"><em class="icon ni ni-check-round"></em><span>Approved</span></a></li>
                                                                                <li><a href="#"><em class="icon ni ni-na"></em><span>Rejected</span></a></li>
                                                                                @endif
                                                                                <li><a href="#"
                                                                                data-toggle="modal"
                                                                                data-target="#deleteLead"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
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
                                             </div><!-- .card-inner -->


                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>

   <!-- @@ organization lead Delete Modal @e -->
      @foreach ($ddalist as $ddakyc)
  <div class="modal fade" id="reject-{{ $ddakyc->id}}">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <a href="#" class="close" data-dismiss="modal"
            ><em class="icon ni ni-cross"></em
          ></a>
          <div class="modal-body modal-body-sm text-center">
            <div class="nk-modal py-4">
              <em
                class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"
              ></em>
              <h4 class="nk-modal-title">Are You Sure ?</h4>
              <div class="nk-modal-text mt-n2">
                <p class="text-soft">
                You are about to <b>Reject  {{ $ddakyc->name}}</b> Details.
                </p>
              </div>
              <ul class="d-flex justify-content-center gx-4 mt-4">
                <li>
                    <form  method="POST" action="{{ route('rejectddaKyc', $ddakyc->id)}}" >
                                        @csrf
                                        <input name="status" hidden value="2"  >
                  <button

                    class="btn btn-success"
                  >
                    Yes, Reject it
                  </button>
                    </form>
                </li>
                <li>
                  <button
                    data-dismiss="modal"
                    data-toggle="modal"
                    data-target="#editEventPopup"
                    class="btn btn-danger btn-dim"
                  >
                    Cancel
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
     @endforeach
    <!-- .modal -->



     <!-- @@ organization lead Delete Modal @e -->
     @foreach ($ddalist as $ddakyc)
    <div class="modal fade" id="approve-{{ $ddakyc->id}}">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <a href="#" class="close" data-dismiss="modal"
            ><em class="icon ni ni-cross"></em
          ></a>
          <div class="modal-body modal-body-sm text-center">
            <div class="nk-modal py-4">
              <em
                class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"
              ></em>
              <h4 class="nk-modal-title">Are You Sure ?</h4>
              <div class="nk-modal-text mt-n2">
                <p class="text-soft">

                You are about to <b>Approve  {{ $ddakyc->name}}</b> Details.
                </p>
              </div>
              <ul class="d-flex justify-content-center gx-4 mt-4">
                <li>
                     <form  method="POST" action="{{ route('approveddaKyc', $ddakyc->id)}}" >
                                        @csrf
                                        <input name="status" hidden value="1"  >
                  <button type="submit"

                    class="btn btn-success"
                  >
                    Yes, Approve it
                  </button>
                  </form>
                </li>
                <li>
                  <button
                    data-dismiss="modal"
                    data-toggle="modal"
                    data-target="#editEventPopup"
                    class="btn btn-danger btn-dim"
                  >
                    Cancel
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
     @endforeach
    <!-- .modal -->

@endsection
