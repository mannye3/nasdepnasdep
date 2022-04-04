
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
                                            <h4 class="title nk-block-title">{{ $upool->name }}</h4>
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
                                                    <img alt="Pic" src="{{ $upool->logo }}" />
                                                </div>
                                            </div>

                                            <div class="flex-grow-1">

                                                <div class="d-flex align-items-center justify-content-between flex-wrap">

                                                    <div class="mr-3">
                                                        <div class="d-flex align-items-center mr-3">

                                                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $upool->name }}</a>


                                                            <span class="badge badge-sm badge-success">{{ $upool->industry->name }}</span>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-center flex-wrap justify-content-between">

                                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5"><p>
                                                        {!! $upool->profile !!}</p></div>

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
                                            <span class="data-label">Reg No</span>
                                            <span class="data-value">{{ $upool->number }}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Expereince</span>
                                            <span class="data-value">{{$upool->exp}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">state:</span>
                                            <span class="data-value">{{ $upool->state->name }}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Country</span>
                                            <span class="data-value">{{ $upool->country->name }}</span>
                                        </div>
                                         <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Growth Stage</span>
                                            <span class="data-value">{{$upool->growth_stage}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->


                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Type of investor</span>
                                            <span class="data-value">{{$upool->toi}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Type of funding required</span>
                                            <span class="data-value">{{$upool->tof}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Year of last audited financials :</span>
                                            <span class="data-value">{{$upool->ylaf}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->



                                </div><!-- .nk-data -->


                                  <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Financial Details </h6>
                                    </div>



                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name-1">Year of last audited financials</label>
                                                            <div class="form-control-wrap">
                                                                {{$upool->ylaf}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Turnover</label>
                                                            <div class="form-control-wrap">
                                                                <?php echo  number_format($upool->ylaf_turnover) ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address-1">Amount</label>
                                                            <div class="form-control-wrap">
                                                                <?php echo  number_format($upool->amount) ?>
                                                            </div>
                                                        </div>
                                                    </div>




                                                        </div>







                                    <div class="data-item"  data-toggle="modal" data-target="#profile-edit">


                                    </div><!-- .data-item -->




                                    <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Registrant</h6>
                                    </div>
                                    <?php

                                       $registrant_details = json_decode($upool['registrant'],true);
                                         $registrant_info = json_decode($registrant_details, true);

                                         ?>

                                     <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label"> Name</span>
                                            <span class="data-value">{{$registrant_info["name"]}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Email</span>
                                            <span class="data-value">{{$registrant_info["email"]}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                           <span class="data-label"> Phone</span>
                                            <span class="data-value">{{$registrant_info["phone"]}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->

                                    <div class="data-item">
                                        <div class="data-col">
                                           <span class="data-label">Designation </span>
                                            <span class="data-value">{{$registrant_info["designation"]}}</span>
                                        </div>
                                        <div class="data-col data-col-end"></div>
                                    </div><!-- .data-item -->
                                </div><!-- .nk-data -->






                                </div><!-- .nk-data -->

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
                                                        <form  method="POST" action="{{ route('editUpool', $upool->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="row g-4">
                                                            <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-first-name">Company Name</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="name" class="form-control " type="text" value="{{ $upool->name}}" />
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-first-name">Expereince</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="exp" class="form-control" type="text" value="{{ $upool->exp}}" />
                                                                          <span class="invalid-feedback"></span>



                                                                      </div>
                                                                  </div>
                                                              </div>

                                                               <div class="col-md-4">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-last-name">Reg No</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="number" type="text" class="form-control" value="{{ $upool->number}}"  />
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                              <div class="col-md-4">
                                                                  <div class="form-group">
                                                                      <label class="form-label" for="fw-email-address">Growth stage</label>
                                                                      <div class="form-control-wrap">
                                                                        <input name="growth_stage" type="text" class="form-control  " value="{{ $upool->growth_stage}}" />
                                                                      </div>
                                                                  </div>
                                                              </div>


                                                              <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-email-address">Industry</label>
                                                                    <div class="form-control-wrap">
                                                                        <select name="industry_id" class="form-control  ">
                                                                            @foreach($industries as $industry)
                                                                    <option {{ ($industry->id) == $upool->industry_id ? 'selected' : '' }}  value="{{ $industry->id }}">
                                                                        {{$industry->name }}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                              <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-email-address">Type of investor</label>
                                                                    <div class="form-control-wrap">
                                                                      <input name="toi" type="text" class="form-control  " value="{{ $upool->toi}}" />
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-email-address">Type of funding required</label>
                                                                    <div class="form-control-wrap">
                                                                      <input name="tof" type="text" class="form-control  " value="{{ $upool->tof}}" />
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-email-address">Year of last audited financials</label>
                                                                    <div class="form-control-wrap">
                                                                      <input name="ylaf" type="number" class="form-control  " value="{{ $upool->ylaf}}" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-mobile-number">Country</label>
                                                                    <div class="form-control-wrap">
                                                                      <select name="country_id" class="form-control  ">
                                                                          @foreach($countries as $country)
                                                                  <option {{ ($country->id) == $upool->country_id ? 'selected' : '' }}  value="{{ $country->id }}">
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
                                                                          <option {{ ($state->id) == $upool->state_id ? 'selected' : '' }}  value="{{ $state->id }}">
                                                                              {{$state->name }}</option>
                                                                              @endforeach
                                                                      </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="fw-mobile-number">About </label>
                                                                    <div class="form-control-wrap">
                                                                      <textarea name="profile" class="summernote-basic">{{$upool->profile}}</textarea>
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















