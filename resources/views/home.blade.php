@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="panel panel-default">
                        <div class="panel-heading">Chats</div>

                        <div class="panel-body">
                            <chat-messages :messages="messages"></chat-messages>
                        </div>
                        <div class="panel-footer">
                            <chat-form
                                v-on:messagesent="addMessage"
                                :user="{{ Auth::user() }}"
                            ></chat-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
