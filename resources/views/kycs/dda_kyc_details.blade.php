@extends('layouts.admin')


@section('content')


    <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">KYCs / <strong class="text-primary small">{{$kycdetails->name}}</strong></h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li>Application ID: <span class="text-base">{{$kycdetails->app_id}}</span></li>
                                                    <li>Submited At: <span class="text-base">{{$kycdetails->created_at}}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="html/kyc-list-regular.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/kyc-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row gy-5">
                                        <div class="col-lg-5">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Application Info</h5>
                                                    <p>Submission date, approve date, status etc.</p>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Submitted By</div>
                                                            <div class="data-value">{{$kycdetails->user->name}}</div>
                                                        </div>
                                                    </li>

                                                     <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Email</div>
                                                            <div class="data-value">{{$kycdetails->user->email}}</div>
                                                        </div>
                                                    </li>

                                                     <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Phone</div>
                                                            <div class="data-value">{{$kycdetails->user->phone}}</div>
                                                        </div>
                                                    </li>

                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Status</div>
                                                            <div class="data-value">

                                                                @if ($kycdetails->status == 0)
                                                                <span class="badge badge-dim badge-sm badge-outline-primary">Pending</span>
                                                                @endif

                                                                 @if ($kycdetails->status == 1)
                                                                 <span class="badge badge-dim badge-sm badge-outline-success">Approved</span>
                                                                 @endif

                                                                  @if ($kycdetails->status == 2)
                                                                 <span class="badge badge-dim badge-sm badge-outline-danger">Rejected</span>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Checked</div>
                                                            <div class="data-value">
                                                                <div class="user-card">
                                                                    <div class="user-avatar user-avatar-xs bg-orange-dim">
                                                                        <span>AB</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Saiful Islam</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Checked At</div>
                                                            <div class="data-value">19 Dec, 2019 05:26 AM</div>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </div><!-- .card -->
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Uploaded Documents</h5>
                                                    <p>Here is user uploaded documents.</p>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Document Type</div>
                                                            <div class="data-value"> <a href="{{$kycdetails->doc }}" download class="popup">Supporting Document<em class="icon ni ni-download"></em></a></div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-lg-7">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Applicant Information</h5>
                                                    <p>Basic info, like name, phone, address, country etc.</p>
                                                </div>
                                            </div>
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Company Name</div>
                                                            <div class="data-value">{{$kycdetails->name}}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">REG Number</div>
                                                            <div class="data-value">{{$kycdetails->number}}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Location</div>
                                                            <div class="data-value">{{$kycdetails->state->name}}</div>
                                                        </div>
                                                    </li>



                                                    <li class="data-item">
                                                        <div class="data-col">
                                                             <div class="data-label">About company</div>
                                                            <div class="data-value text-break">{!!$kycdetails->profile!!}</div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>


        @endsection
