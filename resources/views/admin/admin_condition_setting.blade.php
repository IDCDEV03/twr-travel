@extends('layouts.simple.master')
@section('title', 'ตั้งค่าข้อมูล')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แก้ไขข้อมูล</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">


                
                    <div class="col-xl-12 xl-100 col-lg-12 box-col-12">
                        <div class="card">
                            <div class="card-header">
                                เงื่อนไขแพ็คเกจทัวร์
                            </div>
                            <div class="card-body">
                    <form action="{{ route('admin.insert_condition') }}" method="POST">
                        @csrf
                        @foreach ($condition as $item)                          
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">เงื่อนไข
                                <span class="txt-danger">*</span>
                                </label>
                                <textarea class="form-control" rows="8" name="package_condition" id="summernote">
                                    {{$item->package_condition}}
                                </textarea>
                            </div>
                        </div>
                        @endforeach
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                        </div>
                    </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
      $('#summernote').summernote({
        tabsize: 2,
          height: 120,
          fontNames: ['Tahoma', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['table', ['table']],
          ['para', ['ul', 'ol', 'paragraph']],
       ]   
  });
  });
</script>
@endsection
