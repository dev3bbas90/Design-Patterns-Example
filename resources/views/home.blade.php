@extends('layouts.dashboard')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" >
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                                <li class="nav-item  col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link active border py-10  flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#top_theaters">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fas fa-ticket-alt" style="font-size: 35px"></i>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">Top Theaters</span>
                                    </a>
                                </li>
                                <li class="nav-item  col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link  border py-10  flex-grow-1 rounded flex-column " data-toggle="pill" href="#top_programs">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fas fa-film" style="font-size: 35px"></i>
                                            </span>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                                            Top Programs
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item  col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a class="nav-link border py-10  flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#sales_statistics">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fas fa-dollar-sign" style="font-size: 35px"></i>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">Sales Statistics</span>
                                    </a>
                                </li>
                                <li class="nav-item  col flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0">
                                    <a class="nav-link border py-10  flex-grow-1 rounded flex-column align-items-center" data-toggle="pill" href="#top_actors">
                                        <span class="nav-icon py-2 w-auto">
                                            <i class="fas fa-users" style="font-size: 35px"></i>
                                        </span>
                                        <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">
                                            Top Actors
                                        </span>
                                    </a>
                                </li>                                            
                            </ul>
                            <div class="tab-content m-5 p-0 ">
                                <div class="tab-pane active" id="top_theaters" role="tabpanel">
                                    @foreach (  $data['theaters'] as $theater )     
                                        <div class="d-flex flex-column-fluid">
                                           <div class="container-fluid">
                                               <div class="card card-custom gutter-b">
                                                   <div class="card-body">                                                       
                                                       <div class="d-flex mb-9">
                                                           <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                                               <div class="symbol symbol-50 symbol-lg-120">
                                                                   <img src="{{$theater->path}}" alt="image" />
                                                               </div>
                                                           </div>
                                                           <div class="flex-grow-1">
                                                               <div class="d-flex justify-content-between flex-wrap mt-1">
                                                                   <div class="d-flex mr-3">
                                                                       <span class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$theater->name}}</span>                                                                    
                                                                   </div>
                                                               </div>
                                                               <div class="d-flex flex-wrap justify-content-between mt-1">
                                                                   <div class="d-flex flex-column flex-grow-1 pr-8">                                                                       
                                                                        <span class="font-weight-bold text-dark-50">
                                                                        {!!$theater->description!!}
                                                                        </span>                                                                       
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="separator separator-solid"></div>                                                    
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="top_programs" role="tabpanel">                                   
                                    <div class="d-flex flex-column-fluid">
                                        <div class="container-fluid">
                                            <div class="row">
                                                @foreach (  $data['programs'] as $program )     
                                                <div class="col-xl-6 col-sm-12">
                                                    <div class="card card-custom gutter-b">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <span class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$program->title}}</span>                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="pt-4">
                                                                <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px" style="background-image: url({{$program->path}})"></div>                                                                
                                                            </div>                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="sales_statistics" role="tabpanel">
                                    
                                </div>
                                <div class="tab-pane" id="top_actors" role="tabpanel">
                                    <div class="d-flex flex-column-fluid">							
			                            <div class="container-fluid">
                                            <div class="row">
                                                @foreach ($data['actors'] as $actor )                                                    
                                                    <div class="col-xl-4">                                                    
                                                        <div class="card card-custom card-stretch gutter-b dark">                                                
                                                            <div class="card-body d-flex align-items-center py-0 mt-8">
                                                                <div class="symbol symbol-100 mr-5">
                                                                    <div class="symbol-label" style="background-image:url({{$actor->path}})"></div>                                                                    
                                                                </div>
                                                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                                                                    <span  class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">{{$actor->name}}</span>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>							
                                        </div>							
                                    </div>		
                                </div>                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
