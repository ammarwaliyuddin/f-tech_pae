@extends('layouts.layout')
@section('content')
        
<h2 class="intro-y text-lg font-medium mt-10">
    Data Keuangan
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a  href="javascript:;" data-toggle="modal" data-target="#add-item-modal" class="btn btn-primary shadow-md mr-2">Cetak Laporan</a>
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-menu w-20">
                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 ml-auto">
            <div class="w-100 sm:w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="form-control w-100 sm:w-56  box pr-10 placeholder-theme-13" id="search-data" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
            </div>
        </div>
    </div>
    
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible " id="showData">

    </div>
</div>
    <!-- BEGIN: Data List -->
    
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visibl table-responsive">
        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">  @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button> </div>
       
    @endif
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="text-center whitespace-nowrap">No Resi</th>
                    <th class="text-center whitespace-nowrap">Pengirim</th>
                    <th class="text-center whitespace-nowrap">Total</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</div>

@stop