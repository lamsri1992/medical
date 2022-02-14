@extends('layouts.app')
@section('content')
<div class="row min-vh-80 h-100">
    <div class="col-12">
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-secondary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    <i class="fa fa-box-open"></i> รายการเวชภัณฑ์
                                </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table id="tableBasic" class="table table-striped table-borderless compact">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                CODE
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder">
                                                ชื่อเวชภัณฑ์
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                ประเภท
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                คงเหลือ
                                            </th>
                                            <th class="text-secondary text-xxs font-weight-bolder text-center">
                                                หน่วยนับ
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $res)                                            
                                        <tr>
                                            <td class="text-center">
                                                <span class="text-xs">
                                                    {{ $res->store_med_code }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-xs">
                                                    {{ $res->med_name." ".$res->med_content }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-xs">
                                                    {{ $res->med_type }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-xs">
                                                    {{ $res->amount }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-xs">
                                                    {{ $res->med_unit }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
     
</script>
@endsection
