@extends('layouts.head')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                        สำนักงาน กสทช. เขต 6 ขอนแก่น</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลเสาสัญญาณ</li>
                        </ol>
                    </div>
                </div>
            </div>  
        </div>

        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">เพิ่มข้อมูลเสาสัญญาณ</h3>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif

                        @method('PATCH') 
                        @csrf
                            <div class="card-body ">
                                <!-- <div class="form-group">
                                    <label for="towers_image">เพิ่มรูปภาพของเสา:</label>
                                    <input type="file" class="form-control-file" name="towers_image" id="towers_image" > 
                                </div>
                        
                                <div class="form-group">
                                    <label>ผู้ให้บริการ :</label>
                                    <select class="form-control" name="customer_select">
                                        ?php while ($result = $customer_query->fetch_assoc()) { ?>
                                        <option value="<!?= $result['customer_id'] ?>" ><!?= $result['customer_code']. " : " .$result['customer_name']?></option>
                                        <!?php }?
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label>เครือข่ายร่วม :</label>
                                    <select class="form-control" name="network_select">
                                        ?php while ($result_secon = $network_secon_query->fetch_assoc()) { ?>
                                        <option value="<!?= $result_secon['network_id'] ?>" require> <!?=  $result_secon['network_code']. " : " .$result_secon['network_name'] ?></option>
                                        <!?php } ? 
                                    </select> -->
                                <!-- </div> -->
                                <div class="form-group">
                                    <label for="towers_parish">ตำบล :</label>
                                    {{ $tower->towers_parish }}
                                </div>
                                <div class="form-group">
                                    <label for="towers_district">อำเภอ :</label>
                                    {{ $tower->towers_district }}
                                </div>
                                <div class="form-group">
                                    <label for="towers_pravince">จังหวัด :</label>
                                    {{ $tower->towers_pravince }}
                                </div>
                                <div class="form-group">
                                    <label for="towers_code">รหัสไปรษณีย์ :</label>
                                    {{ $tower->towers_code }}
                                </div>
                                <div class="form-group">
                                    <label for="towers_license_code">รหัสใบอนุญาต :</label>
                                    {{ $tower->towers_license_code }}
                                </div>
                                <div class="form-group">
                                    <label for="towers_license_date">วันขอใบอนุญาต :</label>
                                    {{ $tower->towers_license_date }}
                                </div>
                                <div class="form-group">
                                    <label for="towers_typeleaf">ประเภทใบตั้ง :</label>
                                    {{ $tower->towers_typeleaf }} 
                                </div>
                                <div class="form-group">
                                    <label for="towers_sending">กำลังส่ง :</label>
                                    {{ $tower->towers_sending }}
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="LATDEG">Latitude :</label>
                                        {{ $tower->LATDEG }}
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label for="LONGDEG">Longitude</label>
                                        {{ $tower->LONGDEG }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="{{ url('/towers') }}">Back</a>
                            </div>
                    </div>
                </section>
            </div>
      </div>

@endsection
