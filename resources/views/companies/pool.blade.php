
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
                                            <h4 class="title nk-block-title">{{ $pool->name }}</h4>
                                            <div class="nk-block-des">

                                            </div>
                                        </div>
                                    </div>
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
                                            </div>
                                            <ul class="nav nav-tabs mt-n3">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-users"></em><span>Organization </span></a>
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
                                                    <img alt="Pic" src="{{ $pool->logo }}" />
                                                </div>
                                            </div>

                                            <div class="flex-grow-1">

                                                <div class="d-flex align-items-center justify-content-between flex-wrap">

                                                    <div class="mr-3">
                                                        <div class="d-flex align-items-center mr-3">

                                                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $pool->name }}</a>


                                                            <span class="badge badge-sm badge-success">{{ $pool->industry->name }}</span>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5"><p>
                                                        {!! $pool->profile !!}</p></div>

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
                                            <span class="data-label">Country</span>
                                            <span class="data-value">{{ $pool->countries }}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Expereince</span>
                                            <span class="data-value">{{$pool->exp}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Financial Info:</span>
                                            <span class="data-value">{{ $pool->data_available }}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Reg Date</span>
                                            <span class="data-value">{{$pool->regdate}}</span>
                                        </div>
                                         <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Growth Stage</span>
                                            <span class="data-value">{{$pool->growth_stage}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                     <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Incubator</span>
                                            <span class="data-value">{{$pool->incubator->company->name}}</span>
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


                                                    </div><!-- .nk-files -->



                                            </div>
                                                </div>

                                            </div>







                                            <div class="tab-pane" id="tabItem8">
                                                    <div class="tab-content">
                                                <div class="tab-pane active" id="file-grid-view">
                                                   <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu" style="float: right;">
                                                <ul class="nk-block-tools g-3">

                                                    <li class="nk-block-tools-opt">
                                                        <div class="drodown">
                                                            <a href="#add-trader" data-toggle="modal" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>

                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <br><br><br>
                                        </div><!-- .toggle-wrap -->
                                                    <div class="nk-files nk-files-view-grid">
                                                        <form  method="POST" action="{{ route('editPool', $pool->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="row g-4">
                                                            <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-first-name">Company Name</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="name" class="form-control " type="text" value="{{ $pool->name}}" />
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-first-name">Expereince</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="exp" class="form-control" type="text" value="{{ $pool->exp}}" />
                                                                          <span class="invalid-feedback"></span>



                                                                      </div>
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-last-name">Reg Date</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="regdate" type="number" class="form-control" value="{{ $pool->regdate}}"  />
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-email-address">Growth</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="growth_stage" type="text" class="form-control  " value="{{ $pool->growth_stage}}" />
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">Financial Info</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="data_available" type="text" class="form-control  " value="{{ $pool->data_available}}" />
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-mobile-number">Country</label>
                                                                      <div class="form-control-wrap">
                                                                        <select name="countries" class="form-control  ">
                                                                            @foreach($countries as $country)
                                                                    <option {{ ($country->name) == $pool->countries ? 'selected' : '' }}  value="{{ $country->name }}">
                                                                        {{$country->name }}</option>
                                                                        @endforeach
                                                                        </select>



                                                                      </div>
                                                                  </div>
                                                              </div>


                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-mobile-number">Incubator </label>
                                                                    <div class="form-control-wrap">
                                                                      <textarea name="profile"  class="summernote-basic">{{$pool->profile}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>






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















