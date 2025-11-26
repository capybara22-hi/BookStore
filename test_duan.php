{{-- resources/views/books/index.blade.php --}}

<!-- Đây là câu lệnh kế thừa lại layout bao gồm có header và footer ở trên -->
@extends('layouts.app')

<!-- Truyền nội dung "Danh sách bán sách vào vị trí có @yeild('tilte') ở file trên -->
@section('title', 'Danh sách sách')

<!-- Truyền nội dung đoạn code trong section vào vị trí có @yeild('content') ở file trên -->
@section('content')
<h2>Danh sách các cuốn sách</h2>

<ul>
    @foreach($books as $book)
    <li>{{ $book->title }} – {{ $book->author }}</li>
    @endforeach
</ul>
@endsection