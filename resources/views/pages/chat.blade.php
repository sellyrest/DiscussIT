@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <h3>Following Users</h3>
            <ul class="list-group">
                <!-- List of following users -->
                {{-- @foreach($followingUsers as $user)
                <li class="list-group-item"><a href="{{ route('chat', $user->id) }}">{{ $user->name }}</a></li>
                @endforeach --}}
            </ul>
        </div>
        <!-- End Sidebar -->
        
        <!-- Chat Content -->
        <div class="col-md-9">
            <h3>Chat</h3>
            <!-- Chat window -->
            <div id="chat-window">
                <!-- Chat messages will be displayed here -->
            </div>
            <!-- Input form to send messages -->
            <form id="message-form">
                <input type="text" id="message" placeholder="Type your message...">
                <button type="submit">Send</button>
            </form>
        </div>
        <!-- End Chat Content -->
    </div>
</div>
<!-- end: Content -->
@endsection
