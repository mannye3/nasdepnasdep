<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use App\Models\Pool;
use App\Models\State;
use App\Models\Upool;
use App\Models\Sector;
use App\Models\Analyst;
use App\Models\Company;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Investor;
use App\Models\Incubator;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{


            public function incubators()
                    {

                        $incubators = Incubator::all();
                        return view('companies.incubators', compact('incubators'));

                    }


            public function incubator($id)
                {



                    $company = Company::where('id', $id)->first();
                    $incubators = Incubator::whereIn('company_id', $company)->get();
                    $pools = Pool::whereIn('incubator_id', $incubators)->get();
                    $enterprises = Enterprise::whereIn('company_id', $company)->get();
                    $countries = Country::all();
                    $states = State::all();



                    return view('companies.incubator' , compact('company','countries', 'states', 'pools', 'enterprises'));
                }


                public function deleteIncubator($company_id)
                {
                    $incubator = Incubator::where('company_id', $company_id)->first();
                    $company = Company::where('id', $company_id)->first();
                    $incubator->delete();
                    $company->delete();

                    return back()->with('success', 'Company Deleted');
                }


                public function investors()
                {

                      $investors = Investor::all();
                    return view('companies.investors', compact('investors'));

                }



                public function investor($id)
                {


                    $company = Company::where('id', $id)->first();
                    $countries = Country::all();
                    $states = State::all();
                    return view('companies.investor' , compact('company', 'countries','states'));
                }





                public function changeInvestorStatus(Request $request, $id)
                {
                    $investor = Investor::where('id', $id)->first();
                    $investor->suspended = $request['suspended'];
                    $investor->save();
                     return back()->with('success', 'Investor Status Updated');
                }





                public function deleteInvestor($company_id)
                {
                    $investor = Investor::where('company_id', $company_id)->first();
                    $company = Company::where('id', $company_id)->first();
                    $investor->delete();
                    $company->delete();

                    return back()->with('success', 'Company Deleted');
                }



                public function analysts()
            {

                $analysts = Analyst::all();
                return view('companies.analysts', compact('analysts'));

            }


            public function analyst($id)
                {


                    $company = Company::where('id', $id)->first();
                    $countries = Country::all();
                    $states = State::all();
                    return view('companies.analyst' , compact('company', 'countries','states'));
                }





                public function changeAnalystStatus(Request $request, $id)
                    {
                        $analyst = Analyst::where('id', $id)->first();
                        $analyst->suspended = $request['suspended'];
                        $analyst->save();
                        return back()->with('success', 'Analysts Status Updated');

                    }


                public function deleteAnalyst($company_id)
                    {
                        $analyst = Analyst::where('company_id', $company_id)->first();
                        $company = Company::where('id', $company_id)->first();
                        $analyst->delete();
                        $company->delete();
                        return back()->with('success', 'Company Deleted');
                    }








            public function pools()
            {



                $pools =  Pool::with('incubator.company')->get();

                return view('companies.pools', compact('pools'));

            }




            public function pool($id)
            {


                $pool = Pool::where('id', $id)->first();
                $industries = Industry::all();
                $incubators = Incubator::all();
                $countries = Country::all();
                return view('companies.pool' , compact('pool', 'industries','incubators','countries'));
            }



            public function editPool(Request $request, $id)
            {
                $pool = Pool::where('id', $id)->first();

                $pool->name = $request['name'];
                $pool->profile = $request['profile'];
                $pool->growth_stage = $request['growth_stage'];
                $pool->exp = $request['exp'];
                $pool->regdate = $request['regdate'];
                $pool->data_available = $request['data_available'];
                $pool->countries = $request['countries'];


                $pool->save();




                if($request['logo'] !=""){
                    $fileExt = $request->logo->getClientOriginalExtension();
                    $regdate = $pool->regdate.'_'. date("Y-m-d").'_'.time().'.'.$fileExt;
                    $logoName = config('app.url').'/images/'.$regdate;
                    $request->logo->move(public_path('images'),$logoName);
                    $pool->logo = $logoName;
                    $pool->save();
                    }


               return back()->with('success', 'Company Details Updated');



            }




            public function statusPool(Request $request, $id)
            {
                $pool = Pool::where('id', $id)->first();

                $pool->suspended = $request['suspended'];

                $pool->save();


            return back()->with('success', 'Pool Status Updated');



            }




            public function deletePool($id)
            {
                $pool = Pool::where('id', $id)->first();
                $pool->delete();

                return back()->with('success', 'Company Deleted');
            }





            public function upools()
            {



                $upools =  Upool::all();

                return view('companies.upools', compact('upools'));

            }




            public function upool($id)
            {

                $message = Upool::find($id);






                $upool = Upool::where('id', $id)->first();

                $industries = Industry::all();
                $countries = Country::all();
                $states = State::all();


                return view('companies.upool' , compact('upool', 'industries', 'countries','states'));
            }



            public function editUpool(Request $request, $id)
            {
                $upool = Upool::where('id', $id)->first();

                $upool->name = $request['name'];
                $upool->profile = $request['profile'];
                $upool->growth_stage = $request['growth_stage'];
                $upool->exp = $request['exp'];
                $upool->number = $request['number'];
                $upool->toi = $request['toi'];
                $upool->tof = $request['tof'];
                $upool->ylaf = $request['ylaf'];
                $upool->ylaf_turnover = $request['ylaf_turnover'];
                $upool->amount = $request['amount'];
                $upool->country_id = $request['country_id'];
                $upool->state_id = $request['state_id'];
                $upool->industry_id = $request['industry_id'];

                $upool->save();




                if($request['logo'] !=""){
                    $fileExt = $request->logo->getClientOriginalExtension();
                    $regdate = $upool->regdate.'_'. date("Y-m-d").'_'.time().'.'.$fileExt;
                    $logoName = config('app.url').'/images/'.$regdate;
                    $request->logo->move(public_path('images'),$logoName);
                    $upool->logo = $logoName;
                    $upool->save();
                    }


               return back()->with('success', 'Company Details Updated');



            }





            public function deleteUpool($id)
            {
                $upool = Upool::where('id', $id)->first();
                $upool->delete();

                return back()->with('success', 'Investor Deleted');
            }






            public function add_company()
            {
                $countries = Country::all();
                $states = State::all();
                $industries = Industry::all();

                return view('companies.add_company', compact('countries', 'states','industries'));

            }







            public function editCompany(Request $request, $id)
            {
                $company = Company::where('id', $id)->first();

                $company->name = $request['name'];
                $company->number = $request['number'];
                $company->addr = $request['addr'];
                $company->ind_exp = $request['ind_exp'];
                $company->country_id = $request['country_id'];
                $company->state_id = $request['state_id'];
                $company->type = $request['type'];
                $company->email = $request['email'];
                $company->website = $request['website'];
                $company->about = $request['about'];
                $company->doi = $request['doi'];

                $company->save();




                if($request['logo'] !=""){
                    $fileExt = $request->logo->getClientOriginalExtension();
                    $doi = $company->doi.'_'. date("Y-m-d").'_'.time().'.'.$fileExt;
                    $logoName = config('app.url').'/images/'.$doi;
                    $request->logo->move(public_path('images'),$logoName);
                    $company->logo = $logoName;
                    $company->save();
                    }


               return back()->with('success', 'Company Details Updated');



            }




            public function createCompany(Request $request)
            {
                $company = new Company();
                $user = Auth::user();
                $authorized_by = $user->id;




                $company->name = $request['name'];
                $company->number = $request['number'];
                $company->addr = $request['addr'];
                $company->ind_exp = $request['ind_exp'];
                $company->country_id = $request['country_id'];
                $company->state_id = $request['state_id'];
                $company->industry_id = $request['industry_id'];
                $company->type = $request['type'];
                $company->website = $request['website'];
                $company->email = $request['email'];
                $company->about = $request['about'];
                $company->addr = $request['addr'];
                $company->doi = $request['doi'];
                $company->authorized_by = $authorized_by;


                $company->save();

                $company_id = $company->id;




                if($request['logo'] !=""){
                    $fileExt = $request->logo->getClientOriginalExtension();
                    $doi = $company->doi.'_'. date("Y-m-d").'_'.time().'.'.$fileExt;
                    $logoName = config('app.url').'/images/'.$doi;
                    $request->logo->move(public_path('images'),$logoName);
                    $company->logo = $logoName;
                    $company->save();
                    }


                    if($request['analyst'] !=""){


                        $analyst = new Analyst();

                        $analyst->company_id = $company_id;
                        $analyst->authorized_by = $authorized_by;

                        $analyst->save();

                    }


                    if($request['investor'] !=""){


                        $investor = new Investor();

                        $investor->company_id = $company_id;
                        $investor->authorized_by = $authorized_by;

                        $investor->save();

                    }




                    if($request['incubator'] !=""){


                        $incubator = new Incubator();

                        $incubator->company_id = $company_id;
                        $incubator->authorized_by = $authorized_by;


                        $incubator->save();

                    }



                 return back()->with('success', 'Company Added');



            }






            public function sectors()
            {

                $sectors = Sector::all();
                $industries = Industry::all();
                return view('companies.sectors', compact('sectors','industries'));

            }






            public function addSector(Request $request)
            {
                $sector = new Sector();

                $sector->name = $request['name'];
                $sector->industry_id = $request['industry_id'];

                $sector->save();

                return back()->with('success', 'Sector Details Updated');


            }



             public function editSector(Request $request, $id)
            {
                $sector = Sector::where('id', $id)->first();

                $sector->name = $request['name'];
                $sector->industry_id = $request['industry_id'];

                $sector->save();

                return back()->with('success', 'Sector Details Updated');


            }




            public function deleteSector($id)
            {
                $sector = Sector::where('id', $id)->first();
                $sector->delete();

                return back()->with('success', 'Sector Deleted');
            }






            public function industries()
            {


                $industries = Industry::all();
                return view('companies.industries', compact('industries'));

            }



             public function addIndustry(Request $request)
            {
                $industry = new Industry();

                $industry->name = $request['name'];
                $industry->desc = $request['desc'];

                $industry->save();

                return back()->with('success', 'Industry Details Updated');


            }







            public function editIndustry(Request $request, $id)
            {
                $industries = Industry::where('id', $id)->first();

                $industries->name = $request['name'];
                $industries->desc = $request['desc'];

                $industries->save();

                return back()->with('success', 'Industry Details Updated');


            }




            public function deleteIndustry($id)
            {
                $industry = Industry::where('id', $id)->first();
                $industry->delete();

                return back()->with('success', 'Sector Deleted');
            }








}
