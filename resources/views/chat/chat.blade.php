@extends('layouts.app')
@section('title', 'Chat')
@section('content')

<style>
    .Patient{
        color: #000;
        display:flex;
        justify-content: flex-start;
    }
    .Therapist{
        display:flex;
        justify-content: flex-end;
    }
    .btn-primary{
        border-radius: 20px;
    }
</style>

<div class="container">
    <div class="page-layout chat-page">
        <div class="chat-card mx-auto">
            <div class="chat-head d-flex align-items-center gap-3">
                <div class="chat-dp">
                    <img src="{{ $chatUser->pfp
                                        ? asset('storage/' . $chatUser->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">
                </div>
                <div class="chat-name">
                    <h2>{{ $chatUser->name }}</h2>
                </div>
            </div>
            <div id="chat-box" style="border:1px solid #ccc; padding:15px; height:400px; overflow-y:scroll;">
                <!-- Messages load here -->
            </div>
        
            <form id="chat-form">
                @csrf
                <input type="hidden" id="therapist_id" value="{{ $therapist }}">
                <input type="hidden" id="patient_id" value="{{ $patient }}">
        
                <div class="chat-low d-flex justify-content-between align-items-center gap-3">
                    <div class="chat-msg">
                        <input type="text" id="chat_content" class="form-control ms-3" placeholder="Type message..." required>
                    </div>
                    <button type="submit" class="btn-primary ms-4 me-4">Send</button>
                </div>
            </form>
        </div>

    </div>
</div>
    


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function(){

    let therapist = $('#therapist_id').val();
    let patient = $('#patient_id').val();
   
    // Load messages
    function loadMessages() {
        $.get("{{ route('chat.fetch', ['therapist' => $therapist, 'patient' => $patient]) }}" , function(data){
            let html = '';
            data.forEach(function(message){
                html += `
                    <div style="margin-bottom:10px;" class="${message.created_by == therapist ? 'Therapist' : 'Patient'}">
                        <strong>${message.created_by == therapist ? message.therapist_name : message.patient_name}:</strong>
                        ${message.chat_content}
                        <br>
                        <!--<small>${message.created_at}</small>-->
                    </div>
                `;
            });
            $('#chat-box').html(html);
            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
        });
    }

    // Send message
    $('#chat-form').submit(function(e){
        e.preventDefault();

        $.post("{{ route('chat.send') }}", {
            _token: '{{ csrf_token() }}',
            therapist_id: therapist,
            patient_id: patient,
            chat_content: $('#chat_content').val()
        }, function(response){
            $('#chat_content').val('');
            loadMessages();
        });
    });

    // Auto refresh every 3 seconds
    setInterval(loadMessages, 3000);

    // Initial load
    loadMessages();
});
</script>

@endsection
