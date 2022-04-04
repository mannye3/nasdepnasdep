<?php

namespace App\Http\Controllers;
use Mail;
use App\Models\Kyc;
use App\Models\User;
use App\Models\Vpool;
use App\Models\DdaKyc;
use App\Models\CompanyDoc;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KYCController extends Controller
{



                    public function enterprisekyc()
                    {




                        $kYCLists = Kyc::all();
                        return view('kycs.enterprise_kyc',compact('kYCLists'));

                    }



                     public function enterprisekycdetails($id)
                    {

                         $kycdetails = Kyc::where('id', $id)->first();
                       // return $trade_report = CompanyDoc::where('company_id', $id)->get();
                        //$book = CompanyDoc::where('company_id', $id)->firstOrFail();
                         $docs = CompanyDoc::where('company_id', $id)->first();
                        return view('kycs.enterprise_kyc_details', compact('kycdetails', 'docs'));

                    }


                      public function enterprise($slug)
                    {


                         $kycdetails = Kyc::where('slug', $slug)->first();
                       // return $trade_report = CompanyDoc::where('company_id', $id)->get();
                        //$book = CompanyDoc::where('company_id', $id)->firstOrFail();

                        return view('kycs.enterprise', compact('kycdetails'));

                    }


                    public function download($id)
                    {
                        $book = CompanyDoc::where('company_id', $id)->firstOrFail();
                        $pathToFile = storage_path('app/docs/' . $book->name);
                        return response()->download($pathToFile);
                    }




                     public function approveKyc(Request $request, $id)
                        {
                            $user = Auth::user();
                            $authorized_by = $user->id;
                            $approvekyc = Kyc::where('id', $id)->first();

                            $user_info = User::where('id', $approvekyc->user_id)->first();

                            $approvekyc->status = $request['status'];
                            $approvekyc->authorized_by = $authorized_by;

                            $approvekyc->save();


                             if($request['status'] ==1){



                             $v_pool = new Vpool();

                            $v_pool->name = $approvekyc->name;
                            $v_pool->user_id = $approvekyc->user_id;
                            $v_pool->slug = $approvekyc->slug;
                            $v_pool->app_id = $approvekyc->app_id;
                            $v_pool->logo = $approvekyc->logo;
                            $v_pool->number = $approvekyc->number;
                            $v_pool->profile = $approvekyc->profile;
                            $v_pool->country_id = $approvekyc->country_id;
                            $v_pool->state_id = $approvekyc->state_id;
                            $v_pool->growth_stage = $approvekyc->growth_stage;
                            $v_pool->exp = $approvekyc->exp;
                            $v_pool->toi = $approvekyc->toi;
                            $v_pool->tof = $approvekyc->tof;
                            $v_pool->ylaf = $approvekyc->ylaf;
                            $v_pool->ylaf_turnover = $approvekyc->ylaf_turnover;
                            $v_pool->amount = $approvekyc->amount;
                            $v_pool->industry_id = $approvekyc->industry_id;
                            $v_pool->authorized_by = $authorized_by;
                            $v_pool->status = $approvekyc->status;




                             $v_pool->save();

                             }





                             $email_data = array(
                            'user_name' => $user_info->name,
                            'user_email' => $user_info->email,
                            'nasd_admin' => 'admin@nasdep.com'

                        );



                            Mail::send('emails.approval_notification', $email_data, function ($message) use ($email_data) {
                                $message->to($email_data['user_email'], $email_data['user_name'])
                                    ->subject('NASDEP ENTERPRISE FORM')
                                    ->from('info@nasdep.com', 'NASDEP');
                            });







                             $users = User::join('dda_kycs', 'users.id', '=', 'dda_kycs.user_id')->where('users.member_type', 'Due_Diligence' )->where('dda_kycs.status', '1' )
                                ->get(['users.email']);

                                 foreach ($users as  $value) {


                                          $slug= Str::slug($v_pool->slug);
                                          $link = config('app.url').'/enterprise/'.$slug;

                                           $email_data_dda = array(

                                            'dda_email' => $value->email,
                                            'link' => $link,
                                             );



                                  Mail::send('emails.dda_notification', $email_data_dda, function ($message) use ($email_data_dda) {
                                $message->to($email_data_dda['dda_email'],$email_data_dda['link'] )
                                    ->subject('New Enterprise alert')
                                    ->from('info@nasdep.com', 'NASDEP');
                            });

                             }




                            return back()->with('success', ''.$approvekyc->name.' Approved successfully  ');

                        }


                            public function rejectKyc(Request $request, $id)

                             {

                            $user = Auth::user();
                            $authorized_by = $user->id;
                            $rejectkyc = Kyc::where('id', $id)->first();

                            $user_info = User::where('id', $rejectkyc->user_id)->first();

                            $rejectkyc->status = $request['status'];
                            $rejectkyc->authorized_by = $authorized_by;

                            $rejectkyc->save();


                           $email_data = array(
                            'user_name' => $user_info->name,
                            'user_email' => $user_info->email,
                            'nasd_admin' => 'admin@nasdep.com'

                        );



                            Mail::send('emails.rejection_notification', $email_data, function ($message) use ($email_data) {
                                $message->to($email_data['user_email'], $email_data['user_name'])
                                    ->subject('NASDEP ENTERPRISE FORM')
                                    ->from('info@nasdep.com', 'NASDEP');
                            });



                            return back()->with('success', ''.$rejectkyc->name.' Rejected  ');


                        }




                           public function ddakyc()
                             {













                         $ddalist = DdaKyc::all();

                        return view('kycs.ddakyc',compact('ddalist'));

                    }

                     public function ddakycdetails($id)
                    {

                         $kycdetails = DdaKyc::where('id', $id)->first();
                       // return $trade_report = CompanyDoc::where('company_id', $id)->get();
                        //$book = CompanyDoc::where('company_id', $id)->firstOrFail();

                        return view('kycs.dda_kyc_details', compact('kycdetails'));

                    }


                      public function dda($slug)
                    {

                         $kycdetails = DdaKyc::where('slug', $slug)->first();


                        return view('kycs.dda_kyc_details', compact('kycdetails'));

                    }



                     public function approveddaKyc(Request $request, $id)
                        {
                            $user = Auth::user();
                            $authorized_by = $user->id;
                            $approveddakyc = DdaKyc::where('id', $id)->first();

                            $user_info = User::where('id', $approveddakyc->user_id)->first();

                            $approveddakyc->status = $request['status'];
                            $approveddakyc->authorized_by = $authorized_by;

                            $approveddakyc->save();



                             $email_data = array(
                            'user_name' => $user_info->name,
                            'user_email' => $user_info->email,
                            'nasd_admin' => 'admin@nasdep.com'

                        );



                            Mail::send('emails.approval_dda_notification', $email_data, function ($message) use ($email_data) {
                                $message->to($email_data['user_email'], $email_data['user_name'])
                                    ->subject('NASDEP ENTERPRISE FORM')
                                    ->from('info@nasdep.com', 'NASDEP');
                            });


                            return back()->with('success', ''.$approveddakyc->name.' Approved successfully  ');

                        }


                            public function rejectddaKyc(Request $request, $id)

                             {

                            $user = Auth::user();
                            $authorized_by = $user->id;
                            $rejectddakyc = DdaKyc::where('id', $id)->first();

                            $user_info = User::where('id', $rejectddakyc->user_id)->first();

                            $rejectddakyc->status = $request['status'];
                            $rejectddakyc->authorized_by = $authorized_by;

                            $rejectddakyc->save();


                           $email_data = array(
                            'user_name' => $user_info->name,
                            'user_email' => $user_info->email,
                            'nasd_admin' => 'admin@nasdep.com'

                        );



                            Mail::send('emails.rejection_notification', $email_data, function ($message) use ($email_data) {
                                $message->to($email_data['user_email'], $email_data['user_name'])
                                    ->subject('NASDEP ENTERPRISE FORM')
                                    ->from('info@nasdep.com', 'NASDEP');
                            });



                            return back()->with('success', ''.$rejectddakyc->name.' Rejected  ');


                        }







}



