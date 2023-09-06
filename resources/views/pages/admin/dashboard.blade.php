@extends('layouts.main')
@section('content') 
<main>
    <header class="page-header pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg></div>
                            Dashboard
                        </h1>
                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-calendar text-primary">
                                    <rect x="3" y="4" width="18" height="18" rx="2"
                                        ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg></span>
                            <input class="form-control ps-0 pointer" id="litepickerRangePlugin"
                                placeholder="Select date range...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xxl-4 col-xl-12 mb-4">
                <div class="card h-100">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Total User</div>
                                            <div class="text-lg fw-bold">{{ $totalUser }}</div>
                                        </div>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-calendar feather-xl text-white-50">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg> --}}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="#!">View Report</a>
                                    <div class="text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                            </path>
                                        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card bg-warning text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Total Thread</div>
                                            <div class="text-lg fw-bold">{{ $totalTopic }}</div>
                                        </div>
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-dollar-sign feather-xl text-white-50">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg> --}}
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="#!">View Report</a>
                                    <div class="text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                            </path>
                                        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-12 col-md-7 mb-4">
                <div class="row">
                    <div class="col-12 mb-4">

                        <div class="card card-header-actions h-100">
                            <div class="card-header">
                                Recent Topic
                                <div class="dropdown no-caret">
                                    <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-more-vertical text-gray-500">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg></button>
                                    <div class="dropdown-menu dropdown-menu-end animated--fade-in-up"
                                        aria-labelledby="dropdownMenuButton">
                                        <h6 class="dropdown-header">Filter Activity:</h6>
                                        <a class="dropdown-item" href="#!"><span
                                                class="badge bg-green-soft text-green my-1">Commerce</span></a>
                                        <a class="dropdown-item" href="#!"><span
                                                class="badge bg-blue-soft text-blue my-1">Reporting</span></a>
                                        <a class="dropdown-item" href="#!"><span
                                                class="badge bg-yellow-soft text-yellow my-1">Server</span></a>
                                        <a class="dropdown-item" href="#!"><span
                                                class="badge bg-purple-soft text-purple my-1">Users</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="timeline timeline-xs">
                                    <!-- Timeline Item 1-->
                                    @foreach ($recentTopic as $item)
                                        
                                    <div class="timeline-item">
                                        <div class="timeline-item-marker">
                                            <div class="timeline-item-marker-text">{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</div>
                                            <div class="timeline-item-marker-indicator bg-green"></div>
                                        </div>
                                        <div class="timeline-item-content">
                                            <a href="{{ route('topic.show', Crypt::encrypt($item->id)) }}" target="_blank" rel="noopener noreferrer">
                                                {{ $item->title }}
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-12 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Top User
                            <div class="dropdown no-caret">
                                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton"
                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-vertical text-gray-500">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <div class="dropdown-menu dropdown-menu-end animated--fade-in-up"
                                    aria-labelledby="dropdownMenuButton">
                                    <h6 class="dropdown-header">Filter Activity:</h6>
                                    <a class="dropdown-item" href="#!"><span
                                            class="badge bg-green-soft text-green my-1">Commerce</span></a>
                                    <a class="dropdown-item" href="#!"><span
                                            class="badge bg-blue-soft text-blue my-1">Reporting</span></a>
                                    <a class="dropdown-item" href="#!"><span
                                            class="badge bg-yellow-soft text-yellow my-1">Server</span></a>
                                    <a class="dropdown-item" href="#!"><span
                                            class="badge bg-purple-soft text-purple my-1">Users</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="timeline timeline-xs">
                                <!-- Timeline Item 1-->
                                @foreach ($topuser as $item)
                                    
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans(['shorts' => true]) }}</div>
                                        <div class="timeline-item-marker-indicator bg-green"></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        {{ $item->fullname }}
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
</main>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <style>
        main {
            padding-left: 15rem;
            top: 3.625rem;
        }
    </style>
@endsection
