@extends('layouts.app')

@section('content')
<div class="nk-content ">
    <div class="nk-split nk-split-page nk-split-md">
        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
            <div class="absolute-top-right d-lg-none p-3 p-sm-5">

            </div>
            <div class="nk-block nk-block-middle nk-auth-body">
                <div class="brand-logo pb-5">
                    <a href="#" class="logo-link">
                        <img class="logo-light logo-img logo-img-lg" src="{{ asset('/assets/images/nasdlogop.jpg')}}" srcset="./images/nasdlogop.jpg 2x" alt="logo">
                        <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/images/nasdlogop.jpg')}}" srcset="./images/nasdlogop.jpg 2x" alt="logo-dark">
                    </a>
                </div>
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Reset Password</h5>
                        <div class="nk-block-des">
                            
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                 @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
              <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                      <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">Email</label>

                        </div>
                        <input type="email" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" id="default-01" placeholder="Enter your email address or username">
                       @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div><!-- .foem-group -->




                     <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">Password</label>

                        </div>
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                    </div><!-- .foem-group -->



                     <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">Confirm Password</label>

                        </div>
                         <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div><!-- .foem-group -->

                    <div class="form-group">

                        <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
                    </div>
                </form><!-- form -->
                 <div class="form-note-s2 pt-4">Return to  <a href="{{ route('login') }}">Login</a>
                </div>




            </div><!-- .nk-block -->


@endsection
































































































































