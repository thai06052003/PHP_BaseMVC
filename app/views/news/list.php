<h1>Danh sách tin tức</h1>
{{ $new_title }}<br>
{{ $new_content }}<br>
{{ 'XuanThai' }}<br>
{{toSlug('Tiêu đề bài viết')}}<br>
{! $new_auth !}<br>
{{!empty($page_title) ? $page_title : false}}<br>
{{md5('123456')}}<br>
@if (!empty($new_auth))
<p>Ten tac gia: {{$new_auth}}</p>
@else
<p>Khong co gi</p>
@endif

@if (md5('123456')!='')
<h4>MD5: {{md5('123456')}}</h4>
@endif

@php
$number = 1;
$number++;
$total = $number+10;
$data = [
    'Item 1',
    'Item 2',
    'Item 3',
];
@endphp
{{$total}}<br>
@for ($i = 0; $i < count($data); $i++)
<p>{{$data[$i]}}</p>
@endfor
@php
$i = 0;
@endphp
@while ($i<=10)
<p>{{$i}}</p>
@php
$i++
@endphp
@endwhile
@foreach ($data as $key=>$item)
<p>Key = {{$key}} - Value = {{$item}}</p>
@endforeach