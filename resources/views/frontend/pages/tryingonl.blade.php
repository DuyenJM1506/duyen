{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.index` --}}
@extends('frontend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Thử đồ online
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.index` --}}
@section('custom-css')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.index` --}}
@section('main-content')

<br>
<div style="font-family: 'Lora', serif; font-size: 30px" class="text-center">
    <span>COMING SOON!</span>
</div>
<br>
<hr>
<br>
<div style="font-family: 'Lora', serif;" class="text-center">
    <span>Thank you for supporting!</span>
</div>
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.index` --}}
@section('custom-scripts')
@endsection