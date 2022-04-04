
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
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="title nk-block-title">Add Company</h4>

                        </div>
                    </div>
                    <div class="card card-bordered">
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
                            <form  method="POST" action=" {{ route('createcompany')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <div class="preview-block">
                                        <span class="preview-title overline-title">Category</span>
                                        <div class="g-4 align-center flex-wrap">
                                            <div class="g">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="analyst" id="customRadio7">
                                                    <label class="custom-control-label" for="customRadio7">Analyst</label>
                                                </div>
                                            </div>
                                            <div class="g">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="investor" id="customRadio6">
                                                    <label class="custom-control-label" for="customRadio6">Investor</label>
                                                </div>
                                            </div>
                                            <div class="g">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="incubator" id="customRadio5">
                                                    <label class="custom-control-label" for="customRadio5">Incubator</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            <div class="row g-4">

                                <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="form-label" for="fw-first-name">Company Name</label>
                                          <div class="form-control-wrap">
                                            <input name="name" class="form-control " type="text" />
                                          </div>
                                      </div>
                                  </div>

                                   <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="form-label" for="fw-first-name">REC NO</label>
                                          <div class="form-control-wrap">
                                            <input name="number" class="form-control" type="text"  />
                                              <span class="invalid-feedback"></span>



                                          </div>
                                      </div>
                                  </div>

                                   <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="form-label" for="fw-last-name">Date of incorporation</label>
                                          <div class="form-control-wrap">
                                            <input name="doi" type="date" class="form-control"  />
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="form-label" for="fw-email-address">Industry Expereince</label>
                                          <div class="form-control-wrap">
                                            <input name="ind_exp" type="text" class="form-control"  />
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="fw-email-address">Industry </label>
                                        <div class="form-control-wrap">
                                            <select name="industry_id" class="form-control  ">
                                            @foreach($industries as $industry)
                                            <option   value="{{ $industry->id }}">
                                                {{$industry->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="form-label" for="fw-mobile-number">Country</label>
                                          <div class="form-control-wrap">
                                            <select name="country_id" class="form-control  ">
                                                @foreach($countries as $country)
                                        <option   value="{{ $country->id }}">
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
                                                <option value="{{ $state->id }}">
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
                                            <input name="website" type="text" class="form-control" />
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="fw-mobile-number">Email </label>
                                        <div class="form-control-wrap">
                                          <input name="email" type="email" class="form-control"  />
                                        </div>
                                    </div>
                                </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="form-label" for="fw-mobile-number">About Company</label>
                                          <div class="form-control-wrap">
                                            <textarea class="form-control" id="kt-tinymce-4" name="about"></textarea>

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
                                        <textarea name="addr" class="form-control"></textarea>

                                      </div>
                                  </div>
                              </div><!-- .col -->


                              <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Company Logo <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
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















