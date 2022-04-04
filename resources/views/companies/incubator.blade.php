
@extends('layouts.admin')

@section('title') Admin Dashboard @endsection

@section('content')

 <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            <div class="components-preview wide-md mx-auto">
                                <div class="nk-block-head nk-block-head-lg wide-sm">

                                    </div>
                                </div><!-- .nk-block-head -->

                                <div class="nk-block nk-block-lg">
                                     <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="title nk-block-title">{{ $company->name }}</h4>
                                            <div class="nk-block-des">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-preview">

                                        <div class="card-inner">
                                            <div class="text-left">    @if (Session::has('success'))
                                                <div class="example-alert">
                                                    <div class="alert alert-success alert-icon alert-dismissible">
                                                        <em class="icon ni ni-cross-circle"></em>
                                                        <strong>{{ Session::get('success')}}</strong>
                                                    <button class="close" data-dismiss="alert"></button>
                                                </div>
                                            </div>
                                                </div>

                                                @endif
                                                {{-- <div class="example-alert">
                                                    <div class="alert alert-danger alert-icon alert-dismissible">
                                                        <em class="icon ni ni-cross-circle"></em> <strong>Update failed</strong>! There is some technical issues. <button class="close" data-dismiss="alert"></button>
                                                    </div>
                                                </div> --}}


                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                    <li>{{ $error}}</li>
                                                        @endforeach
                                                    </ul>

                                                </div>

                                                @endif </div>
                                            <ul class="nav nav-tabs mt-n3">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-users"></em><span>Organization </span></a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tabItem4"><em class="icon ni ni-user"></em><span>Pools </span></a>
                                                </li>





                                                 <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tabItem8"><em class="icon ni ni-users"></em><span>Settings </span></a>
                                                </li>


                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tabItem5">
                                                    <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Organization  Information</h5>
                                        <div class="nk-block-des" style="text-align: left;">
                                            <div class="flex-shrink-0 mr-7">
                                                <div class="symbol symbol-50 symbol-lg-120">
                                                     <img src="{{ $company->logo }}"  height="100" width="200" alt="">
                                                </div>
                                            </div>

                                            <div class="flex-grow-1">

                                                <div class="d-flex align-items-center justify-content-between flex-wrap">

                                                    <div class="mr-3">
                                                        <div class="d-flex align-items-center mr-3">

                                                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $company->name }}</a>


                                                            <span class="badge badge-sm badge-success">{{ $company->industry->name }}</span>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5"><p>
                                                        {!! $company->about !!}</p></div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Basics</h6>
                                    </div>

                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">RC Number</span>
                                            <span class="data-value">{{$company->number}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Date Of Incorporation</span>
                                            <span class="data-value">{{$company->doi}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Experience</span>
                                            <span class="data-value">{{$company->ind_exp}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Website</span>
                                            <span class="data-value">{{$company->website}}</span>
                                        </div>
                                         <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Enterprises</span>
                                            <span class="data-value text-soft">{{ $company->enterprise->count() }}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Country</span>
                                            <span class="data-value">{{ $company->country->name }}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                     <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">State</span>
                                            <span class="data-value">{{ $company->state->name }}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item" data-tab-target="#address">
                                        <div class="data-col">
                                            <span class="data-label">Address</span>
                                            <span class="data-value">{{$company->addr}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                </div><!-- .nk-data -->


                                  {{-- <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Other Contact Details </h6>
                                    </div>



                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name-1">Principal Contact Name</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Principal Contact Email</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Principal Contact Phone</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>


                                                        </div>

                                                        <br>
                                                        <hr>
                                                        <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name-1">Enquiries Contact Name </label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Enquiries Contact Email</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Enquiries Contact Phone</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>


                                                        </div>


                                                        <br>
                                                        <hr>
                                                        <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name-1">Compliance Contact Name</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Compliance Contact Email</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Compliance Contact Phone</label>
                                                            <div class="form-control-wrap">

                                                            </div>
                                                        </div>
                                                    </div>


                                                        </div>




                                    <div class="data-item"  data-toggle="modal" data-target="#profile-edit">


                                    </div><!-- .data-item -->




                                    <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Settlement Bank Details</h6>
                                    </div>

                                     <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Bank Name</span>
                                            <span class="data-value"></span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Bank Branch</span>
                                            <span class="data-value"></span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                           <span class="data-label"> Bank Account Number</span>
                                            <span class="data-value"></span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                           <span class="data-label"> Bank Account Name``</span>
                                            <span class="data-value"></span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                </div><!-- .nk-data -->






                                </div><!-- .nk-data --> --}}

                                                </div>


                                        <div class="tab-pane" id="tabItem4">
                                                    <div class="tab-content">
                                                <div class="tab-pane active" id="file-grid-view">
                                                   <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu" style="float: right;">
                                                <ul class="nk-block-tools g-3">

                                                    <li class="nk-block-tools-opt">
                                                        <div class="drodown">
                                                            <a href="#add-manager" data-toggle="modal" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>

                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <br><br><br>
                                        </div><!-- .toggle-wrap -->
                                                    <div>

                                                       <table class="datatable-init nk-tb-list nk-tb-ulist table-bordered" data-auto-responsive="false">
                                                <thead>

                                                    <tr class="nk-tb-item nk-tb-head">

                                                        <th class="nk-tb-col"><span class="sub-text">#</span></th>
                                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Experience</span></th>
                                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Growth Stage</span></th>
                                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Industry</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach  ($pools as $pool)
                                                    <tr class="nk-tb-item">

                                                        <td class="nk-tb-col tb-col-md">
                                                            <span class="tb-amount">{{ $loop->iteration }}</span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                            <span class="tb-amount">{{ $pool->name }}</span>
                                                        </td>
                                                        <td class="nk-tb-col tb-col-md">
                                                            <span class="tb-amount">{{ $pool->exp }}</span>
                                                        </td>

                                                        <td class="nk-tb-col tb-col-md">
                                                            <span class="tb-amount">{{ $pool->growth_stage }}</span>
                                                        </td>

                                                        <td class="nk-tb-col tb-col-lg">
                                                            <span class="tb-amount">{{ $pool->industry->name }}</span>
                                                        </td>


                                                    </tr><!-- .nk-tb-item  -->
                                                    @endforeach
                                                </tbody>
                                            </table>
                                                    </div><!-- .nk-files -->



                                            </div>
                                                </div>

                                            </div>







                                            <div class="tab-pane" id="tabItem8">
                                                    <div class="tab-content">
                                                <div class="tab-pane active" id="file-grid-view">
                                                   <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="card">

                                                <div class="card-inner">

                                                   <div class="col-md-3">
                                            <div class="form-group">
                                                 <div class="symbol symbol-50 symbol-lg-120">
                                                     <img src="{{ $company->logo }}"  height="100" width="200" alt="">
                                                </div>
                                                <div class="form-label-group">
                                                    <label class="form-label">Change Logo <span class="text-danger">*</span></label>
                                                </div>
                                                <form  method="POST" action="{{ route('editCompany', $company->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" name="logo" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                                </div>
                                            </div>

                                            <br><br><br>

                                        </div><!-- .toggle-wrap -->
                                                    <div class="nk-files nk-files-view-grid">

                                                        <div class="row g-4">
                                                            <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-first-name">Company Name</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="name" class="form-control " type="text" value="{{ $company->name}}" />
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-first-name">REC NO</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="number" class="form-control" type="text" value="{{ $company->number}}" />
                                                                          <span class="invalid-feedback"></span>



                                                                      </div>
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-last-name">Date of incorporation</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="doi" type="date" class="form-control" value="{{ $company->doi}}"  />
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-email-address">Industry Expereince</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="ind_exp" type="text" class="form-control  " value="{{ $company->ind_exp}}" />
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">Country</label>
                                                                      <div class="form-control-wrap">
                                                                        <select name="country_id" class="form-control  ">
                                                                            @foreach($countries as $country)
                                                                    <option {{ ($country->id) == $company->country_id ? 'selected' : '' }}  value="{{ $country->id }}">
                                                                        {{$country->name }}</option>
                                                                        @endforeach
                                                                        </select>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">State</label>
                                                                      <div class="form-control-wrap">
                                                                        <select name="state_id" class="form-control  ">
                                                                            @foreach($states as $state)
                                                                            <option {{ ($state->id) == $company->state_id ? 'selected' : '' }}  value="{{ $state->id }}">
                                                                                {{$state->name }}</option>
                                                                                @endforeach
                                                                        </select>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                            <div class="col-md-4">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">Type </label>
                                                                      <div class="form-control-wrap">
                                                                        <select name="type" class="form-control  ">
                                                                            <option value="{{ $company->type}}"> {{ $company->type}} </option>
                                                                            <option value="LTD">LTD</option>
                                                                            <option value="PLC">PLC</option>

                                                                        </select>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                               <div class="col-md-4">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">Website </label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="website" type="text" class="form-control  " value="{{ $company->website}}"  />
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                                <div class="col-md-4">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">Email </label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="email" type="text" class="form-control  " value="{{ $company->email}}"/>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                               <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">About Company</label>
                                                                      <div class="form-control-wrap">
                                                                        <textarea class="summernote-basic" id="kt-tinymce-4" name="about">
                                                                            {{ $company->about}}
                                                                        </textarea>

                                                                      </div>
                                                                  </div>
                                                              </div>


                                                              <hr>
                                                                  <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <div class="form-label-group">
                                                                      <label class="form-label">Company Address <span class="text-danger">*</span></label>
                                                                  </div>
                                                                  <div class="form-control-group">
                                                                    <textarea name="addr" class="summernote-basic">{{ $company->addr}}</textarea>

                                                                  </div>
                                                              </div>
                                                          </div><!-- .col -->

                                                          <div class="form-group row mt-10">
                                                            <label class="col-3"></label>

                                                        <button type="submit" class="btn btn-xl btn-primary">Save changes</button>
                                                        </div>

                                                      </div><!-- .row -->
                                                    </div><!-- .nk-files -->



                                            </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- .card-preview -->


                                           <!-- .row -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div><!-- .components-preview -->
                        </div>
                    </div>
                </div>



                @endsection















